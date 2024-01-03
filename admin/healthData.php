<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Data</title>
</head>
<body>
<div class="container-fluid">
      <?php require 'base.php' ?>
      
    <h2>Health List</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Date Of Birth</th>
          <th>Address</th>
          <th>Aadhar Number</th> 
          <th>Occupation</th>
          <th>Gender</th>
          <th>Disability</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("config.php");
        $sql="SELECT * FROM health_details";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['id'];  ?></td>
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['phone'];  ?></td>
          <td><?php echo $row['dob'];  ?></td>
          <td><?php echo $row['address'];  ?></td>
          <td><?php echo $row['aadhar_no'];  ?></td>
          <td><?php echo $row['occupation'];  ?></td>
          <td><?php echo $row['gender'];  ?></td>
          <td><?php echo $row['disability'];  ?></td>
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