<?php
// Start the session
session_start();
$id = $_SESSION["id"];
$password = $_SESSION["password"];
$role = $_SESSION["role"];

$mysql = mysqli_connect("localhost", "root", "", "minor_project");

if ($mysql === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($role=="teacher"){
    $sql = "SELECT * FROM teachers WHERE id='$id' AND password='$password';";
}

if($role=="admin"){
    $sql = "SELECT * FROM admin WHERE id='$id' AND password='$password';";
}

$record_obj = mysqli_query($mysql, $sql);

if (mysqli_num_rows($record_obj) <= 0) {
    echo '<script>window.location.href = "index.html";</script>';
    exit();
}

// Handle delete notice
if (isset($_POST['delete']) && isset($_POST['notice_id'])) {
    $notice_id = $_POST['notice_id'];
    $delete_sql = "DELETE FROM notices WHERE id='$notice_id'";
    mysqli_query($mysql, $delete_sql);
}

// Fetch notices
$sql = "SELECT * FROM notices ORDER BY date DESC";
$record_obj = mysqli_query($mysql, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notices</title>
    
    <link rel="stylesheet" href="view_list.css">
</head>

<body>
    <br><br>
    <center><h1>All Notices</h1></center>

    <ul class="colaps">
    <?php
    // Fetch notices and display them in a collapsible list
    while ($row = mysqli_fetch_assoc($record_obj)) {
        echo '
        <li>
            <input type="checkbox" name="colaps" id="' . $row["id"] . '">
            <label for="' . $row["id"] . '">
                <table width="600">
                    <tr>
                        <td>' . $row["title"] . '</td>
                        <td align="right">' . $row["date"] . '</td>
                    </tr>
                </table>
            </label>
            <div class="content">
                 <hr> <br>
                <table width="600">
                        <td style="line-height: 18px;">' . $row["description"] . '</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <br>
                           
                            <form method="POST" action="">
                                <input type="hidden" name="notice_id" value="' . $row["id"] . '">
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
