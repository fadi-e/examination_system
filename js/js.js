// JavaScript Document

// Check to see if mobile or desktop browser //



// show and hide the forms in teacher area //
function dosection_one(){
	section_one.style.display = 'block';
	section_two.style.display = 'none';
	section_three.style.display = 'none';
	section_four.style.display = 'none';
	section_five.style.display = 'none';
	section_six.style.display = 'none';
}
function dosection_two(){
	section_one.style.display = 'none';
	section_two.style.display = 'block';
	section_three.style.display = 'none';
	section_four.style.display = 'none';
	section_five.style.display = 'none';
	section_six.style.display = 'none';
}
function dosection_three(){
	section_one.style.display = 'none';
	section_two.style.display = 'none';
	section_three.style.display = 'block';
	section_four.style.display = 'none';
	section_five.style.display = 'none';
	section_six.style.display = 'none';
}
function dosection_four(){
	section_one.style.display = 'none';
	section_two.style.display = 'none';
	section_three.style.display = 'none';
	section_four.style.display = 'block';
	section_five.style.display = 'none';
	section_six.style.display = 'none';	
}
function dosection_five(){
	section_one.style.display = 'none';
	section_two.style.display = 'none';
	section_three.style.display = 'none';
	section_four.style.display = 'none';
	section_five.style.display = 'block';
	section_six.style.display = 'none';
}
function dosection_six(){
	section_one.style.display = 'none';
	section_two.style.display = 'none';
	section_three.style.display = 'none';
	section_four.style.display = 'none';
	section_five.style.display = 'none';
	section_six.style.display = 'block';
}

// Ajax type GET when teacher delete student //
function deleteUser(student_ID) {

        $.ajax({
            type: "GET",
			 datatype: 'json',
            url: "control/deleteUser.php?student_ID="+student_ID,
            data: '',
            success: function(response) {
                //alert(response);
                document.getElementById(student_ID).innerHTML = '';
            }
     });
}


// Ajax type GET when teacher delete question //
function deleteQuestion(question_ID) {
    $.ajax({
        type: "GET",
		 datatype: 'json',
        url: "control/delete_question.php?question_ID="+question_ID,
        data: '',
        success: function(response) {
            //alert(response);
            document.getElementById(question_ID).innerHTML = '';
        }
    });
}

// Ajax type GET when teacher delete test //
function deleteTest(test_ID) {
        $.ajax({
            type: "GET",
			 datatype: 'json',
            url: "control/delete_test.php?test_ID="+test_ID,
            data: '',
            success: function(response) {
                //alert(response);
                document.getElementById(test_ID).innerHTML = '';
            }
        });
}

// ajax when teacher delete student //

function delete_data(elem){
    alert(elem);
    $('#loaderbg').show();
    setTimeout(function() { 
    $.ajax({
            url: "control/delete_users.php?userid="+elem,
            method : 'GET',
            success: function(result){
                $('#loaderbg').hide();
                $('#hide_delete_row_'+elem).hide();
         }
    });
    }, 1000);   
}



    // entered data from the login-form
    var emailput = document.getElementById('emailput');
    


    // check if stored data from register-form is equal to data from login form
	if(emailput.value == storedName) {
        alert('You are loged in.');
    }else {
        alert('ERROR.');
    }


	// function to store email and password in localstorage
    function saveLoginDetails() {
		console.log("Setting login details");
    	localStorage.setItem("email", document.getElementById("emailput").value);
    	localStorage.setItem("password", document.getElementById("password").value);    
   }

	function loadLoginDetails() {
		console.log("Loading login details")
		document.getElementById("emailput").value = localStorage.getItem("email");
		document.getElementById("password").value = localStorage.getItem("password");
	}

	function startTimeAndSaveLogin() {
		console.log("Starting time and saving details")
		saveLoginDetails();
		startTime();
	}