<h1 class="text-light">Welcome to Quantum Clinic</h1>

<?php
 $sched_arr=array();
?>

<hr>
<form id="darsbaord" action='#' method="post" class="py-2">

    <div class="container">
        <div class="form-group">
            <select type="text" class="custom-select" id="serviceslist" name="service" required  style="width: auto;">
                <option value =""> Select Service</option>
                <?php
                $qry2 = $conn->query("SELECT * FROM `room` ");
                $getRoomsResult = $qry2->fetch_all(MYSQLI_ASSOC);
                foreach($getRoomsResult as $row){
                    $ID = $row['ID'];
                    $name = $row['name'];

                ?>
                <option   value='<?php echo $ID ?>' <?php if($getRoomsResult[0] == $row): echo "selected"; endif; ?>><?php echo $name ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</form>

<div class="card">
    <div class="card-body">
        <div id="calendar"></div>
    </div>
  </div>
</div>

<div class="add-client-modal">
    <div class="dialog-box">
        <p><strong>Date</strong>: <span class="event-date"></span></p>
        <p><strong>Time</strong>: <span class="event-time"></span></p>
        <p><strong>Service Type</strong>: <span class="service-type"></span></p>
        <p><strong>User Name</strong>: <span class="username"></span></p>
        <div>
            <p><strong>Add user</strong>:</p>
            <form action="" id="add-user-form">
                <div>
                    <input type="text" id="add-user">
                    <button type="submit" class="btn-primary submit-btn">Submit</button>
                </div>
            </form>
        </div>
        <div id="users-list"></div>
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
    .add-client-modal{
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.8);
        z-index: 9;
        display: flex;
        justify-content: center;
        display: none;
    }
    .dialog-box{
        width: 500px;
        padding: 30px 20px;
        background: #ffffff;
        border-radius: 10px;
        margin-top: 150px;
        height: fit-content;
        max-height: 70vh;
        overflow-y: hidden;
    }
    #users-list{
        overflow-y: auto;
        max-height: 450px;
    }
    .selectable-users{
        cursor: pointer;
    }
    form div{
        display: flex;
    }
    .submit-btn{
        margin-left: 15px;
    }
</style>

