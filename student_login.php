<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #ecc1ff;
            display: flex;
            
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: none;
            padding: 20px;
            border-radius: 10px;
            /* box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); */
            width: 300px;
            text-align: center;
            margin-right: 10px;
            margin-left: -10px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .main {
            background-color: white;
            padding: 20px;
            padding-left: 0px;
            border-radius: 30px;
            box-shadow: 6px 6px 10px -1px rgba(65, 10, 101, 0.58),
                -6px -6px 10px -1px rgba(255, 100, 255, 0.635);
            width: 880px;
            height: 440px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input {
            width: 100%;
            height: 45px;
            border: none;
            border-radius: 10px;
            border: 1px solid #c05cd4;
            padding: 10px 15px;
            font-size: 16px;
            outline: none;
            box-sizing: border-box;
        }

        .placeholder {
            position: absolute;
            z-index: 111;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 14px;
            color: #666;
            transition: 0.3s;
            pointer-events: none;
        }

        .input:focus + .placeholder,
        .input:not(:placeholder-shown) + .placeholder {
            top: -1px;
            left: 15px;
            background-color: white;
            padding: 0 5px;
            color:  #b700ff;
            font-size: 12px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #c05cd4;
            background-color: transparent;
            color: white;
            color:  #b700ff;

            background-color: #c05cd4;
            color : white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            border: 2px solid #c05cd4;
            font-weight: bold;
        }



        input[type="submit"]:hover {
            background-color:  #b700ff;
            color : white;
        }

        .input:hover{
            border: 2px solid #b700ff;
            border-color: #b700ff;
        }
       


        img.icons {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            height: 15px;
            
        }

        h2{
            margin-top: ;
        }
    </style>
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
    
                $sql = "SELECT * FROM students WHERE id='$id' AND password='$password'";
                $record_obj = mysqli_query($mysql, $sql);
    
                $n = mysqli_num_rows($record_obj);
    
                if ($n > 0) {
    
                    session_start();
                    $_SESSION["id"] = $id;
                    $_SESSION["password"] = $password;
                    $_SESSION["role"] = "student";
    
                    header("Location: student.php");
                } else {
    
                    echo '<script>alert("Invalid login. Please try again.")</script>';
                }
    
                mysqli_close($mysql);
            }
            ?>
        </center>

        
        <img src="img/login.svg" alt="Login Icon" style="height: 100%;">
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
