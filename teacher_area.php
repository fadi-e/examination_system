<?php
session_start();
ob_start();
?>
<?php
if (isset($_SESSION['user_type'])) {
    Include_once('model/db.php');
} else {
    logout();
    die();
}

if(!($_SESSION['user_type'] == 'teacher')){
	header('location: ' . $_SESSION['user_type'] . '_area.php');
}


function logout() {
    header('location:index.php');
    ob_end_flush();
    die();
}
?>
<?php
include "header.php";
?>
<nav class="navbar-inverse navbar-light" style="background-color: #00022A; margin-bottom: 30px;  position: relative; z-index: 10000; ">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
            </div>

            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav" style="background-color: #00022A;">
                    <li><a href="#section_one" onClick="dosection_one()">New Student</a> </li>
                    <li><a id="StudentsInfo" href="#section_two" onClick="dosection_two()">Students Info</a> </li>
                    <li><a href="#section_three" onClick="dosection_three()">Tests</a> </li>
                    <li><a href="#section_four" onClick="dosection_four()">New Test</a> </li>
                    <li><a href="#section_five" onClick="dosection_five()">Add Question</a> </li>
                    <li><a href="#section_six" onClick="dosection_six()">Results</a> </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </nav>

<div id="loaderbg" style="position: fixed; top: 0px; left: 0px; background: rgba(0, 0, 0, 0.6) none repeat scroll 0% 0%;
	 z-index: 5; width: 100%; height: 100%; display: none;">
    <img id="loader" src="pics/ajax-loader.gif">
</div>


