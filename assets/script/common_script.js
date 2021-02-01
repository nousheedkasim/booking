 var decimal_digits = $("#decimal_digits").val();
 var base_url = $("#base_url").val();
//Form submission
   



//Datatable



var $table = $('#datatable');
$table.dataTable({
    "bProcessing": "true",
    "bServerSide": "true",
    "sAjaxSource": $table.data('url'),
    "sPaginationType": "bs_normal",
});
//End Datatable

//Data Table with print//
var $table = $('#datatable_tool');
$table.dataTable({
    bProcessing: true,
    bServerSide: true,
    sAjaxSource: $table.data('url'),
    sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
    aButtons: [{
            sExtends: 'pdf',
            sButtonText: 'PDF'
        },
        {
            sExtends: 'csv',
            sButtonText: 'CSV'
        },
        {
            sExtends: 'xls',
            sButtonText: 'Excel'
        },
        {
            sExtends: 'print',
            sButtonText: 'Print',
            sInfo: 'Please press CTR+P to print or ESC to quit'
        }
    ]
});
//End Table with print//

//Delete Confirmation Popover
$(function() {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]',
        placement: 'left',
        href: $(this).attr('href'),
        content: function() {}
    });

});
//End Delete Confirmation Popover

//Flash data alert
if ($("#flash_data").length) {

    var type = $("#flash_status").val();
    var title = type.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
    var message = $("#flash_message").val();
    new PNotify({
        title: title,
        text: message,
        type: type
    });
}

//End Flash data




