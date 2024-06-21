<?php
  $cust_id = $_GET['cust_id'];
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KI'AD BARBER BOOKING SYSTEM</title>
    <link rel="stylesheet" href="date-time-style.css">
    <link rel="icon" type="image/x-icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <img width="200" height="150" src="logo-removebg-preview.png"sizes="(max-width: 200px) 100vw, 150px">
    </header>
    <main>
      <form method="POST" action = "#">
        <div class="input-group">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date">
        </div>
        <div class="input-group">
          <label for="time">Time:</label>
          <input type="time" id="time" name="time">
        </div>
        <div class="input-group">
          <label for="notes">Notes:</label>
          <textarea id="notes" name="notes"></textarea>
        </div>
        <div class="input-group">
          <button type=submit name=submit value=submit>Book Now</button>
          <!-- <a href="receipt.php">Book now</a> -->
        </div>
      </form>
    </main>
  </body>
</html>

<?php

  @include 'connection.php';

  if(isset($_POST['submit'])){
    echo"<script>alert(Submit button clicked)</script>";
    $time = $_POST['time'];
    $date = $_POST['date'];
    $timeformate = mysqli_real_escape_string($conn, $time);
    $date = date("Y-m-d", strtotime($date));
    $sql = "INSERT INTO receipt (receipt_ID, cust_id, service_ID, barber_id, datee, timee, price)
    VALUES('','$cust_id', 102, 16, '$date','$timeformate', 35.00)";
    $result = mysqli_query($conn, $sql);

    $receiptid = mysqli_insert_id($conn); 

    echo "<script>window.location.href='Receipt.php?receiptID=".$receiptid."'</script>";
    
  }
  

?>