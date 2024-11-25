<?php
// Include the database connection
include ('security.php');
include 'config/dbcon.php';
include 'includes/sidebar.php';

// Query to fetch data from the accounts table
$sql = "SELECT Status, ID, FirstName, LastName, Email, JoinDate, BankAccount, Money, RockStarID FROM accounts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 200px;
            background-color: #2c3e50;
            height: 100vh;
            color: white;
            padding-top: 20px;
            position: fixed;
        }
        .main-content {
            flex-grow: 1;
            padding: 0;
            margin: 0;
            background-color: #f4f4f4;
            height: 100vh;
            overflow-y: auto;
            margin-left: 200px; /* Leave space for the sidebar */
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 1px; /* Ensure the table starts after 1px */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="main-content">
        <h1>Player List</h1>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Join Date</th>
                    <th>Account Number</th>
                    <th>Money in Cash</th>
                    <th>Rock-star ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data for each row
                    while($row = $result->fetch_assoc()) {
                        // Determine status
                        $status = $row['Status'] == 1 ? 'Online' : 'Offline';
                        echo "<tr>
                            <td>{$status}</td>
                            <td>{$row['ID']}</td>
                            <td>{$row['FirstName']}</td>
                            <td>{$row['LastName']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['JoinDate']}</td>
                            <td>{$row['BankAccount']}</td>
                            <td>{$row['Money']}</td>
                            <td>{$row['RockStarID']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No players found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
