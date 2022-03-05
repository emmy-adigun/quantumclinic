<h1 class="text-light">Welcome to Quantum Clinic</h1>

<?php
 $sched_arr=array();
    
?>
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<hr>

<hr>
<form id="darsbaord" action='#' method="post" class="py-2">

<div class="container">
 <div class="form-group">
 
<!-- <select type="text" class="custom-select" name="room" required  style="width: auto;  ">
<option value =""> </option>
<?php
 $qry2 = $conn->query("SELECT * FROM `room` ");
     foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $ID = $row['ID'];
        $name = $row['name'];

?>
 <option <?php $ID  ?>> <?php echo $name ?></option>

                <?php


     }
                ?>

                                    </select> -->
            


<select type="text" class="custom-select" id="namelist" name="service" required  style="width: auto;"  onchange="this.form.submit()">
<option value =""> Select Service</option>
<?php
 $qry2 = $conn->query("SELECT * FROM `service` ");
     foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $ID = $row['ID'];
        $name = $row['service_name'];

?>
 

 <option   value='<?php echo $name ?>'><?php echo $name ?></option>
 

                <?php


     }
                ?>

                                    </select>
            </div>
            

            


            <!-- <script type="text/javascript">
			// function update() {
			// 	var select = document.getElementById('service');
			// 	var option = select.options[select.selectedIndex];
            // 	var values =document.getElementById('service_length').value = option.value;
            //     document.getElementById('price').value = option.value;
				
			// }

			// update();

            function updateinput(e) {
  var selectedOption = e.options[e.selectedIndex];
  document.getElementById('service_length').value = selectedOption.getAttribute('data-name');
  


}
		</script>
        -->
<!-- 

            <input type="text" class="form-control" id="service_length" name="service_length"  required> -->
        </form>
  <div class="card">
    <div >
        <div id="calendar"></div>
    </div>
  </div>
</div>
<style>
    .fc-event:hover, .fc-event-selected {
        color: black !important;
    }
    a.fc-list-day-text {
        color: black !important;
    }
    .fc-event:hover, .fc-event-selected {
        color: black !important;
        background: var(--light);
        cursor: pointer;
    }
</style>
<?php
if(isset($_POST['service'])){  
    $service = $_POST['service'];
    $sched_query = $conn->query("SELECT a.*,p.name,p.id FROM `appointments` a inner join `patient_list` p on a.patient_id = p.id where service = '$service'");
}else{
    $sched_query = $conn->query("SELECT a.*,p.name,p.id FROM `appointments` a inner join `patient_list` p on a.patient_id = p.id"); 
}

$sched_arr = json_encode($sched_query->fetch_all(MYSQLI_ASSOC));
?>
<script>

$(document).ready(function () {
    var scheds = $.parseJSON('<?php echo ($sched_arr) ?>');
    var calendar = $('#calendar').fullCalendar({
        initialView:"dayGridMonth",
                        headerToolbar: {
                            right : "dayGridWeek,dayGridMonth,listDay prev,next"
                        },
                        buttonText:{
                            dayGridWeek :"Week",
                            dayGridMonth :"Month",
                            listDay :"Day",
                            listWeek :"Week",
                        },
        editable: true,
        events: scheds,
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