<script>
    $(function(){
        // $('.select2').select2()
        let selectedUserId = null;
        let selectedEvent = null;
        function isoDateWithoutTimeZone(date) {
            if (date == null) return date;
            var timestamp = date.getTime() - date.getTimezoneOffset() * 60000;
            var correctDate = new Date(timestamp);
            // correctDate.setUTCHours(0, 0, 0, 0); // uncomment this if you want to remove the time
            return correctDate.toISOString();
        }

        var Calendar = FullCalendar.Calendar;
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()

        var calendarEl = document.getElementById('calendar');
      //  selectable: true

        var calendar = new Calendar(calendarEl, {
            
            //selectable: true
            initialView:"dayGridMonth",
            // plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
            headerToolbar: {
                right : "dayGridWeek,dayGridMonth,listDay prev,next"
            },
            buttonText:{
                dayGridWeek :"Week",
                dayGridMonth :"Month",
                listDay :"Day",
                listWeek :"Week",
            },
            themeSystem: 'bootstrap',
            displayEventTime : false,
            events:function( fetchInfo, successCallback, failureCallback ){
                var startDate = isoDateWithoutTimeZone(new Date(fetchInfo.startStr)).replace("T", " ").split(".")[0];
				var endDate = isoDateWithoutTimeZone(new Date(fetchInfo.endStr)).replace("T", " ").split(".")[0];
				var selectTag = document.getElementById('serviceslist');
				var roomId = selectTag.value;;
                // console.log("fetchInfo: ", startDate);

                $.ajax({
                    url: _base_url_+"admin/dashboard/api.php",
					data: 'startDate=' + startDate + '&endDate=' + endDate + '&roomId=' + roomId,
					dataType: "json",
                    type: "POST",
					// contentType: "",
                    success: function (resp) {
                        const colors = {
                            "Executive Float": "#ffc107",
                            "Luxury Float": "#6610f2",
                            "Scalar": "#20c997"
                        }
                        // if(typeof resp =='object' && resp.status == 'success'){
						// 	console.log(resp);
						// }
						resp.map((item) => {
                            if(item.name){
                                item.title = item.name;
                            }else{
                                item.title = item.service_name;
                            }

                            item.borderColor = colors[item.service_name]; 
                            item.backgroundColor = colors[item.service_name]; 
                            return item
                        });
						// console.log(resp);
						successCallback(resp);
                    },
                    error: function (xhr, status, error) {
						console.log(error);
						console.log(status);
						console.log(xhr);
						console.log("fail");
                    }
                });
            },
            eventClick: function(eventClickInfo){
                selectedEvent = eventClickInfo.event.id;
                $('.event-date').text(moment(new Date(eventClickInfo.event.startStr)).format("DD-MM-YYYY"));
                $('.event-time').text(moment(new Date(eventClickInfo.event.startStr)).format("hh:mm a"));
                $('.service-type').text(eventClickInfo.event._def.extendedProps.service_name);

                const userName = eventClickInfo?.event?._def?.extendedProps?.name;

                userName && $('.username').text(userName);
                // if(!eventClickInfo?.event?._def?.extendedProps?.name){
                    $('.add-client-modal').css("display","flex");
                // }
                // console.log("event clicked: ", eventClickInfo._def.extendedProps.user_id);
                // console.log("event clicked: ", new Date(eventClickInfo.event.startStr));
            },
            eventRender: function(event, element, view){
                element.popover({
                    title: title,
                    // placement:'top',
                    trigger : 'hover',
                    content: "startTime" + " to " + "endTime" + " " + "location",
                    container:'body'
                }).popover('show');
            },

            // eventDrop: function (info) {
            //     var eventDate = moment(info.event.start).format("YYYY-MM-DD"); 
            //     console.log("ID  "+eventDate)
                              
            //     $.ajax({
            //         url: ("edit-event.php"),
            //         data: ({
            //             date_sched: eventDate,
            //             id: info.event.id
            //         }),
            //         type: "POST",
            //         success: function (response) {
            //             displayMessage("Update Successfully");
            //             console.log("Update Successfully  ")
            //         },
            //         error: function (xhr, status, error) {
            //             alert("fail");
            //         }
            //     });

                    
            // },
            // selectable: true,
            // selectHelper: true,
            // select: function (info) {
            //     var title = prompt('');

            //     if (title) {
            //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

            //         $.ajax({
            //             url: 'add-event.php',
            //             data: 'title=' + title + '&start=' + start + '&end=' + end,
            //             type: "POST",
            //             success: function (data) {
            //                 displayMessage("Added Successfully");
            //             }
            //         });
            //         calendar.fullCalendar('renderEvent',
            //                 {
            //                     title: title,
            //                     start: start,
            //                     end: end,
            //                     allDay: allDay
            //                 },
            //         true
            //                 );
            //     }
            //     calendar.fullCalendar('unselect');
            // },
            
            editable  : true,
            selectable: true,
            // selectAllow: function(select) {
            //         console.log(moment(select.start).format('dddd'))
            //     if(moment().subtract(1, 'day').diff(select.start) < 0 &&
            //         (moment(select.start).format('dddd') != 'Saturday' 
            //         && moment(select.start).format('dddd') != 'Sunday'))
            //         return true;
            //     else
            //         return false;
            // }
        });

        calendar.render();
        //$('#calendar').fullCalendar()
        function createUserItem(name) {
            let p = document.createElement('p');
            p.textContent = name;
            return p;
        }

        $('#serviceslist').on('change', function (e) {
			e.preventDefault();
			calendar.refetchEvents();
		});
        $('.add-client-modal').on('click', function (e) {
            if (e.target !== this) return;
            $('.event-date').text('');
            $('.event-time').text('');
            $('.service-type').text('');
            $('.username').text('');
            $('#add-user').val('');
            document.querySelector('#users-list').innerHTML = '';
            /////
            $(this).css("display","none");;
		});
        $('#add-user').on("change paste keyup", function(e){ 
            document.querySelector('#users-list').innerHTML = '';
            const searchString = document.getElementById('add-user').value;
            $.ajax({
                url: _base_url_+"admin/dashboard/get-user.php",
                data: 'userName=' + searchString,
                dataType: "json",
                type: "POST",
                success: function (resp) {
                    
                    resp.forEach((el) => {
                        // console.log(el);
                        let userItem = createUserItem(el.name);
                        userItem.setAttribute("data-identity", el.id);
                        userItem.setAttribute("class", "selectable-users");
                        document.getElementById("users-list").appendChild(userItem);
                        
                    });
                },
                error: function (xhr, status, error) {
                    console.log(error);
                    console.log(status);
                    console.log(xhr);
                    console.log("fail");
                }
            });
        });

        $('#add-user-form').on("submit", function(e){ 
            e.preventDefault();
            if(!selectedUserId) return;
            console.log()
            const searchString = document.getElementById('add-user').value;
            $.ajax({
                url: _base_url_+"admin/dashboard/update-schedule.php",
                data: 'userId=' + selectedUserId + '&selectedEvent=' + selectedEvent,
                dataType: "json",
                type: "POST",
                success: function (resp) {
                    
                    console.log(resp);
                    $('.username').text($('#add-user').val());
                    calendar.refetchEvents();

                },
                error: function (xhr, status, error) {
                    console.log(error);
                    console.log(status);
                    console.log(xhr);
                    console.log("fail");
                }
            });
        });
        
        $(document).on('click','.selectable-users',function(e){
            $('#add-user').val((e.target.innerHTML));
            selectedUserId = e.target.dataset.identity;
        });
    });
//     function displayMessage(message) {
// 	    $(".response").html("<div class='success'>"+message+"</div>");
//     setInterval(function() { $(".success").fadeOut(); }, 1000);
// }
    
</script>
