<?php

    class Booking_model extends CI_Model{

        function __construct()
        {
			// Call the Model constructor
            parent::__construct();
        }

		
       
		public function booking_slot(){
			
			$booking_date       = $this->input->post('booking_date');
		    $clinic_id          = $this->input->post('clinic_id');
		    $doctor_id          = $this->input->post('doctor_id');
		    $diagnosis_id       = $this->input->post('diagnosis_id');
		    $diagnosis_duration = $this->input->post('diagnosis_duration');
			 if($this->input->post('diagnosis_duration')==null){
				 $diag_string 		= "SELECT diagnose_slot_duration FROM tbl_diagnose WHERE diagnose_id=$diagnosis_id";
				$diag_query  		= $this->db->query($diag_string);
				$diagnosis_duration = $diag_query->row()->diagnose_slot_duration;
			 }
			$doctor_array=array();
			
			
			$doctor_string 		= "SELECT doctor_clinic_doctor,  (TIME_TO_SEC(doctor_clinic_to) - TIME_TO_SEC(doctor_clinic_from))/60 AS minutes,TIME_TO_SEC(doctor_clinic_from)/60 as total_minut
								FROM tbl_doctor_clinic WHERE WEEKDAY(DATE_FORMAT(STR_TO_DATE('$booking_date','%d/%m/%Y'), '%Y-%m-%d'))=doctor_clinic_day  AND doctor_clinic_status=1";
            $doctor_query  		= $this->db->query($doctor_string);
            $doctor_row 		= $doctor_query->row();
			
			$booking_string 	= "SELECT SUBSTRING(booking_time,1,5) as booking_time FROM tbl_booking WHERE booking_date='$booking_date' AND booking_clinic=$clinic_id AND booking_doctor=$doctor_id";
            $booking_query  	= $this->db->query($booking_string);
            $booking_result		= $booking_query->result();
            $booking_array		= array_column($booking_result,'booking_time');
            
            $blocking_string 	= "SELECT SUBSTRING(blocking_slot_time,1,5) as blocking_time FROM tbl_blocking_slot INNER JOIN tbl_doctor ON doctor_id=blocking_slot_doctor WHERE blocking_slot_date='$booking_date' AND blocking_slot_clinic=$clinic_id AND doctor_user=$doctor_id";
            $blocking_query  	= $this->db->query($blocking_string);
            $blocking_result		= $blocking_query->result();
			
			$blocking_array=array_column( $blocking_result,'blocking_time');
			    $total_minut=$doctor_row ->total_minut;
				$slot_total=0;
				
				$slots_p_hr=60/$diagnosis_duration; 
				for($i=1;$i<=$doctor_row->minutes/30;$i++){
				    
				    $slot_total=$slot_total+$diagnosis_duration;
				    
				    //$bfr_time_fm=($total_minut-(2*15)<$doctor_row ->total_minut)?$doctor_row ->total_minut:$total_minut-(2*15);
				    $bfr_time_fm=$total_minut-(2*$diagnosis_duration);
				    $bfr_time_to=$total_minut+(2*$diagnosis_duration);
				     $act_time=sprintf("%02d",intdiv($total_minut, 60)).':'. sprintf("%02d", ($total_minut % 60)) ;
				     
				  
				     
				     
				    if(!in_array($act_time,$booking_array) && !in_array($act_time,$blocking_array)){
				        
					    $array=['slot_name'=>'slot:'.$i,'slot_from'=>intdiv($bfr_time_fm, 60).':'. sprintf("%02d", ($bfr_time_fm % 60)),'slot_to'=>intdiv($bfr_time_to, 60).':'. sprintf("%02d", ($bfr_time_to % 60)),'act_time'=>$act_time ];
				    	$doctor_array[]=$array;
				    }
					$total_minut=$total_minut+30;
				
				}
			
			return $doctor_array;
			
			/*$clinic				= $this->input->post('clinic');
			$doctor				= $this->input->post('doctor');
			$diagnose			= $this->input->post('diagnose');
			$booking_date		= $this->input->post('booking_date');
			
			$clinic_string 		= "SELECT schedule_from as clinic_working_from,schedule_to as clinic_working_to,(TIME_TO_SEC(schedule_to) - TIME_TO_SEC(schedule_from))/60 AS minutes
								FROM tbl_clinic
								INNER JOIN tbl_clinic_schedule ON clinic_id=schedule_clinic
								WHERE clinic_id=$clinic AND  WEEKDAY(DATE_FORMAT(STR_TO_DATE('$booking_date', '%d/%m/%Y'), '%Y-%m-%d'))=schedule_day AND schedule_status=1";
								
            $clinic_query  		= $this->db->query($clinic_string);
            $clinic_result 		= $clinic_query->row();
			$clinic_total_minut	= $clinic_result->minutes;
			$clinic_from		= $clinic_result->clinic_working_from;
			$clinic_to			= $clinic_result->clinic_working_to;
			
			$doctor_string 		= "SELECT doctor_clinic_doctor, ABS((TIME_TO_SEC('$clinic_from') - TIME_TO_SEC(doctor_clinic_from))/60) AS doctor_clinic_diff, (TIME_TO_SEC(doctor_clinic_to) - TIME_TO_SEC(doctor_clinic_from))/60 AS minutes
								FROM tbl_doctor_clinic WHERE WEEKDAY(DATE_FORMAT(STR_TO_DATE('$booking_date','%d/%m/%Y'), '%Y-%m-%d'))=doctor_clinic_day  AND doctor_clinic_status=1";
            $doctor_query  		= $this->db->query($doctor_string);
            $doctor_result 		= $doctor_query->result();
			print_r($doctor_result);
			echo '<br>';
			//$doctor_total_minut	= $doctor_result->minutes;
			foreach($doctor_result as $doctor_row)
			{
				$slot_total=0;
				$slots=array();
				for($i=1;$i<=$clinic_total_minut/15;$i++){
					
					
					if($slot_total>=$doctor_row->doctor_clinic_diff && $slot_total<$doctor_row->doctor_clinic_diff+$doctor_row->minutes){
						$slots[]=$slot_total.'---slot:'.$i.'-'.'15:minut--active';
					}
					else{
						$slots[]=$slot_total.'---slot:'.$i.'-'.'15:minut--inactive';
					}
					$slot_total=$slot_total+15;
				}
				
				$doctor_array[]=array(
					'doctor_id'=>$doctor_row->doctor_clinic_doctor,
					'slots'=>$slots,
				);
				
			}
			foreach($doctor_array as $row){
				echo "<pre>";
				print_r($row);
				echo "<pre>";
			}
            //return   $result;*/
		}
		

		

    }