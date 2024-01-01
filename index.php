<?php
session_start();
if($_SESSION['loggedIn']==false || !isset($_SESSION['loggedIn'])){
    header('Location:login.php');
    exit();
}
?>

<?php
include "database.php";

$sql="SELECT * FROM users WHERE contact='{$_SESSION['contact']}'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
session_start();
$_SESSION['name']=$row['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User DashBoard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><?php echo $_SESSION['name']; ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Dashboard</a></li>
        <li><a href="career.php">Career</a></li>
        <li><a href="health.php">Health</a></li>
        <li><a href="tution.php">Tution</a></li>
        <li><a href="loan.php">Loan</a></li>
        <li><a href="#">About</a></li>
        <li><a href="logout.php" onclick="confirmDelete(event)">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2><?php echo $_SESSION['name']; ?></h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="career.php">Career</a></li>
        <li><a href="health.php">Health</a></li>
        <li><a href="tution.php">Tution</a></li>
        <li><a href="loan.php">Loan</a></li>
        <li><a href="#">About</a></li>
        <li><a href="logout.php" onclick="confirmDelete(event)">Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Dashboard</h4>
        <p>Some text..</p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Users</h4>
            <p>1 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Pages</h4>
            <p>100 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Sessions</h4>
            <p>10 Million</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function confirmDelete(event) {
        event.preventDefault(); 
        
        var confirmation = confirm("Are you sure you want to Logout this Panel?");
        
        if (confirmation) {
            $.ajax({
                url: event.target.href,
                method: "DELETE",
                data: {_token: "{{ csrf_token() }}"}, 
                success: function(response) {
                    alert("Logout successfully");
                    location.reload();
                },
                error: function(error) {
                    alert("Logout successfully");
                    location.reload();
                }
            });
        } else {
            alert("Logout canceled");
        }
    }
</script> 
</body>
</html>
