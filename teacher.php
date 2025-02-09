<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teachers</title>
    <link rel="stylesheet" href="teacher.css">
    <style>
        body {
            padding: 0px;
            margin: 0px;
            font-size: 20px;
            /* font-family: Georgia, 'Times New Roman', Times, serif; */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* font-family: "hello" , sans-serif; */
            background-color: #ecc1ff;

        }

        .hi {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .details {
            display: block;
            margin-top: 50px;
            background: linear-gradient(60deg, #ebdaffd4, #ffff, #ffff, #ffffff, #faf7ff, #ffffff, #d7ceffe1);
            height: 600px;
            width: 1230px;
            box-shadow: 6px 6px 10px -1px rgba(65, 10, 101, 0.58),
                -6px -6px 10px -1px rgba(255, 100, 255, 0.635);
            border-radius: 20px;
        }

        .bio img {
            margin-top: 30px;
            margin-left: 20px;
            height: 90px;
        }

        .bio {
            display: flex;
            align-items: center;
            justify-content: space-around;
            height: 100px;
            font-size: 30px;
            font-weight: 500;
            color: #2b063f;
        }

        .teachernameid {
            margin-top: 20px;
            margin-left: px;
            padding-left: px;
        }

        .teacherworks {
            height: 100px;
            margin-top: 80px;
            margin-left: 120px;
            margin-right: 120px;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .teacherworks1 {
            margin-top: 60px;
            margin-left: 120px;
            margin-right: 120px;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .part {
            background-color: #f9e2ff;
            height: 80px;
            width: 120px;
            text-align: center;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            transition: box-shadow 0.2s ease, background-color 0.2s ease-in;
        }

        .part:hover {
            background-color: #eec6ff;
            color: #491263;
            box-shadow: 6px 6px 10px -1px rgba(194, 147, 255, 0.639),
                -4px -6px 10px -1px rgba(61, 109, 164, 0.265);
        }

        a {
            text-decoration: none;
            color: #2b063f;
        }

        .teachernameid {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #namee {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    $id = $_SESSION["id"];
    $password = $_SESSION["password"];


    $mysql = mysqli_connect("localhost", "root", "", "minor_project");

    if ($mysql === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM teachers WHERE id='$id' AND password='$password'";
    $record_obj = mysqli_query($mysql, $sql);

    $n = mysqli_num_rows($record_obj);

    if ($n <= 0) {
        echo '<script>window.location.href = "index.html";</script>';
        exit();
    }
    $row = mysqli_fetch_row($record_obj);


    //LOGOUT
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();

        echo '<script>alert("Logout successful");</script>';
        echo '<script>window.location.href = "index.html";</script>';
        exit();
    }
    ?>





    <div class="hi">
        <div class="details">
            <div class="bio">

                <div class="teachernameid"><img src="img/tavtar1.png" alt="" id="picc">
                    <div id="namee"><b><?php echo $row["2"] ?></b></div>
                </div>
                <!-- <div class="teachernameid"> Teacher ID:</div -->
            </div>
            <div class="teacherworks">
                <a href="view_student.php">
                    <div class="part"><b>View/Edit <br>Students</b></div>
                </a>
                <a href="add_notice.php">
                    <div class="part"><b>Add Notice</b></div>
                </a>
                <a href="teacher_details.php">
                    <div class="part"><b>Details</b></div>
                </a>
            </div>
            <div class="teacherworks1">
                <a href="add_complaint.php">
                    <div class="part"><b>Complaint Box</b></div>
                </a>
                <a href="view_notice.php">
                    <div class="part"><b>View/Edit <br>Notices</b></div>
                </a>
                <a href="logout.php">
                    <div class="part"><b>Log out </b></div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>