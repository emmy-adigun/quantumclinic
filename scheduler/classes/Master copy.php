<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			if(isset($sql))
			$resp['sql'] = $sql;
			return json_encode($resp);
			exit;
		}
	}
	function save_appointment(){
		extract($_POST);
		$sched_set_qry = $this->conn->query("SELECT * FROM `schedule_settings`");
		$sched_set = array_column($sched_set_qry->fetch_all(MYSQLI_ASSOC),'meta_value','meta_field');
		//$morning_start = date("Y-m-d ") . explode(',',$sched_set['morning_schedule'])[0];
		//$morning_end = date("Y-m-d ") . explode(',',$sched_set['morning_schedule'])[1];
		//$afternoon_start = date("Y-m-d ") . explode(',',$sched_set['afternoon_schedule'])[0];
		//$afternoon_end = date("Y-m-d ") . explode(',',$sched_set['afternoon_schedule'])[1];
		$date_sched =  date("F d, Y h:i:s A");
		$sched_time = date("Y-m-d ") . date("H:i",strtotime($date_sched));
		// if(!in_array(strtolower(date("l",strtotime($date_sched))),explode(',',strtolower($sched_set['day_schedule'])))){
		// 	$resp['status'] = 'failed';
		// 	$resp['msg'] = "Selected Schedule Day of Week is invalid.";
		// 	return json_encode($resp);
		// 	exit;
		// }
		// if(!( (strtotime($sched_time) >= strtotime($morning_start) && strtotime($sched_time) <= strtotime($morning_end)) || (strtotime($sched_time) >= strtotime($afternoon_start) && strtotime($sched_time) <= strtotime($afternoon_end)) )){
		// 	$resp['status'] = 'failed';
		// 	$resp['msg'] = "Selected Schedule Time is invalid.";
		// 	return json_encode($resp);
		// 	exit;
		// }
		$check = $this->conn->query("SELECT * FROM `appointments` where ('".strtotime($date_sched)."' Between unix_timestamp(date_sched) and unix_timestamp(DATE_ADD(date_sched, interval 30 MINUTE)) OR '".strtotime($date_sched.' +30 mins')."' Between unix_timestamp(date_sched) and unix_timestamp(DATE_ADD(date_sched, interval 30 MINUTE))) ".($id >0 ? " and id != '{$id}' " : ""))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Selected Schedule DateTime conflicts to other appointment.";
			return json_encode($resp);
			exit;
		}
		if(empty($patient_id))
		
		$sql = "INSERT INTO `patient_list` set name = '{$name}', service_length = '{$service_length}', price = '{$price}', service = '{$service}' , email = '{$email}' ";
		else
		$sql = "UPDATE `patient_list` set name = '{$name}' , service_length = '{$service_length}', price = '{$price}', service = '{$service}' , email = '{$email}' where id = '{$id}'  ";
		$save_inv = $this->conn->query($sql);
		$this->capture_err();
		if($save_inv){
			$patient_id = (empty($patient_id))? $this->conn->insert_id : $patient_id;
			if(empty($id))
			$sql = "INSERT INTO `appointments` set date_sched = '{$date_sched}',patient_id = '{$patient_id}' ";
			else
			$sql = "UPDATE `appointments` set date_sched = '{$date_sched}',patient_id = '{$patient_id}' where id = '{$id}' ";

			$save_sched = $this->conn->query($sql);
			$this->capture_err();
			$data = "";
			foreach($_POST as $k=> $v){
				if(!in_array($k,array('lid','date_sched','status','ailment'))){
					if(!empty($data)) $data .=", ";
					$data .= " ({$patient_id},'{$k}','{$v}')";
				}
			}
			$sql = "INSERT INTO `patient_meta` (patient_id,meta_field,meta_value) VALUES $data ";
			$this->conn->query("DELETE FROM `patient_meta` where patient_id = '{$patient_id}'");
			$save_meta = $this->conn->query($sql);
			$this->capture_err();
			if($save_sched && $save_meta){
				$resp['status'] = 'success';
				$resp['name'] = $name;
				$this->settings->set_flashdata('success',' Appointment successfully saved');
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "There's an error while submitting the data.";
			}

		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "There's an error while submitting the data.";
		}
		return json_encode($resp);
	}
	function multiple_action(){
		extract($_POST);
		if($_action != 'delete'){
			$stat_arr = array("pending"=>0,"confirmed"=>1,"cancelled"=>2);
			$status = $stat_arr[$_action];
			$sql = "UPDATE `appointments` set status = '{$status}' where patient_id in (".(implode(",",$ids)).") ";
			$process = $this->conn->query($sql);
			$this->capture_err();
		}else{
			$sql = "DELETE s.*,i.*,im.* from  `appointments` s inner join `patient_list` i on s.patient_id = i.id  inner join `patient_meta` im on im.patient_id = i.id where s.patient_id in (".(implode(",",$ids)).") ";
			$process = $this->conn->query($sql);
			$this->capture_err();
		}
		if($process){
			$resp['status'] = 'success';
			$act = $_action == 'delete' ? "Deleted" : "Updated";
			$this->settings->set_flashdata("success","Appointment/s successfully ".$act);
		}else{
			$resp['status'] = 'failed';
			$resp['error_sql'] = $sql;
		}
		return json_encode($resp);
	}

	function save_sched_settings(){
	extract($_POST);
	

		if(!empty($_POST['day_schedule'])){
			// foreach($_POST['day_schedule'] as $oneCheckbox ){
			//  // echo $checked."</br>";
			// //  $data = "$checked";
			
			// //   $sql = "INSERT INTO `schedule_settings` set weekly_monthly_schedule	 = '{$data}',
			// // , room_id = '{$room}'
			// // , service_id = '{$service}'
			// // , start_time = '{$start_time}'
			// // , room_conditions = '{$room_conditions}'
			// // , end_time = '{$end_time}'
			// // , schedule_time = '{$schedule_time}'
			// // ";
			//   $data = $oneCheckbox;
			
		
			// }

	$checkbox1=$_POST['day_schedule'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

   
	$sql = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
			VALUES ('$room', '$service',
			 '8:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql2 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '8:30','$room_conditions','$end_time','$schedule_time','$chk')";
	

	$sql3 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '9:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql4 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '9:30','$room_conditions','$end_time','$schedule_time','$chk')";
 

 $sql5 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '10:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql6 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '10:30','$room_conditions','$end_time','$schedule_time','$chk')";

 $sql7 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
 VALUES ('$room', '$service',
  '11:00','$room_conditions','$end_time','$schedule_time','$chk')";


$sql8 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '11:30','$room_conditions','$end_time','$schedule_time','$chk')";

$sql9 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '12:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql10 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '12:30','$room_conditions','$end_time','$schedule_time','$chk')";

$sql11 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '13:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql12= "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '13:30','$room_conditions','$end_time','$schedule_time','$chk')";


$sql13= "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '14:00','$room_conditions','$end_time','$schedule_time','$chk')";


$sql14 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '14:30','$room_conditions','$end_time','$schedule_time','$chk')";

$sql15 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '15:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql16 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '15:30','$room_conditions','$end_time','$schedule_time','$chk')";

$sql17 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '16:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql18 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '16:30','$room_conditions','$end_time','$schedule_time','$chk')";

$sql19 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '17:00','$room_conditions','$end_time','$schedule_time','$chk')";

$sql20 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '17:30','$room_conditions','$end_time','$schedule_time','$chk')";

