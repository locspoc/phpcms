<?php

  if(isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";

    $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    echo "User Created: " . " " . "<a href='users.php'>View Users</a>";

  }

?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
  
  <label for="user_firstname">Firstname</label>

    <input type="text" class="form-control" name="user_firstname">

</div>

<div class="form-group">

  <label for="user_lastname">Lastname</label>

    <input type="text" class="form-control" name="user_lastname">

</div>

<div class="form-group">

  <select name="user_role" id="user_role">

    <option value="subscriber">Select Option</option>

    <option value="admin">Admin</option>

    <option value="subscriber">Subscriber</option>

  </select>

</div>

  <!-- <div class="form-group">
  
    <label for="post_image">Post Image</label>

      <input type="file" class="form-control" name="post_image">
  
  </div> -->

  <div class="form-group">
  
    <label for="username">Username</label>

      <input type="text" class="form-control" name="username">
  
  </div>

  <div class="form-group">
  
    <label for="user_email">Email</label>

    <input type="text" class="form-control" name="user_email">
  
  </div>

  <div class="form-group">
  
  <label for="user_password">Password</label>

<input type="password" class="form-control" name="user_password">
  
  </div>

  <div class="form-group">

<input class="btn btn-primary" type="submit" name="create_user" value="Add User">
  
  </div>

</form>