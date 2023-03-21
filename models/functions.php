<?php
//The file called "database.php" which is located in the "controllers" folder at the top level of the current file.
require_once("../controllers/database.php");

/*If the "action" field is present in the $_POST array, indicating that the form has been submitted. 
If the form was submitted, a switch is used to determine which function should be called. In this case, the only option is "access_user"*/

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'access_user';
            access_user();
            break;
    }
}

function access_user()
{
    //The "access_user()" function starts. This function retrieves the username and password submitted from the form and stores them in variables.
    $name = $_POST['name'];
    $password = $_POST['password'];
    //The "session_start()" function is started. The username is then stored in the $_SESSION['name'] variable.
    session_start();
    $_SESSION['name'] = $name;

    /*Connection to a MySQL database is established using the "mysqli_connect()" function. 
    The server "localhost", the username "root", the password empty, and the database "r_user" are used. These values may need to be adjusted to match the local database settings.*/
    $connect = mysqli_connect("localhost", "root", "", "r_user");

    /*SQL query that looks for a record in the "user" table that matches the supplied username and password.
    The "mysqli_query()" function is used to execute the query and store the result in the $result variable.
    The "mysqli_fetch_array()" function to get the first record of the result and store it in the $rows variable.
    This allows us to check the value of the "role" field to determine which page should be loaded after login.*/
    $search = "SELECT * FROM user WHERE name='$name' AND password='$password'";
    $result = mysqli_query($connect, $search);
    $rows = mysqli_fetch_array($result);

    /*series of "if" statements to determine which page should be loaded after login, based on the value of the "role" field. 
    If the value is 1, the "admin.php" page is loaded; if it is 2, the "accounting.php" page is loaded; if it is 3, the "marketing.php" page is loaded.*/
    if ($rows['rol'] == 1) {

        header('Location: ../views/admin.php');
    } else if ($rows['rol'] == 2) {
        header('Location: ../views/accounting.php');
    } else if($rows['rol'] == 3){
        header('Location: ../views/marketing.php');
    } else {
        /*If the value of the "role" field does not match any of the expected values, an alert message. 
        The message indicates that the username or password is invalid and redirects the user to the login page. 
        The "session_destroy()" function is also used to destroy the session and prevent the user from accessing subsequent pages through the browser history.*/
        echo "<script>
                            alert('Unidentified username or password');
                            location.href = '../views/login.php'
                            session_destroy();
                        </script>";
        
    }
}
