<?php
include "db_conn.php";
$id = $_GET['id'];
$sql = "SELECT * FROM `admin` WHERE cust_id = $id";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!--Font Awesome-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
     integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>KI'AD BARBERSHOP ADMIN SYSTEM</title>
</head>
<body>

<nav class="navbar navbar-light justify-content-center fs-3 mb-5"
style="background-color: #9DB2BF">
    KI'AD BARBERSHOP ADMIN SYSTEM
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>Edit customer information</h3>
        <p class="text-muted">Click update button after changing any information</p>
    </div>

    <?php
       $sql = "SELECT * FROM admin WHERE cust_id = $id LIMIT 1";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
           
        </div>

        <div class="col mb-3">
                <label class="form-label">
                    Name:
                </label>
                <input type="text" class="form-control" name="cust_name" placeholder="Name" value="<?php echo $row['cust_name']?>">
            </div>

            <div class="col mb-3">
                <label class="form-label">
                    Email:
                </label>
                <input type="text" class="form-control" name="cust_email" placeholder="Name@gmail.com" value="<?php echo $row['cust_email']?>">
            </div>

            <div class="col mb-3">
                <label class="form-label">
                    Password:
                </label>
                <input type="text" class="form-control" name="cust_pass" placeholder="*****" value="<?php echo $row['cust_pass']?>">
            </div>

            <div class="col mb-3">
    <label class="form-label">
        Select services:
    </label>

    <select class="form-control" name='cust_service' id="cust_service">
        <option>--SELECT--</option>
        <option value="HAIRCUT" <?php if($row['cust_service'] === 'HAIRCUT') echo 'selected'; ?>>HAIRCUT</option>
        <option value="HAIRCUT&WASH" <?php if($row['cust_service'] === 'HAIRCUT&WASH') echo 'selected'; ?>>HAIRCUT & WASH</option>
        <option value="HAIRCUT&BEARDTRIM" <?php if($row['cust_service'] === 'HAIRCUT&BEARDTRIM') echo 'selected'; ?>>HAIRCUT & BEARD TRIM</option>
        <option value="HAIRCUT&WASH+BEARDTRIM" <?php if($row['cust_service'] === 'HAIRCUT&WASH+BEARDTRIM') echo 'selected'; ?>>HAIRCUT & WASH + BEARD TRIM</option>
    </select>
</div>


            <div class="col mb-3">
    <label class="form-label">
        Barber:
    </label>
                
    <select class="form-control" name='cust_barber' id="cust_barber">
        <option>--SELECT--</option>
        <option value="ADI PUTRA" <?php if($row['cust_barber'] === 'ADI PUTRA') echo 'selected'; ?>>ADI PUTRA</option>
        <option value="MEERQEEN" <?php if($row['cust_barber'] === 'MEERQEEN') echo 'selected'; ?>>MEERQEEN</option>
        <option value="SYUKRI YAHYA" <?php if($row['cust_barber'] === 'SYUKRI YAHYA') echo 'selected'; ?>>SYUKRI YAHYA</option>
    </select>    
</div>


<div class="col mb-3">
    <label class="form-label">
        Date & Time:
    </label>
    <input type="datetime-local" class="form-control" name="cust_date" value="<?php echo date('Y-m-d H:i', strtotime($row['cust_date'])); ?>">
</div>

<div class="col mb-3">
    <label class="form-label">
        Payment:
    </label>
                
    <select class="form-control" name='cust_payment' id="cust_payment">
        <option>--SELECT--</option>
        <option value="Completed" <?php if($row['cust_payment'] === 'Completed') echo 'selected'; ?>>COMPLETED</option>
        <option value="Incompleted" <?php if($row['cust_payment'] === 'Incompleted') echo 'selected'; ?>>INCOMPLETED</option>
    </select>
</div>


            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
       </form>
    </div>
</div>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    
    $cust_name = $_POST['cust_name'];
    $cust_email = $_POST['cust_email'];
    $cust_pass = $_POST['cust_pass'];
    $cust_service = $_POST['cust_service'];
    $cust_barber = $_POST['cust_barber'];
    $cust_date = $_POST['cust_date'];
    $cust_payment = $_POST['cust_payment'];

    $sql = "UPDATE `admin` 
    SET cust_name='$cust_name', cust_email='$cust_email', cust_pass='$cust_pass', cust_service='$cust_service', cust_barber='$cust_barber', cust_date='$cust_date', cust_payment='$cust_payment' 
    WHERE cust_id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){ 
       header("Location : index.php");
       exit;
    }
    else{
       echo "Failed:" . mysqli_error($conn);
    }
}
