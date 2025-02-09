<?php
function generateUniqueId($department, $tableName, $mysql) {
    // Get the current date components
    $year = date("Y");
    $month = date("m");
    $day = date("d");

    // Get the total number of records in the table
    $sql = "SELECT COUNT(*) AS total FROM $tableName";
    $result = mysqli_query($mysql, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalCount = $row['total'] + 1; // Adding 1 to count for the new record

    // Construct the unique ID
    $uniqueId = $department . $year . $month . $day . $totalCount;

    return $uniqueId;
}

$mysql = mysqli_connect("localhost", "root", "", "minor_project");

    if ($mysql === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

        $tableName = "students"; 
        $course="BCA";
        $newId = generateUniqueId($course, $tableName, $mysql);

        echo "Generated ID: " . $newId;

?>
