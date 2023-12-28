<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
      body{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }
      .form {
  background-color: #AFB3F9;
  display: block;
  padding: 1rem;
  max-width: 350px;
  border-radius: 0.5rem;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.form-title {
  font-size: 1.25rem;
  line-height: 1.75rem;
  font-weight: 600;
  text-align: center;
  color: #000;
}

.input-container {
  position: relative;
}

.input-container input, .form button {
  outline: none;
  border: 1px solid #e5e7eb;
  margin: 8px 0;
}

.input-container input {
  background-color: #fff;
  padding: 1rem;
  padding-right: 3rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  width: 300px;
  border-radius: 0.5rem;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.submit {
  display: block;
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  padding-left: 1.25rem;
  padding-right: 1.25rem;
  background-color: #4F46E5;
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 500;
  width: 100%;
  border-radius: 0.5rem;
  text-transform: uppercase;
}

.signup-link {
  color: #6B7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
  text-align: center;
}

.signup-link a {
  text-decoration: underline;
}
    </style>
  </head>
  <body>
    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
       <p class="form-title">Login to your account</p>
        <div class="input-container">
          <input type="Number" placeholder="Enter Registered Number" name="contact" id="contact">
          <span>
          </span>
      </div>
      <div class="input-container">
          <input type="password" placeholder="Enter password" id="passwd" name="passwd">
        </div>
         <input type="submit" class="submit" value="Login">
      <p class="signup-link">
        No account?
        <a href="register.php">Sign up</a>
      </p>
   </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php

include "database.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
  $contact=$_POST['contact'];
  $passwd=$_POST['passwd'];
  $sql="SELECT * FROM users WHERE contact='$contact'";
  $result=$conn->query($sql);
  if($result->num_rows > 0){
    echo '<script>window.alert("Login successful.");</script>';
        session_start();
        $_SESSION['loggedIn']=true;
        $_SESSION['contact']=$contact;
        header('Location:index.php');
  }
  else{
    echo '<script> window.alert("Invalid Credentials!!!");</script>';
  }
}
?>