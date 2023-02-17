<?php
include 'conn.php';
include 'links.php';
$id=$_GET['id'];
$sql="SELECT Account_No from customers where Srno=$id";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
  while($row=mysqli_fetch_assoc($res)){
    $acc=$row['Account_No'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transfer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color: rgb(190, 190, 190);">

<!-- navbar -->
<nav class="navbar fixed-top navbar-expand-sm bg-dark navbar-dark">
  
  <a class="navbar-brand" href="index.php"><strong>P&S Bank</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
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
<h1 class="text-center text-light"><u>Transfer Funds</u></h1>
<br><br>

<!-- For the customer to fill the details (Sender's account no.,Receiver's account no.,Amount) -->
<form class="text-center border border-light rounded-pill"  method="post" action="trans.php"> 
    <br>
    <div class="form-horizontal ">
        <label for="Sender's account no." style="color: aliceblue;">Sender's account no.<sup><span style="color:red">*</sup></span></label>
        <input class="text-center" type="number"  readonly name="sac" placeholder="Enter account number" style="width: 20vw;" rows="1" required value=<?php echo $acc;?>>
    </div>
      <br><br>
    <div class="form-horizontal">
        <label for="Receiver's account no." style="color: aliceblue;">Receiver's account no.<sup><span style="color:red">*</sup></span></label>
        <input class="text-center"  type="number" name="rac" placeholder="Enter account number" rows="1" required style="width: 20vw;">
    </div>
    <br><br>
    <div class="form-horizontal">
        <label for="Amount" style="color: aliceblue;">Amount<sup><span style="color:red">*</sup></span></label>
        <input class="text-center" type="number" name="amt" placeholder="Enter amount" style="width: 20vw;" required>
    </div>
    <br>
    <div class="form-horizontal">
        <button type="submit" name="trbtn" class="btn btn-light btn-xs"><strong>Submit</strong></button>
    </div>
    <br>
    
    
</form>
<br><br><br><br>
<footer style="color:white; text-align: center;">&#169; 2022,P&S Bank<br>Created by Aayush Juhukar <br>as a part of TSF GRIP</footer>
</body>
</html>