<fieldset id="section_one">
    <div class="sides">
        <div class="leftside">
            <div class="container">
                <div class="col-lg-8">
                    <div class="jumbotron">
                        <div class="bd-example">
                             <form method="POST" id="registerstudent" action="control/registration_process_teacherstostudent.php">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label >First Name</label>
                                         <input type="text" class="form-control clartestvaluestudent" name="fname" id="fname" placeholder="First Name"  required>
                                            
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Last Name</label>
                                          <input type="text" class="form-control clartestvaluestudent" name="lname" id="lname" placeholder="Last Name"  required>
                                           
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label >Email Address</label>
                                        <input type="email" class="form-control clartestvaluestudent" name="email" id="email" placeholder="Email Address" required>
                                            <?php
                                            if (isset($_SESSION["email"])) {
                                                echo 'value="' . $_SESSION["email"] . '"';
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" class="form-control clartestvaluestudent" name="password" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label >Class</label>
                                            <select name="className" class="form-control clartestvaluestudent" style="height: 35px;">
                                                <option value="" name="classA">Please select class</option>
                                                <option value="A" name="className">A</option>	
                                                <option value="B" name="className">B</option>	
                                                <option value="C" name="className">C</option>	
                                                <option value="D" name="className">D</option>		
                                            </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       
                                    </div>
                                </div>
                                 <div class="form-group col-md-12">
                                        <div style="clear: both"></div>
                                        <input type="hidden" name="student" value="student">
                                        <input type="submit" style="width: auto;" class="btn btn-primary form-control Studentbuttondisbled" value="Register" name="register" id="register">
                                        <div class="ui info message"></div>
                                        <div class="ui error message"></div>
                                 </div>
                                 <div style="clear: both"></div>
                            </form>
                        </div>




                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="rightside">
            <div class="hhhh" style="padding-top: 3em; color: darkred;text-align: center;" onload="startTime()">
                <p style="font-size: 26px; text-transform: capitalize;"><strong>Welcome <?php echo $_SESSION['fname']; ?>!</strong></p>
                <p  style="font-size: 13px;" id="demo"></p>
                <div id="txt"></div>
            </div>
        </div>
    </div>
</fieldset>







<fieldset id="section_two">
<?php 
//include "control/select_modifyformteachertostudent.php"; 
?>
    <form action="#" method="get">
        <div class="container1 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="getStudentInfo">
                    <tr>
                        <td colspan="100%">Loading....</td>
                    </tr>
                    <?php
//                    foreach ($staticresult as $row) {
//                        echo "<tr id='hide_delete_row_" . $row['student_ID'] . "'>
//                                <th><h5>" . $row['student_ID'] . "</h5> </th>
//                                <th><h5>" . $row['fname'] . "</h5></th>
//                                <th><h5>" . $row['lname'] . "</h5></th>
//                                <th><h5>" . $row['email'] . "</h5></th>
//                                <th><h5>" . $row['className'] . "</h5></th>
//                                <th><a href='update_form_teacherstostudent.php?studentID=" . $row['student_ID'] . "'>Edit</a> |
//                                <a href='#' style='color: red;' onclick='delete_data(" . $row['student_ID'] . ");'>Delete</a></th>
//                            </tr>";
//                    }
                    ?>
               <div  id="loading-image" style="display: none;">
                    <img  src="pics/ajax-loader.gif">
               </div>
            </tbody>
            </table>
        </div>
    </form>
</fieldset>
<fieldset id="section_three">
    <?php include "control/select_test.php"; ?>
    <form action="#" method="get">
        <div class="container1 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Test ID</th>
                        <th>Test Name</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($staticresult as $row) {
                        echo "<tr id='" . $row['test_ID'] . "'>
                            <th><h5>" . $row['test_ID'] . "</h5> </th>
                            <th><h5><a href='question.php?test_ID=" . $row['test_ID'] . "'>" . $row['testName'] . "</a></h5> </th>
                            <th><h5>" . $row['subject'] . "</h5></th>
                            <th><h5>" . $row['className'] . "</h5></th>
                            <th><a href='update_test.php?test_ID=" . $row['test_ID'] . "'>Edit</a> | <a href='#' style='color: red;' onclick='deleteTest(" . $row['test_ID'] . ")'>Delete</a></th>       
                          </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</fieldset>
<fieldset id="section_four">
    <div class="container">
        <div class="col-lg-8" style="padding: 0px;">
            <div class="jumbotron">
                <?php include "control/select_tests.php"; ?>
                <legend>Create Test</legend>

                <form method="POST" id="NewtestRegister" action="Control/create_test.php">
                
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label >Test Name</label>
                        <input type="text" class="form-control clartestvalue" name="testName" id="testName" required>
                    </div>
                    <div class="form-group col-md-6" >
                        <label >Subject</label>
                        <input type="text" class="form-control clartestvalue" name="subject" id="subject" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label >Class</label>
                           <select name="class_ID" class="form-control clartestvalue" required>
                            <option value="">Please select class</option>
                            <?php foreach ($results as $row) { ?>
                                <option value="<?php echo $row['class_ID']; ?>" name="class_ID" ><?php echo $row['className']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6" >
                        <label >Exam Date</label>
                        <input type="text" id="examdate" class="form-control clartestvalue" name="examdate" value="" required>
                    </div>
                </div>
                    
                <div class="form-group col-md-12">
                    <input type="submit" style="width: auto;" class="btn btn-primary form-control" value="Create" >
                </div>
                </form>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
</fieldset>
<fieldset id="section_five">
    <div class="container">
        <div class="col-lg-4">
            <div class="jumbotron">
                <?php include "control/select_question.php"; ?>
                <legend>Add Question</legend>

                <form method="POST" action="control/create_question.php">

                    <div class="form-group">
                        <label>Test</label>
                        <select name="test_ID" class="form-control" required>
                            <option value="">Please select test</option>
                            <?php foreach ($results as $row) { ?>
                                <option value="<?php echo $row['test_ID']; ?>" name="test_ID" ><?php echo $row['testName']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" class="form-control" name="question" required>
                    </div>

                    <div class="form-group">
                        <label>Question Number</label>
                        <input type="number" class="form-control" name="question_number" required>
                    </div>

                    <div class="form-group">
                        <label>Option A</label>
                        <input type="text" class="form-control" name="optionA" required>
                    </div>

                    <div class="form-group">
                        <label>Option B</label>
                        <input type="text" class="form-control" name="optionB" required>
                    </div>

                    <div class="form-group">
                        <label>Option C</label>
                        <input type="text" class="form-control" name="optionC" required>
                    </div>

                    <div class="form-group">
                        <label>Option D</label>
                        <input type="text" class="form-control" name="optionD" required>
                    </div>

                    <div class="form-group">
                        <label>Answers</label>
                        <input type="text" class="form-control" name="answer" placeholder="A,B,C,D" maxlength="1" pattern="[A-aD-d]" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
</fieldset>
<fieldset id="section_six">
<?php include "control/select_results.php"; ?>
    <form action="control/deleteUser.php" method="get">
        <div class="container1 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th>Result</th>
                        <th>Date of submission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($staticresult as $row) {
    echo "<tr>
        <th><h5>" . $row['student_ID'] . "</h5> </th>
        <th><h5>" . $row['fname'] . "</h5></th>
        <th><h5>" . $row['lname'] . "</h5></th>
        <th><h5>" . $row['email'] . "</h5></th>
        <th><h5>" . $row['className'] . "</h5></th>
        <th><h5>" . $row['result_status'] . "</h5></th>
        <th><h5>" . $row['submissiondate'] . "</h5></th>

		<th><a href='control/reset_result.php?pageid=deletestudent&r_id=" . $row['result_ID'] . "'>Reset</a>
      </tr>";
}
?>
                </tbody>
            </table>
        </div>
    </form>
</fieldset>
<?php
include "footer.php";
?>
	</div>
        

        
        
