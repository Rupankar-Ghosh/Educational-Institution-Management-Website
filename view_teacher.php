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
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $delete_sql = "DELETE FROM teachers WHERE id='$id'";
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
   
    <link rel="stylesheet" href="view_list.css">

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
                               <form method="POST" action="edit_teacher.php">
                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                <input type="submit" value="Edit" name="edit"> 
                                </form>&nbsp;&nbsp;
                                <form method="POST" action="">
                                <input type="hidden" name="id" value="' . $row["id"] . '">
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