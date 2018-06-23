<?php

session_start();

ob_start();

?>

<?php

if (isset( $_SESSION[ 'user_type' ] ) ) {

	Include_once( 'model/db.php' );

} else {

	logout();

	die();

}





if($_SESSION['user_type'] == 'student'){

	header('location: student_area.php');

}



if($_SESSION['user_type'] == 'admin'){

	header('location: admin_area.php');

}



function logout() {

	header( 'location:index.php' );

	ob_end_flush();

	die();

}

?>

<?php 

include "control/select_forquestionpage.php";

include "header.php";

include "menuforteacher.php";

?>

<fieldset>

 <div class="container1 table-responsive">

  <table class="table">

    <thead>

      <tr>

          <th>Question Number</th>

          <th>Question</th>

          <th>A</th>

          <th>B</th>

          <th>C</th>

          <th>D</th>

          <th>Answer</th>

          <th>Edit</th>        

      </tr>

    </thead>

    <tbody>

	<?php 

	foreach($staticresult as $row){

        echo "<tr id='".$row['question_ID']."'>

        <th><h5>" . $row['question_number'] . "</h5> </th>

        <th><h5>" . $row['question'] . "</h5> </th>

        <th><h5>" . $row['A'] . "</h5> </th>

        <th><h5>" . $row['B'] . "</h5></th>

        <th><h5>" . $row['C'] . "</h5></th>

        <th><h5>" . $row['D'] . "</h5></th>

        <th><h5>" . $row['answer'] . "</h5></th>

		<th>  

		<a href='update_question.php?question_ID=" . $row['question_ID']."'>Edit</a> | <a href='#' style='color: red;' onclick='deleteQuestion(".$row['question_ID'].")'>Delete</a>

		</th>

        

      </tr>";

}

	  ?>

      </tbody>

  </table>

</div>



</fieldset>

<?php

	include "footer.php";

?>