if ($("#reception").length) {
	
	$("#patient_search").select2({
		ajax: {
                url: 'Patient/patient_search',
                data: function(params) {
                    var query = {
                        search: params.term,

                    }
                    return query;
                },
                dataType: 'json'
            },
            minimumInputLength: 1,
			placeholder: "Patent Name"
	}).on('select2:select', function() {

        var select_data = $("#patient_search").select2('data');
        var selected_id = select_data[0].id;
		
		
		$("#patient_id").val(select_data[0].patient_id);
		$("#patient_name").val(select_data[0].patient_name);
		$("#mobile").val(select_data[0].patient_mobile);
		if(select_data[0].patient_gender=='1'){
			$("#male").prop('checked',true);
		}
		else{
			$("#female").prop('checked',true);
		}
		$("#dob").val(select_data[0].patient_dob);
		$("#address").val(select_data[0].patient_address);
        console.log(selected_id);
    });
		
		
		
		$("#patient").select2({ 
				ajax:{
					url:'Patient/get_patient',
					data:function(params){
						var query={
							search:params.term,
							
						}
						return query;
					},
					dataType:'json'
				},
				minimumInputLength	: 1,
				tags:true
			}).on('select2:select',function(){
				var patient=$("#patient").val();
				if(Math.floor(patient)==patient && $.isNumeric(patient)){
					$.ajax({
						type: "GET",
						url: 'patient/patient_booking_details?patient_id='+patient,
						success:function(response){
							var json = $.parseJSON(response);
							console.log(json);
							
							$("#mobile").val(json.patient_data.patient_mobile);
							$("#patient_id").val(json.patient_data.patient_id);
							$("#dob").val(json.patient_data.patient_dob);
							$("#gender").select2("val", json.patient_data.patient_gender);
							$("#clinic").select2("val", json.patient_data.clinic_id);
							$("#patient_address").html(json.patient_data.patient_address);
							$("#place").val(json.patient_data.patient_place);
							//$("#doctor").select2("val", json.patient_data.doctor_id);
							$("#duration").val(json.patient_data.duration);
							

							var newOption = new Option(json.patient_data.doctor_name, json.patient_data.doctor_id, false, false);
							$('#doctor').empty();
							$('#doctor').append(newOption).trigger('change');
								$("#diagnose").select2("val", json.patient_data.diagnosis_id);
							$("#status").val(0);
							$("#diagnose").focus();
							$("#booking_date").removeAttr("disabled").removeClass('hide');
							$("#booking_date").focus();
							
							
							
						}
					});
					
				}
				else{
					$("#status").val(1);
					$("#mobile").focus();
				}
				
				
			});
			$("#dob").datepicker().on('changeDate', function(ev){
				
				if(validateDateFormt($(this).val())==true){
					$("#gender").focus();
				};
				//$("#gender").focus();
			});

			//$("#dob").select(function(){
				//$("#gender").focus();
			//});
			$("#gender").select2({
				minimumResultsForSearch: Infinity
			}).on('select2:select',function(){
				$("#diagnose").focus();
			});
			
			$("#diagnose").select2({ 
				ajax:{
					url:'registration/get_diagnosis',
					data:function(params){
						var query={
							search:params.term,
							
						}
						return query;
					},
					dataType:'json'
				},
				minimumInputLength	: 1,
				tags:true
			}).on('select2:select',function(){
				
				$("#clinic").focus();
			}); 
			
			$("#clinic").select2({
				minimumResultsForSearch: Infinity
			}).on('select2:select',function(){
				var clinc_data =$("#clinic").select2('data');
				var clinic_id  =clinc_data[0].id;
					
					
				$("#doctor").select2({
					ajax:{
					url:'registration/get_doctor/'+clinic_id+'/',
					data:function(params){
						var query={
							search:params.term,
							
						}
						return query;
					},
					dataType:'json'
				}
					
				}).on('select2:select',function(){
					
					$("#booking_date").removeAttr("disabled").removeClass('hide');
					$("#booking_date").focus();
				}).focus();			
				
			});
			
		
		$("#booking_date").on('changeDate', function (ev) {
			var diagnose=$("#diagnose").val();
			var clinic=$("#clinic").val(); 
			var doctor=$("#doctor").val();
			var booking_date=$("#booking_date").val();
			
			if(diagnose=='' || diagnose==null || clinic=='' || clinic==null || doctor=='' || doctor==null || booking_date=='' || booking_date==null){
				alert("Make valid Selection");
			}
			else{
				//console.log(diagnose);
				//console.log(clinic);
				//console.log(doctor);
				//console.log(booking_date);
				slot('picker',diagnose,clinic,doctor,booking_date);
				$("#booking_btn").removeAttr("disabled");
				$("#booking_btn").focus();
			}
			
			
		});
		
		
	
 
 
 
		function  slot(element_dom,diagnose,clinic,doctor,booking_date){
	 
		
		 if(element_dom=='picker'){
          $("#picker").markyourcalendar({
            availability:arry_response(diagnose,clinic,doctor,booking_date),
			
			
            isMultiple: false,
            onClick: function(ev, data) {
              // data is a list of datetimes
             
              var html = '';
              $.each(data, function() {
                var d = this.split(' ')[0];
                var t = this.split(' ')[1];
                html +=  t ;
              });
              $('#selected-dates').val(html);
            },
           /* onClickNavigator: function(ev, instance) {
			alert(tttt);
              var arr = [
                [
                  ['4:00', '5:00', '6:00', '7:00', '8:00']
                ]
              ]
              var rn = Math.floor(Math.random() * 10) % 7;
			  console.log(rn);
			  instance.setAvailability(arr[0]);
              //instance.setAvailability(arr[rn]);
            }*/
          });
		 }
		 else{
			  $("#picker_edit").markyourcalendar({
            availability:arry_response(diagnose,clinic,doctor,booking_date),
			
			
            isMultiple: false,
            onClick: function(ev, data) {
              // data is a list of datetimes
             
              var html = '';
              $.each(data, function() {
                var d = this.split(' ')[0];
                var t = this.split(' ')[1];
                html +=  t ;
              });
              $('#booking_time_edit').val(html);
            },
           /* onClickNavigator: function(ev, instance) {
			alert(tttt);
              var arr = [
                [
                  ['4:00', '5:00', '6:00', '7:00', '8:00']
                ]
              ]
              var rn = Math.floor(Math.random() * 10) % 7;
			  console.log(rn);
			  instance.setAvailability(arr[0]);
              //instance.setAvailability(arr[rn]);
            }*/
          });
		 }
        };
 
	 
	 function arry_response(diagnose,clinic,doctor,booking_date){
		 
		 var slot=null;
		 $.ajax({
				async:false,
				type: "POST",
				url: "booking/booking_slot",
				data: { diagnosis_id:diagnose,
						clinic_id:clinic,
						doctor_id:doctor,
						booking_date:booking_date
					 },
				success: function(response){
					
					
						var json = $.parseJSON(response);
						if(json.status==1){
						
							var slot_array = [];
							
								$.each(json.slots, function(key,value){
								
									 slot_array.push(value.act_time);
								});
								
							 slot= [slot_array];
						}
						else{
							slot= [];
						}
					
				}				
				
			});
		 console.log(slot);
		 return slot;
	 }
	
	 
	 $("#booking_btn").click(function(){
			if(!$(".myc-available-time").hasClass("selected")){
				alert("Invalid slot");
			}
			else{
				
				 $.ajax({
					type: "POST",
					url: "booking/patient_booking",
					data: $("#booking_form").serialize(),
					success: function(response){
						
						var json =JSON.parse(response);
						
						if(json.status==1){
							location.reload();
						}
						
					}				
					
				});
				
			}
	});
	
	
	// ** nsk-21/01/21//
	getDoctor($("#logged_user_branch").val());
	
	$("#booking_list_date").datepicker().on('hide', function(e) {
		var date=$(this).val();
		
		var clinc_data =$("#booking_list_clinic").select2('data');
		var clinic  =clinc_data[0].id;
		var doctor=$("#booking_list_doctor").val();
		var patient=$("#booking_list_patient").val();
		getBookinList(clinic,date,doctor,patient);
        // `e` here contains the extra attributes
    });
	
	$("#booking_list_clinic").select2({
				minimumResultsForSearch: Infinity
	}).on('select2:select',function(){
		var date=$("#booking_list_date").val();
		var clinc_data =$("#booking_list_clinic").select2('data');
		var clinic  =clinc_data[0].id;
		var doctor=$("#booking_list_doctor").val();
		var patient=$("#booking_list_patient").val();
			
		getDoctor(clinic);
		
		getBookinList(clinic,date,doctor,patient);
	});
	
	function getDoctor(clinic){
	 
		$("#booking_list_doctor").select2({
			ajax:{
				url:'registration/get_doctor/'+clinic+'/',
				data:function(params){
					var query={
						search:params.term,
						
					}
					return query;
				},
				dataType:'json'
			}
		}).on('select2:select',function(){
			
			var date=$("#booking_list_date").val();
			var clinc_data =$("#booking_list_clinic").select2('data');
			var clinic  =clinc_data[0].id;
			var doctor=$("#booking_list_doctor").val();
			var patient=$("#booking_list_patient").val();
			getBookinList(clinic,date,doctor,patient);
			console.log(clinic);
		});
	}
	
	
	$("#booking_list_patient").select2({ 
				ajax:{
					url:'Patient/get_patient',
					data:function(params){
						var query={
							search:params.term,
							
						}
						return query;
					},
					dataType:'json'
				},
				minimumInputLength	: 1,
				tags:true
	}).on('select2:select',function(){
		var patient=$("#booking_list_patient").val();
		if(Math.floor(patient)==patient && $.isNumeric(patient)){
					
			var date=$("#booking_list_date").val();
			var clinc_data =$("#booking_list_clinic").select2('data');
			var clinic  =clinc_data[0].id;
			var doctor=$("#booking_list_doctor").val();
			getBookinList(clinic,date,doctor,patient);
					
		}	
				
	});
	
	
	
 
	
	
	$(document).ready(function(){
		
		var date=$("#booking_list_date").val();
		var clinc_data =$("#booking_list_clinic").select2('data');
		var clinic  =clinc_data[0].id;
		var doctor=$("#booking_list_doctor").val();
		var patient=$("#booking_list_patient").val();
		getBookinList(clinic,date,doctor,patient);
		
	});
 
	function getBookinList(clinic='0',date,doctor='0',patient='0'){
		
		$.ajax({
				
			type: "GET",
			url: "booking/bookingList/"+clinic+"/"+dateFormat(date,'Y-m-d')+"/"+doctor+"/"+patient+"/",
			success: function(response){
				
				$("#booking_list_div").empty();
					var json = $.parseJSON(response);
					
					$("#appoinment_count").html(json.data.no_appoinment);
					$("#confirm_count").html(json.data.no_confirm);
					
					var booking_list = '';
					if(json.status==1){
						
						
						$.each(json.data.bookings, function(key,value){
							
							booking_list=booking_list+'<div class="panel-body mb-xs pt-xs pb-xs pr-md pl-md" style="box-shadow: 1px 1px 3px 0px;" id="booking_list_div">'+
							
								'<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-none">'+
									'<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" style="padding: 5px 8px 5px 8px;background-color:#e3e3e4; clor:black; border-radius: 12px;">'+
										'<span>'+value.booking_time+'</span>'+
									'</div>'+
									
									'<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" style="padding: 5px 8px 5px 8px">'+
										'<span>'+value.booking_date+'</span>'+
									'</div>'+
								'</div>'+
								
								'<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" style="padding: 5px 8px 5px 8px">'+
									'<span>'+value.patient_name+'</span>'+
								'</div>'+
								
								
								'<div class="col-sm-2 col-md-2 col-lg-2 col-xl-3" style="padding: 5px 8px 5px 8px">'+
									'<span> '+value.doctor_name+'</span>'+
								'</div>'+
								
								'<div class="col-sm-3 col-md-2 col-lg-2 col-xl-2" style="padding: 5px 8px 5px 8px">'+
									'<span> '+value.diagnose_name+'</span>'+
								'</div>'+
								
								
								'<div class="col-sm-2 col-md-3 col-lg-3 col-xl-3 p-none">'+
									'<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4" style="padding: 5px 8px 5px 8px">'+
										'<span>'+value.status_template+'</span>'+
									'</div>'+
									'<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4" style="padding: 5px 8px 0px 8px;">'+
										'<button type="button" onclick="editBooking('+value.booking_id+')" class="btn btn-sm bg-hash ">'+
											'<i class="fa fa-pencil"></i>'+
										'</button>'+
									'</div>'+
									'<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4" style="padding: 5px 8px 0px 8px;">'+
										'<button type="button" onclick="deleteBooking('+value.booking_id+')" class="btn btn-sm bg-hash">'+
											'<i class="fa fa-trash-o"></i>'+
										'</button>'+
									'</div>'+
								'</div>'+
							'</div>';
						});
						
					}
					else{
						booking_list=booking_list+'<div class="panel-body mb-xs pt-xs pb-xs pr-md pl-md" style="box-shadow: 1px 1px 3px 0px;" id="booking_list_div">No Record Found!</div>';
						//slot= [];
					}
					$("#booking_list_div").append(booking_list);
						 console.log(booking_list);
			}				
				
		});
	}
	
	
	function deleteBooking(booking_id){
	
		if (confirm("Are you sure?")) {
			
			$.ajax({
				type: "POST",
				url: "booking/deleteBooking",
				data: {booking_id:booking_id},
				success: function(response){
					var json = $.parseJSON(response);
					if(json.status==1){
						var date=$("#booking_list_date").val();
						var clinc_data =$("#booking_list_clinic").select2('data');
						var clinic  =clinc_data[0].id;
						var doctor=$("#booking_list_doctor").val();
						var patient=$("#booking_list_patient").val();
						getBookinList(clinic,date,doctor,patient);
						new PNotify({
							title: 'Success',
							text: json.message,
							type: 'success'
						});
					}
					else{
						new PNotify({
							title: 'Error',
							text: json.message,
							type: 'error'
						});
					}
				}				
					
			});
		}
		return false;

	}
	
	
	function editBooking(booking_id){
		
		$("#myModal").modal(); 
		$.ajax({
			type: "POST",
			url: "booking/getBookingDetail",
			data: {booking_id:booking_id},
			success: function(response){
				var json = $.parseJSON(response);
				$("#booking_edit_id").val(json.data.booking_id);
				$("#booking_diagnose_edit").val(json.data.booking_diagnosis);
				$("#booking_clinic_edit").val(json.data.booking_clinic);
				var newOption = new Option(json.data.doctor_name, json.data.booking_doctor, false, false);
				$('#booking_doctor_edit').empty();
				$('#booking_doctor_edit').append(newOption).trigger('change').select2({
					ajax:{
						url:'registration/get_doctor/'+json.data.booking_clinic+'/',
						data:function(params){
							var query={
								search:params.term,
								
							}
							return query;
						},
						dataType:'json'
					}
				});
				
				$("#booking_date_edit").val(json.data.booking_date);
				$("#booking_time_edit").val(json.data.booking_time);
				$("#booking_status_edit").val(json.data.booking_status);
				
				$("#booking_time_edit").dblclick(function(){
					
					var booking_date	= $("#booking_date_edit").val();
					var doctor_data 	= $("#booking_doctor_edit").select2('data');
					var doctor  		= doctor_data[0].id;
					slot('picker_edit',json.data.booking_diagnosis,json.data.booking_clinic,doctor,booking_date);
					
				 });
				
			}	
		});
	}
 
	 $("#booking_update").click(function(){
				if(!$(".myc-available-time").hasClass("selected")){
					alert("Invalid slot");
				}
				else{
					var form_data=$("#booking_edit_form").serialize();
					var date=dateFormat($("#booking_date_edit").val(),'Y-m-d');
					 $.ajax({
						type: "POST",
						url: "booking/patientBookingUpdate",
						data: form_data+'&&booking_date='+date,
						success: function(response){
							
							//var json =JSON.parse(response);
							
							//if(json.status==1){
								location.reload();
							//}
							
						}				
						
					});
					
				}
		});
		
	
 // nsk01/21 **//
		
}
//End Reception//

