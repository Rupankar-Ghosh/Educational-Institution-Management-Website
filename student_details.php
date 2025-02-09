<?php
// Start session
session_start();

// Check if student is logged in
if (!isset($_SESSION['id'])) {
    echo '<script>alert("Please log in to view your details."); window.location.href="index.html";</script>';
    exit();
}

// Database connection
$mysql = mysqli_connect("localhost", "root", "", "minor_project");

if ($mysql === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch student details using session student ID
$id = $_SESSION['id'];
$sql = "SELECT * FROM students WHERE id = '$id'";
$result = mysqli_query($mysql, $sql);
$student = mysqli_fetch_assoc($result);

if (!$student) {
    echo '<script>alert("Details not found."); window.location.href="login.php";</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #ecc1ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .details-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;

            /* background: linear-gradient(60deg, #ebdaffd4, #ffff, #ffff, #ffffff, #faf7ff, #ffffff, #d7ceffe1); */
            box-shadow: 6px 6px 10px -1px rgba(65, 10, 101, 0.58),
                -6px -6px 10px -1px rgba(255, 100, 255, 0.635);
            border-radius: 20px;
        }

        .details-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .details-container .detail {
            margin-bottom: 15px;
            font-size: 16px;
            color: #333;
        }

        .details-container .detail span {
            font-weight: bold;
            color: #555;
        }

        .back-btn {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            border: none;
            background-color: #c05cd4;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            
        }

        .back-btn:hover {
            background-color:  #b700ff;
        }

        h2{
            color: #b73fcf;
        }
    </style>
</head>

<body>
    <div class="details-container">
        <h2>Student Details</h2>

        <div class="detail"><span>ID:</span> <?php echo $student['id']; ?></div>
        <div class="detail"><span>Name:</span> <?php echo $student['name']; ?></div>
        <div class="detail"><span>Gender:</span> <?php echo $student['gender']; ?></div>
        <div class="detail"><span>Date of Birth:</span> <?php echo $student['dob']; ?></div>
        <div class="detail"><span>Admission Date:</span> <?php echo $student['admission_date']; ?></div>
        <div class="detail"><span>Course:</span> <?php echo $student['course']; ?></div>
        <div class="detail"><span>Guardian Name:</span> <?php echo $student['guardian_name']; ?></div>
        <div class="detail"><span>Contact Number:</span> <?php echo $student['contact_number']; ?></div>
        <div class="detail"><span>Email:</span> <?php echo $student['email']; ?></div>
        <div class="detail"><span>Address:</span> <?php echo $student['address']; ?></div>

        <a href="student.php" class="back-btn">Back to Dashboard</a>
    </div>
</body>

</html>
