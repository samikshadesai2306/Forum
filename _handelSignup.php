<?php 
  $showError ="fasle";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['signupmail'];
    $pass = $_POST['singuppassword'];
    $cpass = $_POST['singupcpassword'];

//    Check Whether this email is exists
    $existSql ="SELECT * FROM `user` where user_email = '$email'";
    $result = mysqli_query($conn ,$existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError="Email already in use";
    }
    else{
        if($pass == $cpass){
                $hash = password_hash($pass,PASSWORD_DEFAULT);
                $sql ="INSERT INTO `user` ( `user_email`, `user_pass`, `timestamp`) VALUES ( '$email', '$hash', current_timestamp());";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $showresult = true;
                    header("Location:index.php?signupsuccess=true&error=$showError");
                    exit();
                }
        }
        else{
            $showError="Password Do not match"; 

        }
    }
    header("Location:index.php?signupsuccess=false&error=$showError");
} 


?>