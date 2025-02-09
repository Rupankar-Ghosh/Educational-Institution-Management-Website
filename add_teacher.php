<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #b700ff;
            box-shadow: 0 0 8px rgba(183, 0, 255, 0.3);
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #c05cd4;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #b700ff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group-full {
            margin-bottom: 20px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .icon {
            margin-right: 10px;
            color: #b700ff;
        }

        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            input,
            textarea,
            select {
                padding: 10px;
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 16px;
            }
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
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $qualification = $_POST['qualification'];
        $specialization = $_POST['specialization'];
        $experience = $_POST['experience'];
        $contact_no = $_POST['contact_no'];
        $email = $_POST['email'];
        $aadhar_no = $_POST['aadhar_no'];
        $address = $_POST['address'];

        $tableName = "teachers";
        $newId = generateUniqueId("T", $tableName, $mysql);

        $sql = "INSERT INTO teachers VALUES ('$newId', '$password', '$name', '$gender', '$dob', '$qualification', '$specialization', '$experience', '$contact_no', '$email', '$aadhar_no', '$address')";

        if (mysqli_query($mysql, $sql)) {
            echo "<script>alert('Teacher added successfully' + '\\n\\n' + 'Name: $name' +'\\n' + 'Generated ID: $newId');  window.location.href = 'admin.php';</script>";
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($mysql);
        }
    }

    mysqli_close($mysql);
    ?>

    <form action="" method="POST">
        <h2><i class="fas fa-user-plus icon"></i>Add Teacher</h2>

        <div class="form-group-full">
            <label for="name"><i class="fas fa-user icon"></i>Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="password"><i class="fas fa-lock icon"></i>Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="gender"><i class="fas fa-venus-mars icon"></i>Gender</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dob"><i class="fas fa-calendar-alt icon"></i>Date of Birth</label>
            <input type="date" id="dob" name="dob" required>
        </div>

        <div class="form-group-full">
            <label for="qualification"><i class="fas fa-graduation-cap icon"></i>Qualification</label>
            <input type="text" id="qualification" name="qualification" required>
        </div>

        <div class="form-group-full">
            <label for="specialization"><i class="fas fa-book icon"></i>Specialization</label>
            <input type="text" id="specialization" name="specialization" required>
        </div>

        <div class="form-group">
            <label for="experience"><i class="fas fa-briefcase icon"></i>Years of Experience</label>
            <input type="number" id="experience" name="experience" required>
        </div>

        <div class="form-group">
            <label for="contact_no"><i class="fas fa-phone icon"></i>Contact Number</label>
            <input type="text" id="contact_no" name="contact_no" required>
        </div>

        <div class="form-group-full">
            <label for="email"><i class="fas fa-envelope icon"></i>Email ID</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group-full">
            <label for="aadhar_no"><i class="fas fa-id-card icon"></i>Aadhar Card Number</label>
            <input type="text" id="aadhar_no" name="aadhar_no" required>
        </div>

        <div class="form-group-full">
            <label for="address"><i class="fas fa-home icon"></i>Address</label>
            <textarea id="address" name="address" rows="4" required></textarea>
        </div>

        <br>
        <center><input type="submit" value="Add Teacher" name="submit"></center>
    </form>
</body>

</html>