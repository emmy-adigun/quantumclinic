<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<h1 class="text-white">Random schedule</h1>
<div class="text-white">
	<form id="darsbaord" action='#' method="post" class="py-2">

		<div class="container">
			<div class="form-group">

		<?php
			$qry2 = $conn->query("SELECT ro.ID, ro.name, se.service_name FROM `room` ro left join `service` se on ro.ID = se.room_id");
			$getRoomsResult = $qry2->fetch_all(MYSQLI_ASSOC);
		?>
		<select type="text" class="custom-select" id="roomlist" name="select-room" required  style="width: auto;">
			<option value =""> Select Room</option>
			<?php
					foreach($getRoomsResult as $row){
						$ID = $row['ID'];
						$name = $row['name'];
				
			?>
 			<option   value='<?php echo $ID ?>' <?php if($getRoomsResult[0] == $row): echo "selected"; endif; ?>><?php echo $name ?></option>
                <?php


    				}
                ?>
        </select>
    	</div></div>
    </form>
<?php 

	// $queryString = "SELECT ra.*, ro.name, se.service_name from `random_schedule` ra inner join `room` ro on ra.room_id = ro.id inner join `service` se on se.room_id = ro.id group by ro.id where ro.name ='" .$roomName. "' and cast(ra.date as date) between '".$startDate."' and '".$endDate."'";
	// $qry = $conn->query($queryString);
	// $result = $qry->fetch_all(MYSQLI_ASSOC);

	// echo json_encode($result);
?>
	<div class="card">
		<div class="card-body">
			<div id="calendar"></div>
		</div>
  	</div>
</div>

<script>
	
	var calendarEl = document.getElementById('calendar');

	function isoDateWithoutTimeZone(date) {
		if (date == null) return date;
		var timestamp = date.getTime() - date.getTimezoneOffset() * 60000;
		var correctDate = new Date(timestamp);
		// correctDate.setUTCHours(0, 0, 0, 0); // uncomment this if you want to remove the time
		return correctDate.toISOString();
	}

	$(function(){
		var calendar = new FullCalendar.Calendar(calendarEl, {
			initialView: "timeGridWeek",
			slotMinTime: "08:00:00",
			slotMaxTime: "20:00:00",
			slotDuration: "00:15:00",
			slotLabelInterval: "00:15:00",
			dayCellClassNames: "true",
			allDaySlot: false,
			themeSystem: 'bootstrap',
			eventBackgroundColor: "green",
			selectable: true,
			eventDurationEditable: true,
			datesSet: function(dateInfo){
				console.log("start: ", dateInfo.start);
				console.log("end: ", dateInfo.end);
			},
			select: function(info) {
				console.log("eventClick");

				var start = isoDateWithoutTimeZone(info.start).replace("T", " ").split(".")[0];
                var end = isoDateWithoutTimeZone(info.end).replace("T", " ").split(".")[0];
				var selectTag = document.getElementById('roomlist');
				var roomId = selectTag.value;

				$.ajax({
                    url: _base_url_+"admin/random-schedule/create-event.php",
					data: 'startDate=' + start + '&endDate=' + end + '&roomId=' + roomId,
                    type: "POST",
					// contentType: "",
                    success: function (resp) {
						calendar.refetchEvents();
                    },
                    error: function (xhr, status, error) {
						console.log(error);
						console.log("fail");
                    }
                });
			},
			// selectAllow: function(selectInfo){
			// 	console.log("selectInfo: ", selectInfo);
			// },
			eventClick: function({event, el, jsEvent, view}){
				jsEvent.preventDefault();
				var startDate = isoDateWithoutTimeZone(new Date(event.startStr)).replace("T", " ").split(".")[0];
				var selectTag = document.getElementById('roomlist');
				var roomId = selectTag.value;

				$.ajax({
                    url: _base_url_+"admin/random-schedule/delete-event.php",
					data: 'startDate=' + startDate + '&roomId=' + roomId,
					dataType: "json",
                    type: "POST",
					// contentType: "",
                    success: function (resp) {
						console.log("deleted");
						calendar.refetchEvents();
						// return false;
                    },
                    error: function (xhr, status, error) {
						console.log(error);
						console.log("fail");
                    }
                });

			},
			eventResize: function(eventResizeInfo){
				const eventId = eventResizeInfo.event._def.publicId;
				var endDate = isoDateWithoutTimeZone(new Date(eventResizeInfo.event.end)).replace("T", " ").split(".")[0];

				$.ajax({
                    url: _base_url_+"admin/random-schedule/update-event.php",
					data: 'endDate=' + endDate + '&eventId=' + eventId,
					dataType: "json",
                    type: "POST",
					// contentType: "",
                    success: function (resp) {
						calendar.refetchEvents();
                    },
                    error: function (xhr, status, error) {
						console.log(error);
						console.log("fail");
                    }
                });
			},
			events: function( fetchInfo, successCallback, failureCallback ) { 
				var startDate = fetchInfo.start.toISOString('YYYY-MM-DD');
				var endDate = fetchInfo.end.toISOString('YYYY-MM-DD');
				var selectTag = document.getElementById('roomlist');
				var roomName = selectTag.options[selectTag.selectedIndex].text;

				$.ajax({
                    url: _base_url_+"admin/random-schedule/api.php",
					data: 'startDate=' + startDate + '&endDate=' + endDate + '&roomName=' + roomName,
					dataType: "json",
                    type: "POST",
					// contentType: "",
                    success: function (resp) {
						resp.map((item) => {item.title = "coming"; return item});
						successCallback(resp);

						const eventsObject = calendar.view.calendar.currentData.eventStore.defs;

						if (jQuery.isEmptyObject(eventsObject)){
							var start = new Date(calendar.view.currentStart);
							var end = new Date(calendar.view.currentEnd);
							const timeArray = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", 
							"12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", 
							"17:00", "17:30", "18:00", "18:30", "19:00", "19:30", "20:00"];

							let eventsPayload = [];

							let loop = new Date(start);
							while(loop < end){
								timeArray.forEach((el, i) => {
									if(i < timeArray.length - 1){
										const dayDate = isoDateWithoutTimeZone(loop).replace("T", " ").split(".")[0].split(" ")[0];
										eventsPayload.push({start: dayDate + " " + el, end: dayDate + " " + timeArray[i+1]});
									}
								});      

								var newDate = loop.setDate(loop.getDate() + 1);
								loop = new Date(newDate);
							}
							
							let selectTag = document.getElementById('roomlist');
							let roomId = selectTag.value;

							$.ajax({
								url: _base_url_+"admin/random-schedule/create-multiple-events.php",
								data: 'events=' + JSON.stringify(eventsPayload) + '&roomId=' + roomId,
								type: "POST",
								// contentType: "",
								success: function (resp) {
									calendar.refetchEvents();
								},
								error: function (xhr, status, error) {
									console.log(error);
									console.log("fail");
								}
							});
						}

                    },
                    error: function (xhr, status, error) {
						console.log(error);
						console.log(status);
						console.log(xhr);
						console.log("fail");
                    }
                });


			}
		});

		calendar.render();

		$('#roomlist').on('change', function (e) {
			e.preventDefault();
			calendar.refetchEvents()
		})




	});
</script>