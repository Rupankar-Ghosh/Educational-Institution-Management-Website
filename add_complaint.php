<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecc1ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
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
            width: 100%;
        }

        button:hover {
            background-color:  #b700ff;
        }

        .success {
            color: green;
            text-align: center;
        }

        .error {
            color: red;
            text-align: center;
        }
        #title{
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Complaint Box</h2>

        <?php
        // Handle complaint submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mysql = mysqli_connect("localhost", "root", "", "minor_project");

            if ($mysql === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $title = $_POST['title'];
            $complaint = $_POST['complaint'];

            // Insert the complaint into the database
            $sql = "INSERT INTO complaints (title, complaint) VALUES ('$title', '$complaint')";
            if (mysqli_query($mysql, $sql)) {
                echo '<script>alert("Complaint submitted successfully"); 
                window.location.href = "student.php";</script>';
            } else {
                echo '<div class="error">Error: ' . mysqli_error($mysql) . '</div>';
            }

            mysqli_close($mysql);
        }

        // Fetch teacher names from the database
        $mysql = mysqli_connect("localhost", "root", "", "minor_project");
        $result = mysqli_query($mysql, "SELECT name FROM teachers");
        $teachers = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $teachers[] = $row['name'];
        }
        mysqli_close($mysql);
        ?>

        <form method="POST" action="">
            <label for="title">Title :</label>
     
            <input type="text" id="title" placeholder="Enter the title" name="title" required>

            <label for="complaint">Your Complaint:</label>
            <textarea name="complaint" id="complaint" rows="5" placeholder="Enter Description" required></textarea>

            <button type="submit">Submit Complaint</button>
        </form>
    </div>
</body>

</html>
