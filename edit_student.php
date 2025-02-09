<?php
// Start session
session_start();

// Database connection
$mysql = mysqli_connect("localhost", "root", "", "minor_project");

if ($mysql === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch the student record to update
if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    // Fetch the student's data from the database
    $sql = "SELECT * FROM students WHERE id='$id'";
    $result = mysqli_query($mysql, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching record: " . mysqli_error($mysql);
    }
}

// Handle form submission for updating the student
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $admission_date = $_POST['admission_date'];
    $course = $_POST['course'];
    $guardian_name = $_POST['guardian_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Update the student record in the database
    $update_sql = "UPDATE students SET 
        password='$password', 
        name='$name', 
        gender='$gender', 
        dob='$dob', 
        admission_date='$admission_date',
        course='$course',
        guardian_name='$guardian_name',
        contact_number='$contact_number',
        email='$email',
        address='$address' 
        WHERE id='$id'";

    if (mysqli_query($mysql, $update_sql)) {        
        echo '<script>alert("Student updated successfully"); 
        window.location.href = "admin.php";</script>';
        
    } else { 
        echo "Error updating record: " . mysqli_error($mysql);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <style>
               body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }



        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        body {
            background-color: #ecc1ff
        }

        form {
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            font-size: 20px;
            border-radius: 10px;
            border: 1px solid #ecc1ff(255, 0, 221, 0.452);
            box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 100px;
            width: 500px;
            margin: 50px auto;
            padding: 50px;
            padding-top: 10px;
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            padding: 10px;
            margin-top: 10px;
            background-color: #c05cd4;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            
        }

        input[type="submit"]:hover {
            background-color: #b700ff;
        }
    </style>
</head>

<body>


        

        <form method="POST" action="">
            <h2>Update Student</h2>

            <label for="id">Student ID</label>
            <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly>

            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $row['password']; ?>" required>

            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

            <label for="gender">Gender</label>
            <select name="gender" required>
                <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>

            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required>

            <label for="admission_date">Admission Date</label>
            <input type="date" name="admission_date" value="<?php echo $row['admission_date']; ?>" required>

            <label for="course">Course</label>
            <input type="text" name="course" value="<?php echo $row['course']; ?>" required>

            <label for="guardian_name">Guardian Name</label>
            <input type="text" name="guardian_name" value="<?php echo $row['guardian_name']; ?>" required>

            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" value="<?php echo $row['contact_number']; ?>" required>

            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="address">Address</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required>

            <input type="submit" name="update" value="Update Student">

        </form>


</body>

</html>
