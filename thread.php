<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
  #ques{
    min-height:433px;
  }
</style>
    <title>iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id='$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['thread_title'];
        $catdesc = $row['thread_thread_desc'];
        // $catname = $row['category_name'];
    }
    ?>


    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">
                <?php echo $catname; ?> 
            </h1>
            <p class="lead">
                <?php echo $catdesc; ?>
            </p>
            <hr class="my-4">
            <p>This is a perr to perr forum for sharing knowledge with each other</p>
            <p class="text-left">
               <b> Posted by: Sourabh</b>
            </p>
        </div>
    </div>

    <div class="container" id="ques">
        <h1 class="py-2">Discussion</h1>
        <!-- <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $id = $row['thread_id'];
       
       echo  '<div class="media my-3">
            <img width="34px" class="mr-3"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhAsS7pPgOMBFZTSBDiUVQ4DAYoAD0M-6q7BuPr6z0gKItbESyEMQmUm5qmWiU9SR1kCc&usqp=CAU"
                alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0"><a href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
                '.$desc.'
            </div>
        </div>
        <hr>';
    }
    ?> -->
       
    </div>
    <?php include 'partials/_footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>