//Start Clinic Registration//
if ($("#clinic_registration").length) {
	
	$("#submit").click(function(e){
		alert(11111);
		e.preventDefault();
		var form =$(this).closest("form");// serializes the form's elements.
		
		$.ajax({
			type: "POST",
			url: form.attr("action"),
			data: form.serialize(),
			statusCode: {

				200: function(response) {
					var json = $.parseJSON(response);
					window.location.href = json.redirect;

				},
				400: function(response) {
					

					$("#submit").attr("disabled", true);
					var json = $.parseJSON(response.responseText);

					if (json.error_type == 'badge') {

						var error_text = '';
						$.each(json.message, function(element, value) {

							$("#" + element).addClass('error_input');

							$(this).closest("[type=submit]").attr("disabled", true);
							error_text += value + '<br>';
						});
						new PNotify({
							title: 'Error',
							text: error_text,
							type: 'error'
						});

					} else {
						$.each(json.message, function(element, value) {

							if ((form).hasClass('multi-column')) {

								$("#" + element).addClass('error_input').parent().prepend("<label style='float:right;' for='" + element + "' class='error'>" + value + "</label>");

							} else {
								$("#" + element).addClass('error_input').parent().append("<label style='float:right;' for='" + element + "' class='error'>" + value + "</label>");

							}
							//$("[for="+element+"]").parent().addClass('has-error');
							//$("#"+element).closest('.form-group').addClass('has-error');

						})
					}
				},
				500: function() {

					$("#submit").attr("disabled", true);
					new PNotify({
						title: 'Error',
						text: 'Database Problem Occurred!',
						type: 'error'
					});
				}

			}

		});
	});
}
//End Clinic Registration//

