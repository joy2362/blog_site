<?php
  include_once 'users.php';
  include_once 'session.php';
  $user = new User();
  Session::init();
  $id=Session::get("id");
  if ($id ==0) {
    header('location:index.html');
  }else{
    $admin=$user->view($id);
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin.php">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link" href="addcategory.php">Add Category</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="addPost.php">Add Post</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="viewcategory.php">All category</a>
      </li>
      <li class="nav-item ml-5">
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $admin['username']?></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#">Update profile</a>
          <a class="dropdown-item" href="users.php?action=logout">logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>