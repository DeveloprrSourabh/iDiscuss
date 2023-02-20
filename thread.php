<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
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
        $catdesc = $row['thread_desc'];
        // $catname = $row['category_name'];
    }
    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //Insert into comment db
        $comment = $_POST['comment'];
        $sno =$_POST["sno"];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your comment has been added!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    ';
        }


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
    
    <?php
    if (isset($_SESSION['loggedin']) && isset($_SESSION['loggedin']) == true) {
        echo '
    <div class="container">
    <h1 class="py-2">Post a Comment</h1>
    <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Type your comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <input type="hidden" name="sno" value="'.$_SESSION["sno"].'>
        </div>
        
        <button class="btn btn-primary"  type="submit"></button>
        <button class="btn btn-primary my-2" type="submit">Post Comment</button>
    </form>
</div>';
    } else {
        echo '
    <div class="container">
    <p class="py-2 px-3 bg-danger text-light font-weight-bold lead">!!! You are not logged in! Please login to be able to post comments !!!</p>
</div>
    ';
    }
    ?>
    <div class="container" id="ques">
        <h1 class="py-2">Discussion</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $thread_user_id = $row['comment_by'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno = '$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo '<div class="media my-3">
            <img width="34px" class="mr-3"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhAsS7pPgOMBFZTSBDiUVQ4DAYoAD0M-6q7BuPr6z0gKItbESyEMQmUm5qmWiU9SR1kCc&usqp=CAU"
                alt="Generic placeholder image">
            <div class="media-body">
            <p class="font-weight-bold my-0"> '.$row2['user_email'].' at ' . $comment_time . ' </p>
                ' . $content . '
            </div>
        </div>
        <hr>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Threads Found</p>
      <p class="lead"><b>Be the first person to ask a question</b></p>
    </div>
  </div>';
        }
        ?>


    </div>
    <?php include 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>