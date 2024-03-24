<?php 

include('../dbconnect.php');

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 
 	<h1>Still Count Down Ten Minutes</h1>
 	<p>
 		You Will be redirected back to the Login Page after ten minutes
 		<span id="countdown">600</span> seconds
 	</p>

 	<script type="text/javascript">
 		
 		var seconds=600;

 		function updateCountdown(){
 			document.getElementById('countdown').textContent=seconds;

 			seconds--; 

 			if (seconds<0) {
 				window.location.href='customerlogin.php';
 			}
 		}
 		setInterval(updateCountdown,1000); 

 	</script>

 </body>
 </html>