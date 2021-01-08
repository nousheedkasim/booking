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
								FROM tbl_doctor_clinic WHERE WEEKDAY(DATE_FORMAT(STR_TO_DATE('$booking_date','%d/%m/%Y'), '%Y-%m-%d'))=doctor_clinic_day  AND doctor_clinic_doctor=$doctor_id  AND doctor_clinic_clinic=$clinic_id AND doctor_clinic_status=1";
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
			
			
		}
		
		public function doctor_booking_slot(){
		    
		    $bookin_date        = $this->input->post('booking_date');
		    $clinic_id          = $this->input->post('clinic_id');
		   $user_id          = $this->input->post('user_id');
		   
		    $diagnosis_id       = $this->input->post('diagnosis_id');
		    $diagnosis_duration = $this->input->post('diagnosis_duration');
			
			$doctor_string 		= "SELECT doctor_clinic_doctor,  (TIME_TO_SEC(doctor_clinic_to) - TIME_TO_SEC(doctor_clinic_from))/60 AS minutes,TIME_TO_SEC(doctor_clinic_from)/60 as total_minut
								FROM tbl_doctor_clinic
								INNER JOIN tbl_doctor ON doctor_id=doctor_clinic_doctor  WHERE doctor_clinic_clinic= $clinic_id AND doctor_user= $user_id";
            $doctor_query  		= $this->db->query($doctor_string);
            $doctor_row 		= $doctor_query->row();
			
			$booking_string 	= "SELECT SUBSTRING(booking_time,1,5) as booking_time FROM tbl_booking INNER JOIN tbl_doctor ON doctor_id=booking_doctor WHERE booking_date='$bookin_date' AND booking_clinic=$clinic_id AND doctor_user=$user_id";
            $booking_query  	= $this->db->query($booking_string);
            $booking_result		= $booking_query->result();
            
             $blocking_string 	= "SELECT SUBSTRING(blocking_slot_time,1,5) as blocking_time FROM tbl_blocking_slot INNER JOIN tbl_doctor ON doctor_id=blocking_slot_doctor WHERE blocking_slot_date='$bookin_date' AND blocking_slot_clinic=$clinic_id AND doctor_user=$user_id AND blocking_slot_status=9";

            $blocking_query  	= $this->db->query($blocking_string);
            $blocking_result		= $blocking_query->result();

			    $total_minut=$doctor_row ->total_minut;
				$slot_total=0;
				
				$slots_p_hr=60/15;
				for($i=1;$i<=$doctor_row->minutes/30;$i++){
				    
				    $slot_total=$slot_total+15;
				    
				    $bfr_time_fm=$total_minut-(2*15);
				    $bfr_time_to=$total_minut+(2*15);
				    $act_time=sprintf("%02d",intdiv($total_minut, 60)).':'. sprintf("%02d", ($total_minut % 60)) ;
				    if(!in_array($act_time,array_column($booking_result,'booking_time')) ){
						
				        if(in_array($act_time,array_column($blocking_result,'blocking_time'))){
				            $array=['block_status'=>'1','status'=>'2','slot_name'=>'slot:'.$i,'slot_from'=>intdiv($bfr_time_fm, 60).':'. sprintf("%02d", ($bfr_time_fm % 60)),'slot_to'=>intdiv($bfr_time_to, 60).':'. sprintf("%02d", ($bfr_time_to % 60)),'act_time'=>$act_time ];

				        }
				        else{
				            $array=['block_status'=>'0','status'=>'0','slot_name'=>'slot:'.$i,'slot_from'=>intdiv($bfr_time_fm, 60).':'. sprintf("%02d", ($bfr_time_fm % 60)),'slot_to'=>intdiv($bfr_time_to, 60).':'. sprintf("%02d", ($bfr_time_to % 60)),'act_time'=>$act_time ];

				        }
						$doctor_array[]=$array;
				    }
					$total_minut=$total_minut+30;
				
				}
			return $doctor_array;
		
		}
		
		
		
		
		
		public function patient_booking(){
		    
			
		    $patient_id=$this->input->post('patient_id');
		    if($this->input->post('status')==1)
		       {
        		    $patient_deatails['patient_name']	=  $this->input->post('patient_name');
        		    $patient_deatails['patient_address']=  $this->input->post('patient_address');
        		    $patient_deatails['patient_age']	=  '';
        		    $patient_deatails['patient_gender']	=  $this->input->post('patient_gender');
        		    $patient_deatails['patient_mobile']	=  $this->input->post('patient_mobile');
        		    $patient_deatails['patient_dob']	=  date("Y-m-d", strtotime($this->input->post('patient_dob')));
        		    $patient_deatails['patient_refer_user']	=  $this->input->post('user_id');
        		        
        		   if($this->db->insert('tbl_patient', $patient_deatails)){
        		     $patient_id	= $this->db->insert_id();
        		   }
		       }
		       
		        
        		$clinic_id	=  $this->input->post('clinic_id');
        		$doctor_id	=  $this->input->post('doctor_id');
        		$booking_date	=  date("Y-m-d", strtotime($this->input->post('booking_date')));
        		$actual_time	=  $this->input->post('actual_time');
        	    $diagnosis	=  $this->input->post('diagnosis_id');
        		
        		
        		$booking_string="INSERT INTO  tbl_booking (booking_tocken,booking_patient,booking_diagnosis, booking_clinic, booking_doctor,booking_date,booking_time)
                                SELECT CONCAT('TK',case when max(booking_id) is NOT null then max(booking_id)+1 else 1 end),$patient_id,$diagnosis,$clinic_id,$doctor_id,'$booking_date','$actual_time'
                                FROM  tbl_booking";
		
			    if($this->db->query($booking_string)){
			        
			        $return['tocken']='TK'.$this->db->insert_id();
			        $return['status']='1';
			       
			        
			    }
			    else{
			        $return['status']='0';
			    }
		    return  $return;
		}
		
		public function last_bookings(){
		    
		    $where='WHERE 1=1';
		    if($this->input->post('user_id')!=null){
		        $user_id=$this->input->post('user_id');
		        $where=$where." AND patient_refer_user=$user_id";
		    }
		   
		    
		    $string 		= "SELECT booking_id,patient_id,patient_name,doctor_name,clinic_name,booking_date,booking_time 
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
		                        INNER JOIN tbl_doctor ON booking_doctor=doctor_id
		                        INNER JOIN tbl_clinic ON booking_clinic=clinic_id 
		                        $where  ORDER BY booking_id DESC";
            $query  		= $this->db->query($string);
            $result 	= $query->result();
            return $result;
		}
		
		
		//api->booking()
		public function current_booking(){
		    
		      $where='WHERE booking_date >= CURRENT_DATE';
		    if($this->input->post('user_id')!=null){
		        $user_id=$this->input->post('user_id');
		        $where=$where." AND patient_refer_user=$user_id";
		    }
		   
		    
		    $string 		= "SELECT booking_id,patient_id,patient_name,patient_address,patient_mobile,patient_dob,patient_gender,doctor_name,clinic_name,booking_date,booking_time,status_title as booking_status,diagnose_name 
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
		                        INNER JOIN tbl_doctor ON booking_doctor=doctor_id
		                        INNER JOIN tbl_clinic ON booking_clinic=clinic_id 
		                        INNER JOIN tbl_status ON booking_status=status_id
		                        INNER JOIN tbl_diagnose ON booking_diagnosis=diagnose_id
		                        $where ORDER BY booking_id DESC";
            $query  		= $this->db->query($string);
            $result 	= $query->result();
            return $result;
		}
		
		//api->booking()
		public function previous_booking(){
		    
		      $where='WHERE booking_date < CURRENT_DATE';
		    if($this->input->post('user_id')!=null){
		        $user_id=$this->input->post('user_id');
		        $where=$where." AND patient_refer_user=$user_id";
		    }
		   
		    
		    $string 		= "SELECT booking_id,patient_id,patient_name,patient_address,patient_mobile,patient_dob,patient_gender,doctor_name,clinic_name,booking_date,booking_time,status_title as booking_status,diagnose_name 
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
		                        INNER JOIN tbl_doctor ON booking_doctor=doctor_id
		                        INNER JOIN tbl_clinic ON booking_clinic=clinic_id 
		                        INNER JOIN tbl_status ON booking_status=status_id
		                        INNER JOIN tbl_diagnose ON booking_diagnosis=diagnose_id
		                        $where ORDER BY booking_id DESC";
            $query  		= $this->db->query($string);
            $result 	= $query->result();
            return $result;
		}
		
		//api->booking()
		public function booking_details(){
		    
		    
		    $booking_id=$this->input->post('booking_id');
			
		    $string 		= "SELECT tbl_patient.*,booking_date,booking_time,clinic_id,clinic_name,doctor_id,doctor_name,diagnose_id as diagnosis_id,diagnose_name,status_title
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
		                        INNER JOIN tbl_clinic ON booking_clinic=clinic_id
		                        INNER JOIN tbl_doctor ON booking_doctor=doctor_id
		                        INNER JOIN tbl_diagnose ON booking_diagnosis=diagnose_id
		                        INNER JOIN  tbl_status ON booking_status=status_id
		                        WHERE booking_id=$booking_id ";
			
            $query  = $this->db->query($string);
            $result = $query->row();
            return   $result;
		   
		    
		  
		}
		
		public function patient_booking_update(){
		    
		       
		        $booking_id=$this->input->post('booking_id');
		        $patient_id=$this->input->post('patient_id');
        		$clinic_id	=  $this->input->post('clinic_id');
        		$doctor_id	=  $this->input->post('doctor_id');
        		$booking_date	=  $this->input->post('booking_date');
        		$actual_time	=  $this->input->post('actual_time');
        	    $diagnosis	=  $this->input->post('diagnosis_id');
        		
        		
        		$booking_string="UPDATE  tbl_booking SET booking_diagnosis=$diagnosis, booking_clinic=$clinic_id, booking_doctor=$doctor_id,booking_date='$booking_date',booking_time='$actual_time' 
        		                WHERE booking_id=$booking_id";
		
			    if($this->db->query($booking_string)){
			        
			        $return['status']='1';
			        
			    }
			    else{
			        $return['status']='0';
			    }
		    return  $return;
		    
		    
		}
		
		public function booking_closing(){
		    
		    $clinic_id	    =  $this->input->post('clinic_id');
        	$doctor_id	    =  $this->input->post('doctor_id');
        	$booking_date	=  $this->input->post('booking_date');
		    
		    
		}
		
			public function doctor_current_booking(){
		    
		    
		      $where='WHERE booking_date >= CURRENT_DATE';
		    if($this->input->post('user_id')!=null){
		        $user_id=$this->input->post('user_id');
		        $where=$where." AND doctor_user=$user_id ";
		        
		        $string 		= "SELECT booking_id,patient_id,patient_name,patient_address,patient_mobile,patient_dob,patient_gender,doctor_name,clinic_name,booking_date,booking_time,status_title as booking_status,diagnose_name 
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
		                        INNER JOIN tbl_doctor ON booking_doctor=doctor_id
		                        INNER JOIN tbl_clinic ON booking_clinic=clinic_id 
		                        INNER JOIN tbl_status ON booking_status=status_id
		                        INNER JOIN tbl_diagnose ON booking_diagnosis=diagnose_id
		                        $where  ORDER BY booking_id DESC";
            $query  		= $this->db->query($string);
            $result 	= $query->result_array();
            return $result;
		    }
		}
		
		
			public function doctor_previous_booking(){
		    
		    
		      $where='WHERE booking_date < CURRENT_DATE';
		    if($this->input->post('user_id')!=null){
		        $user_id=$this->input->post('user_id');
		        $where=$where." AND doctor_user=$user_id ";
		        
		        $string 		= "SELECT booking_id,patient_id,patient_name,patient_address,patient_mobile,patient_dob,patient_gender,doctor_name,clinic_name,booking_date,booking_time,status_title as booking_status,diagnose_name 
		                        FROM tbl_booking 
		                        INNER JOIN tbl_patient ON booking_patient=patient_id
		                        INNER JOIN tbl_doctor ON booking_doctor=doctor_id
		                        INNER JOIN tbl_clinic ON booking_clinic=clinic_id 
		                        INNER JOIN tbl_status ON booking_status=status_id
		                        INNER JOIN tbl_diagnose ON booking_diagnosis=diagnose_id
		                        $where  ORDER BY booking_id DESC";
            $query  		= $this->db->query($string);
            $result 	= $query->result_array();
            return $result;
		    }
		}
		
		
			
		
		public function block_slot(){
		
		        $clinic_id	=  $this->input->post('clinic_id');
        		$user_id	=  $this->input->post('user_id');
        		$blocking_date	=  $this->input->post('blocking_date');
        		$act_time	=  $this->input->post('act_time');
			
                $string 	= "SELECT doctor_id FROM tbl_doctor WHERE doctor_user=$user_id";
                $query  	= $this->db->query($string);
                $doctor_id 	= $query->row()->doctor_id;
                $blocking_slot_time=array();
                $block_deatails=array();
                
                if($doctor_id!=null || $doctor_id!=''){
               
                    $json_decode=json_decode($act_time);
                    
                    foreach ($json_decode as $item){
                        
                        if($item->status==1){
                            
                            $block_deatails[]=array('blocking_slot_clinic'	=> $clinic_id,
										'blocking_slot_doctor'	=> $doctor_id,
										'blocking_slot_date'	=> $blocking_date,
										'blocking_slot_time'    => $item->act_time,
										'blocking_slot_status'  => 9
										);
                        }
                        
                        else{
                        
                            $blocking_slot_clinic[]=$clinic_id;
                            $blocking_slot_doctor[]=$doctor_id;
                            $blocking_slot_date[]=$blocking_date;
                           $blocking_slot_time[]=$item->act_time;
                        }
                        
                    }
                    
                $this->db->trans_start();
                
                if(count($blocking_slot_time)>0){
	
                    $this->db->where_in('blocking_slot_doctor',$blocking_slot_doctor);
                    $this->db->where_in('blocking_slot_doctor',$blocking_slot_doctor);
                    $this->db->where_in('blocking_slot_date',$blocking_slot_date);
                    $this->db->where_in('blocking_slot_time',$blocking_slot_time);
                    $this ->db->delete('tbl_blocking_slot');
                }
		      
			    if(count($block_deatails)>0){
			        $this->db->insert_batch('tbl_blocking_slot',$block_deatails);
		    	}
		    	
		    	$this->db->trans_complete();
		    	
		    	if ($this->db->trans_status() == TRUE)
                {
                        $return['status']='1';
                }
		        else{
		            $return['status']='0';
		        }
		        
				 return  $return;
            }
		
		}
		
		//Receptiondashboard
		public function bookings($user_id,$user_type){
			
			//$date			= date("Y-m-d");
			$date			="2020-12-25";
			$min_duration	= SLOT_MINIMUM_DURATION;
			
			$doctor_string	="SELECT doctor_id,doctor_name,
									CEIL(((TIME_TO_SEC(schedule_to) - TIME_TO_SEC(schedule_from))/60)/$min_duration) AS total_slot,
									TIME_TO_SEC(schedule_from)/60 as slot_start
							FROM tbl_doctor
							INNER JOIN tbl_doctor_clinic ON doctor_clinic_doctor=doctor_id
							INNER JOIN tbl_clinic ON clinic_id=doctor_clinic_clinic
							INNER JOIN tbl_clinic_schedule ON clinic_id=schedule_clinic
							WHERE clinic_user=$user_id 
								AND doctor_clinic_status=1
								AND WEEKDAY('$date')=doctor_clinic_day								
								AND WEEKDAY('$date')=schedule_day
							GROUP BY doctor_id 
							ORDER BY doctor_name ASC";
			$doctor_query  	= $this->db->query($doctor_string);
            $doctor_result	= $doctor_query->result();
			
			$total_slot		= $doctor_result[0]->total_slot;
			$slot_start		= $doctor_result[0]->slot_start;
			
			
			$th[]		= array('id'=>0,'name'=>"Slot");
			$doctor_array[]=array('id'=>0,'name'=>"Slot");
			foreach($doctor_result as $doctor){
				
				$doctor_id		= $doctor->doctor_id;
				$booking_string = " SELECT booking_id,patient_id,patient_name,patient_mobile,doctor_id,booking_time,
										diagnose_name,diagnose_slot_duration,TIME_TO_SEC(booking_time)/60 as slot_from,
										(TIME_TO_SEC(booking_time)/60)+diagnose_slot_duration as slot_to,status_title as booking_status
									FROM tbl_booking 
									INNER JOIN tbl_patient ON booking_patient=patient_id
									INNER JOIN tbl_doctor ON booking_doctor=doctor_id
									INNER JOIN tbl_clinic ON booking_clinic=clinic_id 
									INNER JOIN tbl_status ON booking_status=status_id
									INNER JOIN tbl_diagnose ON booking_diagnosis=diagnose_id
									WHERE clinic_user=$user_id AND booking_date='$date' AND booking_doctor=$doctor_id";
				$booking_query  = $this->db->query($booking_string);
				$booking_result =  $booking_query->result();
				
				$doctor_array[$doctor->doctor_id]=$booking_result;
				$th[]=array('id'=>$doctor->doctor_id,'name'=>$doctor->doctor_name);
			}
			
			$slot_time=$slot_start;
			for($i=1;$i<=$total_slot;$i++){
				
				$td=[];
				foreach($doctor_array as $key=>$row){
					if($key==0){
						$td[]=[$slot_time,'ST-'.$i];
					}
					else{
						$det=[];
						foreach($row as $item){
							
							if($item->slot_from==$slot_time){
								$dett=$item;
							}
							else{
								$dett=array();
							}
							$det=$dett;
						}
						$td[]=$det;
							//
						
					}
				}
				$tr[]=$td;
				$slot_time=$slot_time+$min_duration;
			}
			$table=['th'=>$th,'tr'=>$tr];
			print_r($table);
		}

		

    }