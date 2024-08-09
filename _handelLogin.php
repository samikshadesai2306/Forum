 <?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];

    $Sql ="SELECT * FROM user where user_email='$email';";
    $result = mysqli_query($conn, $Sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['srn'] = $row['srn'];
           
            $_SESSION['useremail'] = $email;
            echo "logged in ".$email;
        }
        header("Location:index.php");
    }
    header("Location:index.php");
}

$_SESSION['srn'];

?> 


<?php 
//   $showError ="fasle";
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     include '_dbconnect.php';
//     $email = $_POST['loginemail'];
//     $pass = $_POST['loginpass'];

//     $Sql = "SELECT * FROM user where user_email='$email';";
//     $result = mysqli_query($conn,$Sql);
//     $numRows = mysqli_num_rows($result);
//         if($numRows==1){
//             $row = mysqli_fetch_assoc($result);
//             if(password_verify($pass,$row['user_pass'])){
//                 session_start();
//                 $_SESSION['loggedin'] = true;
//                 $_SESSION['useremail'] = $email;
//                 echo "Logged in".$email;
//                 // header("Location:index.php");
//             }
//         }
//     }
// ?>

<?php
// $showError = "false";
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     include '_dbconnect.php';
//     $email = $_POST['loginemail'];
//     $pass = $_POST['loginpass'];

//     $sql = "Select * from user where user_email='$email';";
//     $result = mysqli_query($conn,$sql);
//     // $result = mysqli_query($conn, $sql);
//     $numRows = mysqli_num_rows($result);
//     if($numRows==1){
//         while($row = mysqli_fetch_assoc($result)){
//         if(password_verify($pass, $row['user_pass'])){
//             echo $email;
//             session_start();
//             $_SESSION['loggedin'] = true;
//             // $_SESSION['sno'] = $row['sno'];
//             $_SESSION['useremail'] = $email;

//             echo "logged in". $email;
//         } 
//         // header("Location: /forum/index.php");  
//     }  
//     }
//     // header("Location: /forum/index.php");  
// }

?>