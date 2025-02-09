<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #444;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
            word-wrap: break-word;
        }

        th {
            background-color: #b700ff;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .pending {
            color: red;
        }

        .resolved {
            color: green;
        }

        button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .status-button.pending {
            background-color: #FF5733;
        }

        .status-button.pending:hover {
            background-color: #FF4500;
        }

        .status-button {
            color: white;
        }

        td.complaint {
            max-width: 500px;
            overflow-y: auto;
            white-space: normal;
            text-align: left;
        }

        .back-btn {
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
            width: 200px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #b700ff;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #fff;
            font-size: 14px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Complaint Box</h2>

        <?php
        session_start();
        $id = $_SESSION["id"];
        $password = $_SESSION["password"];

        $mysql = mysqli_connect("localhost", "root", "", "minor_project");

        if ($mysql === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM admin WHERE id='$id' AND password='$password'";
        $record_obj = mysqli_query($mysql, $sql);

        $n = mysqli_num_rows($record_obj);

        if ($n <= 0) {
            echo '<script>window.location.href = "index.html";</script>';
            exit();
        }

        if ($mysql === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Handle status update
        if (isset($_GET['toggle_id'])) {
            $toggle_id = $_GET['toggle_id'];
            
            // Fetch current status
            $result = mysqli_query($mysql, "SELECT status FROM complaints WHERE id = $toggle_id");
            $row = mysqli_fetch_assoc($result);
            $current_status = $row['status'];

            // Toggle status
            $new_status = ($current_status === 'Pending') ? 'Resolved' : 'Pending';
            $update_query = "UPDATE complaints SET status = '$new_status' WHERE id = $toggle_id";
            mysqli_query($mysql, $update_query);
        }

        // Fetch complaints
        $result = mysqli_query($mysql, "SELECT * FROM complaints");

        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Complaints</th>
                        <th>Date/Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                $status_class = strtolower($row['status']);
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['title']}</td>
                        <td class='complaint'>{$row['complaint']}</td>
                        <td>{$row['date_time']}</td>
                        <td class='$status_class'>{$row['status']}</td>
                        <td>
                            <a href='?toggle_id={$row['id']}'>
                                <button class='status-button $status_class'>
                                    <i class='fas fa-sync-alt'></i> Change Status
                                </button>
                            </a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No complaints found.</p>";
        }

        mysqli_close($mysql);
        ?>
        <br><br>
        <a href="admin.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="footer">
        <p>&copy; 2025 ABC collage. All rights reserved. | <a href="#">Privacy Policy</a></p>
    </div>
</body>

</html>