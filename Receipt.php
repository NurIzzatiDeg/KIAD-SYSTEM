<?php

$receipt_ID = $_GET['receiptID'];
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbbarber";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Query to fetch receipt data from the database
$sql1 = "SELECT r.receipt_ID, c.cust_id, s.service_ID, b.barber_id, r.date, r.time, r.price 
        FROM receipt r
        INNER JOIN customer c ON r.cust_id = c.cust_id
        INNER JOIN service s ON r.service_ID = s.service_ID
        INNER JOIN barber b ON r.barber_id = b.barber_id
        ORDER BY r.receipt_ID DESC
        LIMIT 1";

$sql = "SELECT * FROM `receipt` WHERE receipt_ID = '$receipt_ID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data from the result set
    $row = $result->fetch_assoc();

    // Assign data to variables
    $receipt_ID = $row["receipt_ID"];
    $cust_id = $row["cust_id"];
    $service_ID = $row["service_ID"];
    $barber_id = $row["barber_id"];
    $date = $row["datee"];
    $time = $row["timee"];
    $price = $row["price"];

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        /* CSS styles for the receipt */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .center {
            text-align: center;
        }
        .print-button {
            text-align: center;
            margin-top: 20px;
        }
        .note {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }

        /* ... */
    </style>
</head>
<body>
    <h1>Receipt</h1>
    <table>
        <tr>
            <th>Receipt ID</th>
            <th>Customer ID</th>
            <th>Service ID</th>
            <th>Barber ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Price</th>
        </tr>
        <tr>
            <td><?php echo $receipt_ID; ?></td>
            <td><?php echo $cust_id; ?></td>
            <td><?php echo $service_ID; ?></td>
            <td><?php echo $barber_id; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $time; ?></td>
            <td><?php echo $price; ?></td>
        </tr>
    </table>

    <div class="note">
        PLEASE SCREENSHOT THIS RECEIPT BEFORE HAVING A HAIRCUT
    </div>

    <!-- Print button -->
    <div class="print-button">
        <button onclick="window.print()">Print</button>
    </div>
</body>
</html>