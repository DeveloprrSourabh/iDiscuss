<?php
session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Categories          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown"></div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" >Contact</a>
        </li>
      </ul>
      <div class="row mx-2">';

      if (isset($_SESSION['loggedin']) && isset($_SESSION['loggedin']) == true) {
 
        echo '<form class=" col d-flex align-items-center">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
    <p class=" text-light mx-3 my-0"> welcome ' .$_SESSION['useremail'] . '</p>
    <a href="partials/_logout.php" class="ml-2 btn btn-outline-danger">Logout</a>
    </form>';
       } else{
        echo '  <div class="col my-2 d-flex">
        <button class="ml-2 btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="mx-2 btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
     </div>';
       }
      

     echo  '</div>
     
    </div>
  </div>
</nav>
';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']== "true") {
  echo '<div class=" my-0 alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>