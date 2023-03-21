<?php
// Four variables are defined: $host, $user, $password, and $database, which contain the information needed to connect to the database.
$host = "localhost";
$user = "root";
$password = "";
$database = "r_user";

/*The mysqli_connect() function is used to establish the connection to the database. 
The variables defined above are passed to it as arguments. The result of this function is stored in the $connect variable.*/

$connect = mysqli_connect($host, $user, $password, $database);

//It checks if the connection was successful using an if conditional. If the connection was not made, an error message is printed using the mysqli_connect_error() function.
if(!$connect){
echo "The connection to the database was not made, the error was:".
mysqli_connect_error() ;

}

?>