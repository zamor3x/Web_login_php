<?php
//The code starts with the session_start() function to start the session.
session_start();
error_reporting(0);

/*Then, the $_SESSION['name'] variable is used to check if the user is logged in or not. 
If there is no active session or the $_SESSION['name'] variable is null or empty, the code redirects the user to the login.php login page using the header() function.*/
$validate = $_SESSION['name'];

if( $validate == null || $validate = ''){

  header("Location: ../views/login.php");
  die();
  
}

// If an active session is found, the web page with the title "Marketing" is displayed and a custom greeting is displayed that includes the user's name retrieved from the $_SESSION['name'] variable.
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">

<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/es.css">
    <title>Marketing</title>
</head>

<div class="container is-fluid">


<!-- A message is also displayed stating that the user has no action assigned and a suggestion is made to contact the administrator to resolve the issue. -->

<div class="col-xs-12">
  		<h1>Welcome Marketing <?php echo $_SESSION['name']; ?></h1>
      <br>
		<h1>This user has no action assigned, contact the administrator to solve the problem.</h1>
    <br>
		<div>
      <a class="btn btn-warning" href="../controllers/logout.php">Log Out

       </a>

		</div>
		<br>




           <br>


			</form>
        
        
  <!-- In addition, some CSS and JavaScript files are included to style the page and provide additional functionality. -->
	</body>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>


</html>