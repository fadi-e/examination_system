<?php
if (!isset($_SESSION)) {
	session_start();
	header('location: index.php');
}
?>
	</section>
	<footer>
<div class="ui info message">
<div class="ui error message">
	<p id="browserCheck">Browser Check</p>
<?php
        print_r($_SESSION);
?>
            </div>
		</div>
<?php
    if(isset($_SESSION['error'])) {
        echo '<div class="ui error message">';
        echo $_SESSION['error'];
        echo '</div>';
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['message'])) {
        echo '<div class="ui info message">';
        echo $_SESSION['message'];
        echo '</div>';
        unset($_SESSION['message']);
    }

?>
		
	<script>
		document.getElementById("browserCheck").innerHTML = "Mobile Browser: " + isMobile() + "\nIt is: " + BrowserCheck() + " Browser";
	</script>
</div>
	</footer>
       <script src="js/form_stuff.js"></script>
       <script src="js/time.js"></script>
       <script src="js/datepicker.js"></script>
    

</div>
</body>
</html>
