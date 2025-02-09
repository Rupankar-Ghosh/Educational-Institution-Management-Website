<?php
// Start session
session_start();

// Check if teacher ID is passed
if (!isset($_POST['id'])) {
    echo '<script>window.location.href = "view_teachers.php";</script>';
    exit();
}

// Database connection
$mysql = mysqli_connect("localhost", "root", "", "minor_project");

if ($mysql === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch teacher data based on passed ID
$id = $_POST['id'];
$sql = "SELECT * FROM teachers WHERE id='$id'";
$result = mysqli_query($mysql, $sql);
$teacher = mysqli_fetch_assoc($result);

// Update teacher details
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $qualification = $_POST['qualification'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $aadhar_no = $_POST['aadhar_no'];
    $address = $_POST['address'];

    // Update SQL query
    $update_sql = "UPDATE teachers SET 
                    name='$name', 
                    password='$password', 
                    gender='$gender', 
                    dob='$dob', 
                    qualification='$qualification', 
                    specialization='$specialization', 
                    experience='$experience', 
                    contact_no='$contact_no', 
                    email='$email', 
                    aadhar_no='$aadhar_no', 
                    address='$address' 
                    WHERE id='$id'";
                    
    $update_result = mysqli_query($mysql, $update_sql);

    if ($update_result) {
        echo '<script>alert("Student updated successfully"); 
        window.location.href = "admin.php";</script>';
    } else {
        echo '<script>alert("Error updating teacher details!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
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

        .edit-form input[type="submit"] {
            padding: 10px;
            width: 100%;
            border-radius: 20px;
            background-color: #760785;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .edit-form input[type="submit"]:hover {
            background-color: #5e0669;
        }

    </style>
</head>

<body>

  
        
        <form method="POST" action="">
        <h2>Edit Teacher</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $teacher['name']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $teacher['password']; ?>" required>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="Male" <?php echo ($teacher['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($teacher['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo ($teacher['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" value="<?php echo $teacher['dob']; ?>" required>

            <label for="qualification">Qualification:</label>
            <input type="text" name="qualification" value="<?php echo $teacher['qualification']; ?>" required>

            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" value="<?php echo $teacher['specialization']; ?>" required>

            <label for="experience">Experience (years):</label>
            <input type="number" name="experience" value="<?php echo $teacher['experience']; ?>" required>

            <label for="contact_no">Contact Number:</label>
            <input type="tel" name="contact_no" value="<?php echo $teacher['contact_no']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $teacher['email']; ?>" required>

            <label for="aadhar_no">Aadhar Number:</label>
            <input type="text" name="aadhar_no" value="<?php echo $teacher['aadhar_no']; ?>" required>

            <label for="address">Address:</label>
            <textarea name="address" rows="3" required><?php echo $teacher['address']; ?></textarea>

            <input type="hidden" name="id" value="<?php echo $teacher['id']; ?>">

            <input type="submit" name="update" value="Update">
        </form>
  

</body>

</html>
