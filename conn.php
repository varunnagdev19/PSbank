<!-- to connect to the database -->
<?php 
$conn=mysqli_connect("localhost","root","","tsfbank");
if(!$conn){
    die ("Connection unsuccessful");
}
?>