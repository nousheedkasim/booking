 var decimal_digits = $("#decimal_digits").val();
 var base_url = $("#base_url").val();
//Form submission
//$("#submit,.submit,[type=submit]").click(function(e){
$("form").submit(function(e) {

    e.preventDefault();
    //var form =$(this).closest("form");// serializes the form's elements.
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
	
	
     $('.datepicker').datepicker({
		 autoclose: true,
		container: '#modalForm',
		
		 }).css("z-index", 9999);
		 
		 
		 $('#datepicker2').datepicker({
    autoclose: true,
    container: '#myModalWithDatePicker',
    format: 'yyyy-mm-dd'
});


    //Toggle Full screen
    $('html').addClass('sidebar-left-collapsed');
    $(".sidebar-toggle").addClass("no-click");
	
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
				slot(diagnose,clinic,doctor,booking_date);
				$("#booking_btn").removeAttr("disabled");
				$("#booking_btn").focus();
			}
			
			
		});
		
		
	
 
 
 
		function  slot(diagnose,clinic,doctor,booking_date){
	 
		
		 
          $('#picker').markyourcalendar({
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
   
   
   
   $('#booking_table td').hover(function() {
	   var class_name=$(this).attr('class');
	   var booking_id=$(this).attr('booking-id');
	   var actions='';
	   if(class_name!='solot' && booking_id!=null && booking_id!='' ){
			actions='<button type="button" class="mr-xs btn btn-xs btn-info pull-left" onclick="slot_action()"><i class="fa fa-pencil"></i></button>'+
					'<button type="button" class="btn btn-xs btn-danger pull-left"><i class="fa fa-trash-o"></i></button>';
	   }										
		$(this).append(actions); 
		//$(this).addClass('hover').append(actions); 
	}, function() {
		$(this).removeClass('hover').find("button").remove();
	});
 
	 function slot_action(){
		 console.log(1111);
	 };
 
 
 
		
}

//Common Functions

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