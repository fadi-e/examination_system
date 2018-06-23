// JavaScript Document
    $('#registerstudent').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                fname: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your First name.'
                        },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'First name must be 2 to 20 characters.'
                        },
                        regexp: {
                             regexp: /^[a-z\s]+$/i,
                             message: 'The First name can consist of alphabetical characters and spaces only'
                         }
                    }
                },
              
                lname: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your Last name.'
                        },
                        stringLength: {
                            min: 2,
                            max: 20,
                            message: 'Last name must be 2 to 20 characters.'
                        },
                        regexp: {
                             regexp: /^[a-z\s]+$/i,
                             message: 'The Last name can consist of alphabetical characters and spaces only'
                         }
                    }
                },
              
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your Email.'
                        },
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter your Password.'
                        },
                        stringLength: {
                            min: 4,
                            message: 'Password has to be at least 4 char.'
                        },
                    }
                },
         }
    }).on('success.form.bv', function(e) {
            e.preventDefault();
            var $form = $(e.target);
            var bv = $form.data('bootstrapValidator');
             $('#loaderbg').show();
            setTimeout(function() { 
                $.post($form.attr('action'), $form.serialize(), function(result) {
                    $('#loaderbg').hide();
                     $('.clartestvaluestudent').val('');
                     $(".Studentbuttondisbled").prop('disabled', false);
                    if(result.message)
                    {
                       alert(result.message);
                       location.reload();
                    }
                    else if(result.error)
                    {
                       alert(result.message);
                       location.reload();
                    }
                }, 'json');
            }, 1000);  
            
        });
    
    
    $('body').delegate('#StudentsInfo','click',function(){
        getStudentInfo();
    });
    
    
    setInterval(function(){getStudentInfo()}, 10000);
    
    function getStudentInfo()
    {
        $.ajax({
            type:'GET',
            url:"control/select_modifyformteachertostudent.php",
            dataType: 'JSON',
            success:function(data){
                var outHTML = '';
                for(var loop=0;loop<data.length;loop++) {
                    outHTML += '<tr id="hide_delete_row_'+data[loop].student_ID+'">';
                    outHTML += '<th><h5>' + data[loop].student_ID + '</h5> </th>';
                    outHTML += '<th><h5>' + data[loop].fname + '</h5> </th>';
                    outHTML += '<th><h5>' + data[loop].lname + '</h5> </th>';
                    outHTML += '<th><h5>' + data[loop].email + '</h5> </th>';
                    outHTML += '<th><h5>' + data[loop].className + '</h5> </th>';
                    outHTML += '<th><h5><a href="update_form_teacherstostudent.php?studentID='+data[loop].student_ID+'">Edit</a> | <a href="#" style="color: red;" onclick="delete_data('+data[loop].student_ID+');">Delete</a>';
                    outHTML += '</tr>';
                }


                 $('#loaderbg').hide();
                $('#getStudentInfo').html(outHTML);
            }
        });
    }
    
     $('#NewtestRegister').submit(function(e){
			e.preventDefault();
			var formData = new FormData();
			var contact = $(this).serializeArray();
			$.each(contact, function (key, input) {
				formData.append(input.name, input.value);
			});
		    $('#loaderbg').show();
                    setTimeout(function() { 
                                $.ajax({
                                    type:'POST',
                                    url:"control/create_test.php",
                                    data: formData,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    dataType: 'JSON',
                                    success:function(data){
                                         $('#loaderbg').hide();
                                         $('.clartestvalue').val('');
                                         if(data.message)
                                         {
                                            alert(data.message);
                                         }
                                         else if(data.error)
                                         {
                                            alert(data.message);
                                         }
                                    }
                            });
                    }, 1000);  
	  });