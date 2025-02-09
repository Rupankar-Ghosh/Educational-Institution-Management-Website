<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link rel="stylesheet" href="view_list.css">

</head>

<body>
    <?php
    session_start();
    $id = $_SESSION["id"];
    $password = $_SESSION["password"];
    $role = $_SESSION["role"];

    $mysql = mysqli_connect("localhost", "root", "", "minor_project");

    if ($mysql === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if ($role == "teacher") {
        $sql = "SELECT * FROM teachers WHERE id='$id' AND password='$password';";
    } else if ($role == "admin") {
        $sql = "SELECT * FROM admin WHERE id='$id' AND password='$password';";
    } else {
        echo '<script>window.location.href = "index.html";</script>';
        exit();
    }

    $record_obj = mysqli_query($mysql, $sql);


    $n = mysqli_num_rows($record_obj);




    // DELETE STUDENT
    if (isset($_POST['delete']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $delete_sql = "DELETE FROM students WHERE id='$id'";
        $result = mysqli_query($mysql, $delete_sql);

        // if ($result) {
        //     echo '<script>alert("Delete successful");</script>';
        // } else {
        //     echo '<script>alert("Error deleting record.");</script>';
        // }
    }

    // Fetch student records
    $sql = "SELECT * FROM students";
    $record_obj = mysqli_query($mysql, $sql);
    ?>

    <br><br>
    <center>
        <h1>All Students</h1>
    </center>

    <ul class="colaps">
        <?php
        // Assume $record_obj is the result of a valid SQL query fetching all student details
        
        while ($row = mysqli_fetch_assoc($record_obj)) {
            echo '
        <li class="slideUp">
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
                        <td>Admission Date</td>
                        <td>: ' . $row["admission_date"] . '</td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td>: ' . $row["course"] . '</td>
                    </tr>
                    <tr>
                        <td>Guardian Name</td>
                        <td>: ' . $row["guardian_name"] . '</td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>: ' . $row["contact_number"] . '</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: ' . $row["email"] . '</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td style="line-height: 18px;">: ' . $row["address"] . '</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                            <form method="POST" action="edit_student.php">
                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                <input type="submit" value="Edit" name="edit"> 
                            </form>&nbsp;&nbsp;


                            
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