<?php
//Start a session using session_start() and disable error messages using error_reporting(0).
session_start();
error_reporting(0);

/*Check if there is a username stored in the session. If the stored value is null or empty, it is redirected to the login page using header("Location: ../views/login.php") 
and the process is stopped using die().
If there is a username stored in the session, the admin page is displayed. This page displays the list of users stored in a database.*/
$validate = $_SESSION['name'];

if( $validate == null || $validate = ''){

  header("Location: ../views/login.php");
  die();
  
}


?>
<!-- The page takes care of loading the necessary styles and scripts, using various link and script tags. -->
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">

<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/es.css">
    <title>Admin</title>
</head>

<div class="container is-fluid">




<div class="col-xs-12">
    <!-- The page displays a welcome header that includes the username stored in the session, and a logoff button. -->
  		<h1>Welcome Admin <?php echo $_SESSION['name']; ?></h1>
      <br>
		<h1>Database usres list</h1>
    <br>
		<div>
      <a class="btn btn-warning" href="../controllers/logout.php">Log Out

       </a>

		</div>
		<br>




           <br>


			</form>
        
        
 
      <table class="table table-striped table-dark " id= "table_id">

                   
                         <thead>    
                         <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Password</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Rol</th>

         
                        </tr>
                        </thead>
                        <tbody>

				<?php


/*
The page also displays a table containing the data of all the users stored in the database.
To display the user data, the code queries the database using the SELECT command and the LEFT JOIN clause. 
The data is retrieved from the user table and joined with the permissions table to retrieve the user's role. 
The results are stored in the $fact variable.
If the query returns one or more results, the data is displayed in a table using a while loop. If there are no results, a message is displayed indicating that there are no users in the table.*/
$connect=mysqli_connect("localhost","root","","r_user");               
$SQL="SELECT user.id, user.name, user.email, user.password, user.phone,
user.date, permissions.rol FROM user
LEFT JOIN permissions ON user.rol = permissions.id";
$fact = mysqli_query($connect, $SQL);

if($fact -> num_rows >0){
    while($row=mysqli_fetch_array($fact)){
    
?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['password']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['rol']; ?></td>


</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No users</td>
    </tr>

    
    <?php
    
}

?>

<!--The page also includes some scripts at the bottom to enable pagination and lookup functionality on the table using the DataTables library and a JavaScript file called user.js. -->
	</body>
  </table>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>


</html>