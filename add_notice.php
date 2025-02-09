<?php
// Database connection
$mysql = mysqli_connect("localhost", "root", "", "minor_project");

if ($mysql === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['add_notice'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Insert the notice into the database
    $sql = "INSERT INTO notices (title, date, description) VALUES ('$title', '$date', '$description')";

    if (mysqli_query($mysql, $sql)) {
        echo '<script>alert("Notice added successfully."); 
        window.location.href = "admin.php";</script>';
    } else {
        echo "Error: " . mysqli_error($mysql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Notice</title>
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

    <div class="add-notice-form">
        

        <form method="POST" action="">
        <h2>Add New Notice</h2>

            <label for="title">Title</label>
            <input type="text" name="title" required>

            <label for="date">Date</label>
            <input type="date" name="date" required>

            <label for="description">Description</label>
            <textarea name="description" rows="5" required></textarea>

            <input type="submit" name="add_notice" value="Add Notice">

        </form>
    </div>

</body>

</html>
