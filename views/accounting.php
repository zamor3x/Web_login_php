<?php
//This code starts by calling the session_start() function to start the session, and then sets the error_reporting() option to turn off error reporting on the page.
session_start();
error_reporting(0);

// Then, a validation is performed on the session variable name to check whether or not a value exists. If the variable does not have a value, the page is redirected to the login page.
$validar = $_SESSION['name'];

if ($validar == null || $validar = '') {

    header("Location: ../views/login.php");
    die();
}


?>
<!-- After that, the HTML code is created and the PHP function curl_init() is used to make an HTTP request to the "reqres.in" API which returns a list of users. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/es.css">
    <title>Accounting</title>
</head>

<div class="container is-fluid">




    <div class="col-xs-12">
        <h1>Welcome Accounting <?php echo $_SESSION['name']; ?></h1>
        <br>
        <h1>API users list</h1>
        <br>
        <div>

            <a class="btn btn-warning" href="../controllers/logout.php">Log Out
            </a>

        </div>
        <br>

        <br>

        </form>

        <?php

        //The HTTP request response is decoded using the json_decode() function and displayed in a table with the help of a foreach loop.
        $url = "https://reqres.in/api/users";
        $ch = curl_init();
        $array_options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt_array($ch, $array_options);
        $resp = curl_exec($ch);
        $final_decoded_data = json_decode($resp, true);
        foreach ($final_decoded_data["data"] as $key => $val) {
            echo "<tr>";
            echo "<td>" . $val["id"] . "</td>";
            echo " ";
            echo "<td>" . $val["first_name"] . " " . $val["last_name"] . "</td>";
            echo "  ";
            echo "<td><img src=\"" . $val["avatar"] . "\"></td>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "</tr>";
        }
        curl_close($ch);
        ?>

        <!-- Finally, some JavaScript files are included to add additional functionality to the page, such as searching and sorting data in the table, among others. -->
        </body>
        </table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script src="../js/user.js"></script>


</html>