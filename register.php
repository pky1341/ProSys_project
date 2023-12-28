<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
      body{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
      }
      .form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  padding: 20px;
  border-radius: 20px;
  position: relative;
  background-color: #1a1a1a;
  color: #fff;
  border: 1px solid #333;
}

.title {
  font-size: 28px;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
  color: #00bfff;
}

.title::before {
  width: 18px;
  height: 18px;
}

.title::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}

.title::before,
.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color: #00bfff;
}

.message, 
.signin {
  font-size: 14.5px;
  color: rgba(255, 255, 255, 0.7);
}

.signin {
  text-align: center;
}

.signin a:hover {
  text-decoration: underline royalblue;
}

.signin a {
  color: #00bfff;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  background-color: #333;
  color: #fff;
  width: 100%;
  padding: 20px 05px 05px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
}

.form label .input + span {
  color: rgba(255, 255, 255, 0.5);
  position: absolute;
  left: 10px;
  top: 0px;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 12.5px;
  font-size: 0.9em;
}

.form label .input:focus + span,
.form label .input:valid + span {
  color: #00bfff;
  top: 0px;
  font-size: 0.7em;
  font-weight: 600;
}

.input {
  font-size: medium;
}

.submit {
  border: none;
  outline: none;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
  background-color: #00bfff;
}

.submit:hover {
  background-color: #00bfff96;
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }

  to {
    transform: scale(1.8);
    opacity: 0;
  }
}
    </style>
  </head>
  <body>
    <form class="form" id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> ">
    <p class="title">Register </p>
    <p class="message">Signup now and get full access to our app. </p>
        <div class="flex">
        <label>
            
            <input class="input" type="text" required="true" name="name" id="name">
            <span>Name</span>
        </label>

        <label>
            <input class="input" type="number"  required="true" name="contact" id="contact">
            <span>Contact</span>
        </label>
    </div>  
            
    <label>
        <input class="input" type="email"  required="true" name="email" id="email">
        <span>Email</span>
    </label> 
    <label>
        <input class="input" type="text"  required="true" name="addr" id="addr">
        <span>Address</span>
    </label>
    <label>
        <input class="input" type="text" required="true" name="city" id="city">
        <span>City</span>
    </label>
    <label>
        <input class="input" type="password" required="true" name="passwd1" id="passwd1">
        <span>Password</span>
    </label>
    <label>
        <input class="input" type="password" name="passwd2" id="passwd2">
        <span>Confirm password</span>
    </label>
    <input class="submit" type="submit" value="Submit">
    <p class="signin">Already have an account ? <a href="login.php">Signin</a> </p>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
include "database.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
   $name=$_POST['name'];
   $contact=$_POST['contact'];
   $email=$_POST['email'];
   $addr=$_POST['addr'];
   $city=$_POST['city'];
   $passwd1=$_POST['passwd1'];
   $passwd2=$_POST['passwd2'];
   $name=trim($name);
   $addr=trim($addr);
   $city=trim($city);
   $sql1="SELECT * FROM users WHERE contact = '$contact'";
   $sql2 = "SELECT * FROM users WHERE email = '$email'";
   $result1=$conn->query($sql1);
   $result2= $conn->query($sql2);
   if (empty($name) || empty($contact) || empty($email) || empty($addr) || empty($city) || empty($passwd1) || empty($passwd2)) {
        echo '<script>window.alert("All fields are required.");</script>';
    } 
   elseif(!preg_match("/^[a-zA-Z ]+$/",$name))
   {
    echo '<script>window.alert("Name should contain only letters and spaces.");</script>';
   }
   elseif (strlen($name) < 2 || strlen($name) > 25) {
        echo '<script>window.alert("Name should be between 2 and 25 characters.");</script>';
    }
    elseif (!preg_match("/^[0-9]+$/", $contact)) {
        echo '<script>window.alert("Invalid characters in the contact number. Only numeric values are allowed.");</script>';
    }
    elseif (strlen($contact) != 10) {
        echo '<script>window.alert("Contact number should be exactly 10 digits.");</script>';
    }
    elseif ($result1->num_rows > 0) {
    echo '<script>window.alert("Contact number is already taken");</script>';
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>window.alert("Invalid email address format.");</script>';
    }
    elseif ($result2->num_rows > 0) {
    echo '<script>window.alert("Email is already taken");</script>';
    }
    elseif (strlen($addr) < 5 || strlen($addr) > 50) {
        echo '<script>window.alert("Address should be between 5 and 50 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$addr)){
      echo '<script>window.alert("address should contain only letters and spaces.");</script>';
    }
    elseif (strlen($city) < 3 || strlen($city) > 25) {
        echo '<script>window.alert("City should be between 3 and 25 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$city)){
      echo '<script>window.alert("City should contain only letters and spaces.");</script>';
    }
    elseif (strlen($passwd1) < 6) {
        echo '<script>window.alert("Password should be at least 6 characters long.");</script>';
    } 
    elseif ($passwd1 !== $passwd2) {
        echo '<script>window.alert("Passwords do not match.");</script>';
    }
    else{
      $insertQuery = "INSERT INTO users (name, contact, email, addr, city, password) VALUES ('$name', '$contact', '$email', '$addr', '$city', '$passwd1')";
      if ($conn->query($insertQuery) === TRUE) {
      echo '<script>
        window.alert("Registration successful.");
        window.location.href="http://localhost:8000/login.php";
        </script>';
      } else {
      echo '<script>window.alert("Error: ' . $conn->error . '");</script>';
      }
    }
}
?>