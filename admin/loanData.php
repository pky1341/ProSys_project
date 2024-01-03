<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Data</title>
</head>
<body>
    <div class="container-fluid">
      <?php require 'base.php' ?>
      
    <h2>Loan List</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>MemberShip ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>District</th> 
          <th>Tehsil</th>
          <th>Village</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("config.php");
        $sql="SELECT * FROM loan_applications";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['id'];  ?></td>
          <td><?php echo $row['memberId'];  ?></td>
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['contact'];  ?></td>
          <td><?php echo $row['address'];  ?></td>
          <td><?php echo $row['district'];  ?></td>
          <td><?php echo $row['tehsil'];  ?></td>
          <td><?php echo $row['village'];  ?></td>
          <td><?php echo $row['amount'];  ?></td>
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