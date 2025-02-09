<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Form</title>
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
    <?php
    function generateUniqueId($department, $tableName, $mysql)
    {

        $year = date("Y");
        $month = date("m");
        $day = date("d");

        $sql = "SELECT COUNT(*) AS total FROM $tableName";
        $result = mysqli_query($mysql, $sql);
        $row = mysqli_fetch_assoc($result);
        $totalCount = $row['total'] + 1;

        $uniqueId = $department . $year . $month . $day . $totalCount;

        return $uniqueId;
    }


    $mysql = mysqli_connect("localhost", "root", "", "minor_project");

    if ($mysql === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if (isset($_POST["submit"])) {
        $password = $_POST['password'];
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $admission_date = $_POST['admission_date'];
        $course = $_POST['course'];
        $guardian_name = $_POST['guardian_name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $tableName = "students"; 
        $newId = generateUniqueId($course, $tableName, $mysql);


        $sql = "INSERT INTO students VALUES ('$newId', '$password', '$name', '$dob', '$gender', '$admission_date', '$course', '$guardian_name', '$contact_number', '$email', '$address')";

        if (mysqli_query($mysql, $sql)) {
            echo "<script>alert('Student added successfully' + '\\n\\n' + 'Name: $name' +'\\n' + 'Generated ID: $newId');</script>";
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($mysql);
        }
    }


    mysqli_close($mysql);
    ?>



    <form action="" method="POST">
        <h2>Add Student</h2>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" required>

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="admission_date">Admission Date</label>
        <input type="date" id="admission_date" name="admission_date" required>

        <label for="course">Course</label>
        <input type="text" id="course" name="course" required>

        <label for="guardian_name">Guardian Name</label>
        <input type="text" id="guardian_name" name="guardian_name" required>

        <label for="contact_number">Contact Number</label>
        <input type="text" id="contact_number" name="contact_number" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3" required></textarea>
        <br>
        <center><input type="submit" value="Add Student" name="submit"></center>
    </form>

</body>

</html>