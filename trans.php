<?php 
include "conn.php";
(int)$sac=($_POST["sac"]);
(int)$rac=($_POST["rac"]);
(int)$amt=($_POST["amt"]);

if(isset($sac)&&isset($rac)&&isset($amt)){
    $sql="SELECT Account_No,Balance from customers where Account_No=$sac and Balance>=$amt"; 
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        $sql="SELECT Account_No from customers where Account_No=$rac"; 
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $tran="UPDATE customers set Balance=Balance+$amt where Account_no=$rac";
                $result1=mysqli_query($conn,$tran);
                $tran1="UPDATE customers set Balance=Balance-$amt where Account_no=$sac";
                $result2=mysqli_query($conn,$tran1);
                if($result1){
                    if($result2){
                        $sql="INSERT into transfers(Sender,Receiver,Amount,Transfer_status) values ($sac,$rac,$amt,'Success')";
                        $exe=mysqli_query($conn,$sql);
                        // header("Location:transaction.php?success=success");
                        echo "<script>window.location.href='transaction.php?success=success'</script>";
                    }
                    else{
                        $sql="INSERT into transfers(Sender,Receiver,Amount,Transfer_status) values ($sac,$rac,$amt,'Error')";
                        $exe=mysqli_query($conn,$sql);
                        echo "<script>window.location.href='transaction.php?error=erroroccured'</script>";
                    }   
                }
                else{
                    $sql="INSERT into transfers(Sender,Receiver,Amount,Transfer_status) values ($sac,$rac,$amt,'Error')";
                    $exe=mysqli_query($conn,$sql);
                    // header("Location:transaction.php?error=erroroccured");
                    echo "<script>window.location.href='transaction.php?error=erroroccured'</script>";

                    
                } 
            }
        }
        else{
            $sql="INSERT into transfers(Sender,Receiver,Amount,Transfer_status) values ($sac,$rac,$amt,'Error')";
            $exe=mysqli_query($conn,$sql);
            // header("Location:transaction.php?error=erroroccured");
            echo "<script>window.location.href='transaction.php?error=erroroccured'</script>";

        }
    }
    
    else{
        $sql="INSERT into transfers(Sender,Receiver,Amount,Transfer_status) values ($sac,$rac,$amt,'Error')";
        $exe=mysqli_query($conn,$sql);
        // header("Location:transaction.php?error=erroroccured");
        echo "<script>window.location.href='transaction.php?error=erroroccured'</script>";

        
    }

}
?>