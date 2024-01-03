<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tution Data</title>
</head>
<body>
<div class="container-fluid">
      <?php require 'base.php' ?>
      
    <h2>Tution Data List</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Date Of Birth</th>
          <th>Address</th>
          <th>Education</th> 
          <th>School Name</th>
          <th>Medium Type</th>
          <th>SubJect</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("config.php");
        $sql="SELECT * FROM tuition_details";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['id'];  ?></td>
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['phone'];  ?></td>
          <td><?php echo $row['dob'];  ?></td>
          <td><?php echo $row['address'];  ?></td>
          <td><?php echo $row['education'];  ?></td>
          <td><?php echo $row['school_name'];  ?></td>
          <td><?php echo $row['medium'];  ?></td>
          <td><?php echo $row['subject'];  ?></td>
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