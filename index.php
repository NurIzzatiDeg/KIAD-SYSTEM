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
    <?php
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <a href="add_new.php" class="btn btn-dark mb-3">Add new</a>

    <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Service</th>
      <th scope="col">Barber</th>
      <th scope="col">Date/Time</th>
      <th scope="col">Payment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
       include "db_conn.php";
       $sql = "SELECT * FROM admin";
       $result = mysqli_query($conn, $sql);
       while ($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
        <td><?php echo $row['cust_id']?></td>
        <td><?php echo $row['cust_name']?></td>
        <td><?php echo $row['cust_email']?></td>
        <td><?php echo $row['cust_pass']?></td>
        <td><?php echo $row['cust_service']?></td>
        <td><?php echo $row['cust_barber']?></td>
        <td><?php echo $row['cust_date']?></td>
        <td><?php echo $row['cust_payment']?></td>
        
        <td>
          <a href="edit.php?id=<?php echo $row['cust_id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
          <a href="delete.php?id=<?php echo $row['cust_id']?>" class="fa-solid fa-trash fs-5"></a>
        </td>
      </tr>
           <?php    
       }       
    ?>
   
</div>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>