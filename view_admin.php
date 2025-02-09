<?php
session_start();
$id = $_SESSION["id"];
$password = $_SESSION["password"];

$mysql = mysqli_connect("localhost", "root", "", "minor_project");

if ($mysql === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM admin WHERE id='$id' AND password='$password' ORDER BY id";
$record_obj = mysqli_query($mysql, $sql);
$n = mysqli_num_rows($record_obj);

if ($n <= 0) {
    echo '<script>window.location.href = "index.html";</script>';
    exit();
}

// DELETE TEACHER
if (isset($_POST['delete']) && isset($_POST['teacher_id'])) {
    $teacher_id = $_POST['teacher_id'];
    $delete_sql = "DELETE FROM teachers WHERE id='$teacher_id'";
    $result = mysqli_query($mysql, $delete_sql);

    if ($result) {
        echo '<script>alert("Delete successful");</script>';
    } else {
        echo '<script>alert("Error deleting record.");</script>';
    }
}

// Fetch teacher records
$sql = "SELECT * FROM teachers";
$record_obj = mysqli_query($mysql, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Teachers</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        input[type="submit"] {
            padding: 10px;
            width: 100px;
            border-radius: 20px;
        }

        body,
        hr {
            background: #76078549;
        }

        .colaps {
            margin: 60px auto;
            width: 700px;
        }

        .colaps li {
            list-style: none;
            width: 100%;
            margin: 20px;
            padding: 10px;
            border-radius: 10px;
            background: white;
            box-shadow: 6px 6px 10px -1px rgba(0, 0, 0, 0.15),
                -6px -6px 10px -1px rgba(104, 104, 104, 0.7);
        }

        .colaps li label {
            display: flex;
            align-items: center;
            padding: 10px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
        }

        label::before {
            content: "+";
            margin-right: 10px;
            font-size: 24px;
            font-weight: 600;
        }

        input[type="checkbox"] {
            display: none;
        }

        .colaps .content {
            line-height: 26px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s, padding 0.5s;
        }

        .colaps input[type="checkbox"]:checked+label+.content {
            max-height: 700px;
            padding: 10px 10px 20px;
        }

        .colaps input[type="checkbox"]:checked+label::before {
            content: '-'
        }

        input[name="delete"] {
            color: red;
            border: 2px solid red;
            background-color: transparent;
        }

        input[name="edit"] {
            color: green;
            border: 2px solid green;
            background-color: transparent;
        }

        h1 {
            color: #b700ff;
        }

    </style>

</head>

<body>
    <br><br>
    <center>
        <h1>All Teachers</h1>
    </center>

    <ul class="colaps">
        <?php
        while ($row = mysqli_fetch_assoc($record_obj)) {
            echo '
            <li>
                <input type="checkbox" name="colaps" id="' . $row["id"] . '">
                <label for="' . $row["id"] . '">
                    <table width="600">
                        <tr>
                            <td>' . $row["name"] . '</td>
                            <td align="right">' . $row["id"] . '</td>
                        </tr>
                    </table>
                </label>
                <div class="content">
                     <hr> <br>
                    <table width="600">
                        <tr>
                            <td width="150">ID</td>
                            <td>: ' . $row["id"] . '</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>: ' . $row["password"] . '</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>: ' . $row["name"] . '</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>: ' . $row["gender"] . '</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td>: ' . $row["dob"] . '</td>
                        </tr>
                        <tr>
                            <td>Qualification</td>
                            <td>: ' . $row["qualification"] . '</td>
                        </tr>
                        <tr>
                            <td>Specialization</td>
                            <td>: ' . $row["specialization"] . '</td>
                        </tr>
                        <tr>
                            <td>Experience</td>
                            <td>: ' . $row["experience"] . ' years</td>
                        </tr>
                        <tr>
                            <td>Contact No</td>
                            <td>: ' . $row["contact_no"] . '</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: ' . $row["email"] . '</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>: ' . $row["address"] . '</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <br>
                                <form method="POST" action="">
                                    <input type="hidden" name="teacher_id" value="' . $row["id"] . '">
                                    <input type="submit" value="Edit" name="edit"> &nbsp;&nbsp;
                                    <input type="submit" value="Delete" name="delete">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </li>';
        }
        ?>
    </ul>
</body>

</html>
