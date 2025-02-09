<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="main">

        <center>
            <?php
            if (isset($_POST["submit"])) {
                $id = $_POST['id'];
                $password = $_POST['password'];
    
                $mysql = mysqli_connect("localhost", "root", "", "minor_project");
    
                if ($mysql === false) {
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
    
                $sql = "SELECT * FROM admin WHERE id='$id' AND password='$password'";
                $record_obj = mysqli_query($mysql, $sql);
    
                $n = mysqli_num_rows($record_obj);
    
                if ($n > 0) {
    
                    session_start();
                    $_SESSION["id"] = $id;
                    $_SESSION["password"] = $password;
                    $_SESSION["role"] = "admin";
    
                    header("Location: admin.php");
                } else {
    
                    echo '<script>alert("Invalid login. Please try again.")</script>';
                }
    
                mysqli_close($mysql);
            }
            ?>
        </center>

        
        <img src="img/login.svg" alt="Login Icon" style="height:100%;">
        <div class="container">
            <h2>Log In</h2> <br>

            <!-- Login Form -->
            <form id="loginForm" method="post" action="">
                <div class="input-group">
                    <input type="text" id="id" name="id" class="input" placeholder=" " required>
                    <label for="id" class="placeholder">Username</label>
                    <img class="icons" src="img/user.svg" alt="User Icon">
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" class="input" placeholder=" " required>
                    <label for="password" class="placeholder">Password</label>
                    <img class="icons" src="img/password.svg" alt="Password Icon">
                </div>

                <input type="submit" name="submit" value="Log In">
            </form>
        </div>
    </div>
</body>

</html>
