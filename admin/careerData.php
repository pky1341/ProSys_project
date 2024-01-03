<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Data</title>
</head>
<body>
<div class="container-fluid">
      <?php require 'base.php' ?>
      
    <h2>Career Data List</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Date Of Birth</th>
          <th>Address</th>
          <th>City</th> 
          <th>Country</th>
          <th>Education</th>
          <th>Occupation</th>
          <th>School Name</th>
          <th>school Address</th>
          <th>Medium Type</th>
          <th>Gender</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("config.php");
        $sql="SELECT * FROM user_data";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['id'];  ?></td>
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['phone'];  ?></td>
          <td><?php echo $row['dob'];  ?></td>
          <td><?php echo $row['address'];  ?></td>
          <td><?php echo $row['city'];  ?></td>
          <td><?php echo $row['country'];  ?></td>
          <td><?php echo $row['education'];  ?></td>
          <td><?php echo $row['occupation'];  ?></td>
          <td><?php echo $row['school_name'];  ?></td>
          <td><?php echo $row['school_address'];  ?></td>
          <td><?php echo $row['school_medium'];  ?></td>
          <td><?php echo $row['gender'];  ?></td>
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