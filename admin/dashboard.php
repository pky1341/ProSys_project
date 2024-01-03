<?php
if (!isset($_SESSION["username"]) || $_SESSION["loggedIn"]==false) {
    session_start();
    ?>
    <script>
      window.location.href="http://localhost:8000/admin/admin.php";
    </script>
    <?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard </title>
</head>
<body>
<div class="container-fluid mt-4">
  <!-- Navbar -->
  <?php 
  require 'base.php'; 
  ?>

  <!-- Content -->
  
    <h2>Users List</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Contact</th>
          <th>Address</th>
          <th>City</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("config.php");
        $sql="SELECT * FROM users";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['id'];  ?></td>
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['email'];  ?></td>
          <td><?php echo $row['password'];  ?></td>
          <td><?php echo $row['contact'];  ?></td>
          <td><?php echo $row['addr'];  ?></td>
          <td><?php echo $row['city'];  ?></td>
        </tr>
        <?php 
        }
        ?>
        <!-- Add more user rows as needed -->
      </tbody>
    </table>
  </div>


</body>
</html>
