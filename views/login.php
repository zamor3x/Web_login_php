<!-- The basic HTML structure is defined, including the headers, page title, and links to the Bootstrap and jQuery libraries. -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
<!-- The login form starts. The "action" attribute is used to indicate the location of the PHP file that will process the form data. -->
<form  action="../models/functions.php" method="POST">
<div id="login" >
    <!-- Within the form, HTML tags are used to create a layout with columns and rows containing text input fields for username and password. -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <br>
           
                   <br>
                                    <h3 class="text-center">Log in</h3>
                       <br>
                       <!-- The text input field for the username is defined, using the "input" tag with the "type" attribute set to "text"-->
                            <div class="form-group">
                                <label for="correo">Users:</label><br>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <!-- The text input field for the password is defined, using the "input" tag with the "type" attribute set to "password".
                            There is also a hidden field defined, that is used to indicate the action to be taken in the PHP file that renders the form.-->
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required autocomplete="OFF">
                                <input type="hidden" name="action" value="access_user">
                            </div>
                            <div class="form-group">
                             <br>
                    <center>
                                <!-- The "Sign In" button is defined, using the "input" tag with the "type" attribute set to "submit".-->
                                <input type="submit"class="btn btn-success" value="Sign In">   
                                </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>