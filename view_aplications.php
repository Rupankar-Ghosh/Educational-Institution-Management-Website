<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applications</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
            word-wrap: break-word; /* Allow wrapping of long text */
        }

        th {
            background-color:  #b700ff;
            color: white;
            text-align: center;
        }

        .pending {
            color: red;
        }

        .resolved {
            color: green;
        }

        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .status-button.pending {
            background-color: #FF5733;
            color: white;
        }

        .status-button.pending:hover {
            background-color: #FF4500;
        }

        .status-button {
            color: white;
        }

        td.complaint {
            max-width: 500px; /* Limit width of complaint cell */
            /* height: 80px; Set a fixed height for complaint cells */
            overflow-y: auto; /* Add scroll if complaint exceeds the height */
            white-space: normal; /* Allow wrapping of text */
        }

        .complaint{
            text-align: left;
            width: 400px;
        }

        .back-btn {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            border: none;
            
            background-color:  #b700ff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 200px;
            
        }
        .back-btn:hover {
            background-color: #c05cd4;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
        .no-data {
            text-align: center;
            color: #777;
            font-size: 18px;
            margin-top: 20px;
        }
        h2{
            color:  #b700ff;
            text-align: center;
        }

    </style>
</head>
<body>
    <h2>View Applications</h2>
    <div class="table-container">
        <?php
        // Database connection
        $mysql = mysqli_connect("localhost", "root", "", "minor_project");

        if ($mysql === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Fetch applications from the database
        $sql = "SELECT * FROM applications ORDER BY submission_date DESC";
        $result = mysqli_query($mysql, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Date of Birth</th>
                            <th>Course</th>
                            <th>Address</th>
                            <th>Submission Date</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['contact_number']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['submission_date']}</td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='no-data'>No applications found.</p>";
        }

        mysqli_close($mysql);
        ?>
    </div>
    <a href="admin.php" class="back-btn">Back to Dashboard</a>
</body>
</html>
