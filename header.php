<?php
session_start();

  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="forumAbout.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Top Catagories</a>
          <ul class="dropdown-menu">';

          $sql = "SELECT category_name,category_id FROM `categorise` LIMIT 3;";
          $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
           echo' <li><a class="dropdown-item" href="thredlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
            }
        echo' </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="forumContact.php"> Contact</a>
        </li>
      </ul>
      <div class="container row mx-2">';
      
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo ' 
           
            <form class="d-flex text-light" role="search" action="search.php" method="GET">
              <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search"> 
              <button class="btn btn-success mx-3" type="submit">Search</button> </from>
              Wellcome -'.$_SESSION['useremail'].'
              <a href="_logout.php" class="btn btn-outline-success mx-2">Logout</a>
             ';
          }
          else{
            echo '<form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> 
              <button class="btn btn-success" type="submit">Search</button>
              <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">LogIn</button>
              <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupmodal">SingUp</button>
              </form>';
            }
  echo '</div>
    </div>
  </div>
</nav>';


// echo $_SESSION['useremail'];

include '_loginModal.php';
include '_signUpModal.php';


if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can login NOW...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
// else{
//   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//   <strong>Warning!</strong>You can\'t Login...
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';
// }
?>