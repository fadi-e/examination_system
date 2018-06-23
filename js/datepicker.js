$( function() {
  $( "#examdate" ).datepicker({
  dateFormat: "yy-mm-dd"
}); 

  $( ".examdate" ).datepicker({
  dateFormat: "yy-mm-dd"
}); 


var dateFormat = $( "#examdate" ).datepicker( "option", "dateFormat" ); 
$( "#examdate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
 });