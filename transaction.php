<?php 
include 'links.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>All customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" type="image/x-icon" href="image-removebg-preview (7).png">
</head>
<body style="background-color: rgb(190, 190, 190);">

<!-- navbar -->
<nav class="navbar fixed-top navbar-expand-sm bg-dark navbar-dark">
  
  <a class="navbar-brand" href="index.php"><strong>P&S Bank</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">   <!--autocollapse for small screen devices-->
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="nav">
    <ul class="navbar-nav">
    
      <li class="nav-item">
        <a class="nav-link" href="transaction.php"><i class="fa fa-users"></i> All Customer</a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="moneytransfer.php"><i class="fa fa-money" aria-hidden="true"></i> All Transactions</a>
      </li>
  </ul>
  </div>
</nav>
<br><br><br><br>
<h1 class="text-center text-light"><u>All Customers</u></h1>
<br>

<!-- alerts -->
<?php if (isset($_GET['success'])) { ?> 
<div class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo "<strong>Transfer Success</strong>";?>
</div>
<?php } ?>
<?php if (isset($_GET['error'])) { ?> 
<div class="alert alert-danger alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo "<strong>Invalid Account or Insufficient Funds</strong>";?>
</div>
<?php } ?>
<table class="table table-stripped" style="color:black">
    <thead>
      <tr>
        <th>SrNo</th>
        <th>Name</th>
        <th>Email ID</th>
        <th>Account No.</th>
        <th>Phone No.</th>
        <th>Balance</th>
        <th>View details</th>
      </tr>
    </thead>
    <tbody>
  <?php 
  include "conn.php"; //importing the connection file
  
  $sql="Select Srno,Name,Email,Account_No,Phone_No,Balance from customers"; //fetching data from database
  $result = mysqli_query($conn,$sql); //executing the query and storing the result

  //dynamically adding the rows from the database into the table
  if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
      
            
  ?>
  
      <tr>
        <td><?php echo $row['Srno'];?></td>
        <td><?php echo $row['Name'];?></td>
        <td><?php echo $row['Email'];?></td>
        <td><?php echo $row['Account_No'];?></td>
        <td><?php echo $row['Phone_No'];?></td>
        <td><?php echo "₹".$row['Balance'];?></td>
        

      <td><button type="button" class="btn btn-success btn-xs"  data-toggle="modal" data-target="#myModal<?php echo $row['Srno'];?>">View</button></td>
    </tr>

  <!-- modal box for displaying data in expanded format -->
    <div id="myModal<?php echo $row['Srno'];?>" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-body">
            <p>Name: <?php echo $row['Name'];?></p>
            <p>Account No.: <?php echo $row['Account_No'];?></p>
            <p>Email ID: <?php echo $row['Email'];?></p>
            <p>Phone No.: <?php echo $row['Phone_No'];?></p>
            <p>Balance: <?php echo "₹".$row['Balance'];?></p>
            
            
            <?php echo '<a href="transfer.php?id='.$row['Srno'].'">';?><button class="btn btn-success btn-sm">Transfer</button></a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>
    <?php
    }
  } else {
    echo "0 results";
  }?>
    </tbody>
  </table>

<br><br><br><br>

<footer style="color:white; text-align: center;">&#169; 2023,P&S Bank<br>Created by Varun Nagdev <br>as a part of TSF GRIP</footer>
</body>
</html>