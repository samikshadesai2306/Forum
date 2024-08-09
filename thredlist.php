<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss - coding forum </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <?php include '_dbconnect.php';?>
    <?php include 'header.php';?>
    <?php
    $showalert = false;
      $id = $_GET['catid'];
      $sql = "SELECT * FROM `categorise` WHERE category_id =$id";
      $result = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_discreption']; 
      } 
    ?>

    <?php
    $method =$_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        // insert thread  into db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<","&lt;",$th_title);
        $th_title = str_replace(">","&gt;",$th_title);
        
        $th_desc = str_replace("<","&lt;",$th_desc);
        $th_desc = str_replace(">","&gt;",$th_desc);

        $srn = $_POST['srn'];
        $sql = "INSERT INTO `threds` ( `threds_title`, `threds_desc`, `threds_cate_id`, `threds_user_id`, `timestamp`) VALUES ('$th_title' , '$th_desc', '$id', '$srn', current_timestamp());";
            $result = mysqli_query($conn,$sql);
            $showalert = true;
            if($showalert){
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Succes!</strong> Your thread has been added | Please waite for community respond.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }

    }
    ?>


    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-5">Wellcome to <?php echo $catname;?> Forums</h1>
            <p class="lead"><?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer Forum.
                No samp/Addvertising/self promoting in the other forums is not allowed.
                Do not post copyright-infringing material.Do not post "offinsive" posts,links or images.
                doo not cross post Quetations.Do not PM usre Asking for helps.Remain respectful of other members at all
                time.
            </p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'<div class="container">
        <h3>Start a Discussion</h3>
        <form action=" '.$_SERVER['REQUEST_URI'].'"method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and cresp as
                    possible</small></div>
                <input type="hidden" name="srn" value ="'.$_SESSION['srn'].'">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ellaborate your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
 }else{
    
    echo '<div class ="container bg-dark text-light"><p class="lead">You are not Logged in. Login to be able to start a Discussion</p></div>';
 }
?>

    <div class="container my-3">
        <h3>Browse Questions</h3>
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threds` WHERE threds_cate_id =$id";
            $result = mysqli_query($conn,$sql);
            $noresult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                    $noresult = false;
                    $title = $row['threds_title'];
                    $th_id=$row['threds_id'];
                    $desc = $row['threds_desc']; 
                    $time =$row['timestamp'];
                    $thredid= $row['threds_user_id'];

                    $sql2 ="SELECT * FROM `user` where srn ='$thredid';";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 =  mysqli_fetch_assoc($result2); 
                   
            echo '<div class="media my-5">
                    <img src="image 10.jpg"  width="54px" class="mr-3 " alt="...">
                    <div class="media-body">'.
                        '<h5 class="mt-0 "><a class="text-dark" href="thread.php?threadid='.$th_id.'">'.$title.'</a></h5>'.$desc.'
                         <p class = "font-weight-bold my-0"> '.$row2['user_email'].'At '.$time.'</p>
                    </div>
                </div>';   
        }
        // echo var_dump($noresult); 
        if($noresult){      
            echo ' <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-5"> No Threads Found</p>
                        <p class="lead"> <b>Be the first person to ask Questions</b></p>
                    </div>
                    </div>';
        }
        ?>





        <!-- <div class="media">
            <img src="image 10.jpg"  width="54px" class="mr-3 " alt="...">
            <div class="media-body">
                <h5 class="mt-0">unable to install pyaudio in windows</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> -->
    </div>



    <?php include 'footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>