//Common Functions

	
	$("form").submit(function(e) {
		e.preventDefault();
		
		var form = $(this);
		$.ajax({
			type: "POST",
			url: form.attr("action"),
			data: form.serialize(),
			statusCode: {

				200: function(response) {
					var json = $.parseJSON(response);
					window.location.href = json.redirect;

				},
				400: function(response) {

					$("#submit").attr("disabled", true);
					var json = $.parseJSON(response.responseText);

					if (json.error_type == 'badge') {

						var error_text = '';
						$.each(json.message, function(element, value) {

							$("#" + element).addClass('error_input');

							$(this).closest("[type=submit]").attr("disabled", true);
							error_text += value + '<br>';
						});
						new PNotify({
							title: 'Error',
							text: error_text,
							type: 'error'
						});

					} else {
						$.each(json.message, function(element, value) {

							if ((form).hasClass('multi-column')) {

								$("#" + element).addClass('error_input').parent().prepend("<label style='float:right;' for='" + element + "' class='error'>" + value + "</label>");

							} else {
								$("#" + element).addClass('error_input').parent().append("<label style='float:right;' for='" + element + "' class='error'>" + value + "</label>");

							}
							//$("[for="+element+"]").parent().addClass('has-error');
							//$("#"+element).closest('.form-group').addClass('has-error');

						})
					}
				},
				500: function() {

					$("#submit").attr("disabled", true);
					new PNotify({
						title: 'Error',
						text: 'Database Problem Occurred!',
						type: 'error'
					});
				}

			}

		});
	});
	//End Form Submission


	//Form Rest
	$("#reset").click(function() {
		$("#submit").attr("disabled", false);
		$(".error_input").removeClass('error_input');
		//$(this).closest("form").
		$(".error").remove();
		$(".ui-pnotify").remove();

	});
	//End Form Reset

		$('form').on('keydown', 'input[type=text],input[type=password],input[type=submit],input[type=checkbox],input[type=radio],textarea,select', function(e) {
            
			var self = $(this), form = self.parents('form:eq(0)'), focusable, next;

            if (e.keyCode == 13) {
                focusable = form.find("input[type=text],input[type=checkbox],input[type=radio],input[type=password],input[type=submit],textarea,select,.custom-button").filter(':visible');

                next 	= focusable.eq(focusable.index(this)+1);
                var type = $(this).attr('type');
				
				
				
				
					if(type == 'submit'){

						if (!$(this).attr('disabled')) {                  
							$(this).submit();
						}

					}
					else{   

						if (next.length) { 

							if(!$('.active-result').hasClass('highlighted') && !$(this).hasClass('e13')){
								
								next.focus();
								
							}
						} 
					}  
								
                
                return false;
            }

        }); 





	$("input1").keypress(function(e) {
		//alert(555);


		if (e.which === 13) {
			e.preventDefault();
			var target = $(':input').filter(':gt(' + $(':input').index(this) + ')').not('.readonly,.hide,hidden,.skip').first();
			if (target.length > 0) {

				target.focus();
			} else {
				$(this).blur();

			}



		}
	});

	function is_number(params) {
		if (isNaN(params) || params == '') {
			var ret = 0;
		} else {
			var ret = params;
		}
		return ret;
	}
	
	function dateFormat(date,format){
			
				if(date.includes('-')){
					
					date_array=date.split('-');
				}
				else if(date.search('/')){
					
					date_array=date.split('/');
				}
			
			if(format=="Y-m-d"){
				
				if(date_array[0].length==4){
					
					return_date=date_array[0]+'-'+date_array[1]+'-'+date_array[2];
				}
				else if(date_array[0].length==2){
					
					return_date=date_array[2]+'-'+date_array[1]+'-'+date_array[0];
				}
			}
			
			else if(format=="d-m-Y")
			{
				
				if(date_array[0].length==4){
					return_date=date_array[2]+'-'+date_array[1]+'-'+date_array[0];
				}
				else if(date_array[0].length==2){
					return_date=date_array[0]+'-'+date_array[1]+'-'+date_array[2];
				}
			}
			else if($format=="Y/m/d")
			{
				
				if(date_array[0].length==4){
					return_date=date_array[0]+'-'+date_array[1]+'-'+date_array[2];
				}
				else if(date_array[0].length==2){
					return_date=date_array[2]+'-'+date_array[1]+'-'+date_array[0];
				}
			}
			else if($format=="d/m/Y")
			{
				
				if(date_array[0].length==4){
					return_date=date_array[2]+'-'+date_array[1]+'-'+date_array[0];
				}
				else if(date_array[0].length==2){
					return_date=date_array[0]+'-'+date_array[1]+'-'+date_array[2];
				}
			}
			return return_date;
		}

	function validateDateFormt(date){
			
		if(date.includes('-')){
				
			string=date.replace(/[^\w\s]/gi, '');
		}
		else if(date.search('/')){
				
			string=date.replace(/[^\w\s]/gi, '');
		}
		
		if(string.length==8 && Number.isInteger(string)){
			return true;
		}
		else{
			return false;
		}
		
		
	}

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
//End Common Functions