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
    

    <!-- search result -->



    

    <div class="container my-3 mx-20">
        <h1 class="px-10">Search Result for <em>"<?php echo $_GET['search']?>"</em></h1>

        <?php
        $noresult = true;
        $query = $_GET['search'];
         $sql = "SELECT * FROM `threds` WHERE MATCH(threds_title,threds_desc) against ('$query')";
         $result = mysqli_query($conn,$sql);
         while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
             $title = $row['threds_title'];
             $desc = $row['threds_desc'];  
             $thred_id = $row['threds_id'];
              $url = "thread.php?threadid=".$thred_id;

             echo '<div class="result">
            <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
            <p>'.$desc.'</p>
            </div>';

         } 

         if($noresult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-5"> No Resut Found</p>
                        <p class="lead"> <b>Suggestions:</b>
                         Make sure that all words are spelled correctly.
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            <li>Try fewer keywords.</p></li>
                  </div>
                  </div>';
         }
        ?>
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