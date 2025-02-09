<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F3F3FE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px;
            padding-right: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: left;
        }

        h1 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"] :hover {
            background-color: #0056b3;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Admin</h1>

        
        <?php
        
        if (isset($_POST["submit"]))  {
            // Capture form data
           
            $id = $_POST['id'];
            $password = $_POST['password'];
         

            // Simple validation check
            if (empty($id) || empty($password)) {
                echo "<center class=error> All fields are required!</center>";
            } else {
                 $mysql=mysqli_connect("localhost","root","","minor_project");
                 $sql="insert into admin values('$id','$password')";

                 if (mysqli_query($mysql, $sql)) {
                    echo "<script>alert('Admin added successfully');</script>";
            
                } else {
                    echo "ERROR: Could not execute $sql. " . mysqli_error($mysql);
                }

            }
        }
        ?>

        <form method="POST" action="">

            <label for="id">Admin ID:</label>
            <input type="text" id="id" name="id" placeholder="Enter your ID" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>


            <input type="submit" name="submit" >
        </form>
    </div>

</body>
</html>