$sql21 = "INSERT INTO `schedule_settings` (`room_id`,`service_id`,`start_time`,`room_conditions`,`end_time`,`schedule_time`,`weekly_monthly_schedule`) 
VALUES ('$room', '$service',
 '18:00','$room_conditions','$end_time','$schedule_time','$chk')";


	
		  }
		
		// $sql = "INSERT INTO `schedule_settings` set day_schedule1 = '{$day_schedule1}', 
		// day_schedule2 = '{$day_schedule2}', day_schedule3 = '{$day_schedule3}'
		// , day_schedule4 = '{$day_schedule4}'
		// , day_schedule5 = '{$day_schedule5}'
		// , day_schedule6 = '{$day_schedule6}'
		// , day_schedule7 = '{$day_schedule7}'
		// , room_id = '{$room}'
		// , service_id = '{$service}'
		// , start_time = '{$start_time}'
		// , room_conditions = '{$room_conditions}'
		// , end_time = '{$end_time}'
		// , schedule_time = '{$schedule_time}'
		// ";
		//else
	//	$sql = "UPDATE `schedule_settings` set  room = '{$room}', schedule = '{$schedule}' where service = '{$service}'";
	//$sql1 = "UPDATE  `service` set  schedule = '{$schedule_times}' where id = '{$service}' ";
		/*
		D

	
Edit Edit
Copy Copy
Delete Delete
13
11
11
08:00
Clean
09:30
09:30
0

		*/
	$save = $this->conn->query($sql);
	  $this->conn->query($sql2);
	$this->conn->query($sql3);
    $this->conn->query($sql4);
	 $this->conn->query($sql5);
	 $this->conn->query($sql6);
	$this->conn->query($sql7);
	 $this->conn->query($sql8);
	 $this->conn->query($sql9);
	 $this->conn->query($sql10);
	 $this->conn->query($sql11);
	$this->conn->query($sql12);
	 $this->conn->query($sql13);
	 $this->conn->query($sql14);
	$this->conn->query($sql15);
	 $this->conn->query($sql16);
	$this->conn->query($sql17);
	$this->conn->query($sql18);
	$this->conn->query($sql19);
	$this->conn->query($sql20);
	$this->conn->query($sql21);
	
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',' Schedule settings successfully updated');
			
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
			$resp['msg'] = "An Error occure while excuting the query.";

			

		}
		return json_encode($resp);
	}
	


	function save_service(){
		extract($_POST);
		if(empty($id))
		$sql = "INSERT INTO `service` set  type = '{$type}', service_name = '{$service}', service_length = '{$service_length}', amount = '{$price}'";
		else
		$sql = "UPDATE  `service` set  type = '{$type}', service_name = '{$service}', service_length = '{$service_length}', amount = '{$price}' where id = '{$id}' ";
		
		
		$save = $this->conn->query($sql);
	
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',' Service successfully updated');
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
			$resp['msg'] = "An Error occure while excuting the query.";

		}
		return json_encode($resp);
	}
	



	function save_comments(){
		
		extract($_POST);
		if(empty($id));
		
		$dates = date("F d, Y h:i:s A");
	  $sql = "INSERT INTO `comments` (`comments_text`,`patient_id`,`date_time`) 
	  VALUES ('$comments', '$id','$dates')";
	
		$save = $this->conn->query($sql);
	
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',' Comments successfully updated');
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
			$resp['msg'] = "An Error occure while excuting the query.";
	
		}
		return json_encode($resp);
	}

	
	function save_room(){
		extract($_POST);
		if(empty($id))
		$sql = "INSERT INTO `room` set  name = '{$name}', description = '{$description}' , service_id = '{$service}' ";
		else
		$sql = "UPDATE  `room` set  name = '{$name}', description = '{$description}', service_id = '{$service}' where id = '{$id}' ";

		$save = $this->conn->query($sql);
	
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',' Room successfully updated');
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
			$resp['msg'] = "An Error occure while excuting the query.";

		}
		return json_encode($resp);
	}
	//ame	Email	Address	Price	Code	Staff	Service

	function save_corperate(){
		extract($_POST);
		if(empty($id))
		$sql = "INSERT INTO `corperate` set  name = '{$name}', email = '{$email}' , address = '{$address}' , price = '{$price}' ,  code = '{$code}',  staff = '{$staff}',  service = '{$service}'";
	
	else
	$sql = "UPDATE  `corperate` set  name = '{$name}', email = '{$email}' , address = '{$address}' , price = '{$price}' ,  code = '{$code}',  staff = '{$staff}',  service = '{$service}'  where id = '{$id}'";
	
		$save = $this->conn->query($sql);
	
		if($save){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',' Room successfully updated');
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
			$resp['msg'] = "An Error occure while excuting the query.";

		}
		return json_encode($resp);
	}
	
}





$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_appointment':
		echo $Master->save_appointment();
	break;
	case 'multiple_action':
		echo $Master->multiple_action();
	break;
	case 'save_sched_settings':
		echo $Master->save_sched_settings();
		break;

		case 'save_service':
			echo $Master->save_service();
			break;

			case 'save_room':
				echo $Master->save_room();
				break;
	
				case 'save_corperate':
					echo $Master->save_corperate();
					break;
				
					case 'save_comments':
						echo $Master->save_comments();
						break;
	default:
		// echo $sysset->index();
		break;

		function saveSS(){
			if (isset($_GET['region'])) {
	
				$region = mysqli_real_escape_string($sql,$_GET['region']);
				$query = "SELECT * FROM service WHERE room_id = $region";
				$ret = $this->conn->query($query);
				$result = array();
				while ($row = $ret->fetch_assoc()) {
					 $result[] = array(
						 'value' => $row['id'],
						 'name' => $row['service_name']
					 );
				}
				echo json_encode($result);
			}
			
		}
		
}