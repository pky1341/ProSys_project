<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Career Form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
  .container {
  position: relative;
  max-width: 500px;
  width: 100%;
  background: #FCEDDA;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.container header {
  font-size: 1.2rem;
  color: #000;
  font-weight: 600;
  text-align: center;
}

.container .form {
  margin-top: 15px;
}

.form .input-box {
  width: 100%;
  margin-top: 10px;
}

.input-box label {
  color: #000;
}

.form :where(.input-box input, .select-box) {
  position: relative;
  height: 35px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #808080;
  margin-top: 5px;
  border: 1px solid #DF554E;
  border-radius: 6px;
  padding: 0 15px;
  background: #FCEDDA;
}

.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}

.form .column {
  display: flex;
  column-gap: 15px;
}

.form .gender-box {
  margin-top: 10px;
}

.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}

.form .gender {
  column-gap: 5px;
}

.gender input {
  accent-color: #EE4E34;
}

.form :where(.gender input, .gender label) {
  cursor: pointer;
}

.gender label {
  color: #000;
}

.address :where(input, .select-box) {
  margin-top: 10px;
}

.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #808080;
  font-size: 1rem;
  background: #FCEDDA;
}

.form button {
  height: 40px;
  width: 100%;
  color: #000;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 15px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.2s ease;
  background: #EF4F34;
}

.form button:hover {
  background: #EF4F34;
}
    </style>
  </head>
  <body>
    <section class="container">
  <header>Registration Form</header>
  <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
      <div class="input-box">
          <label>Full Name</label>
          <input required="true" placeholder="Enter full name" type="text" name="name" id="name">
      </div>
      <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input required="true" placeholder="Enter phone number" type="telephone" name="phone" id="phone">
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input required="true" placeholder="Enter birth date" type="date" name="dob" id="dob">
          </div>
      </div>
      <div class="input-box address">
        <label>Address</label>
        <input required="true" placeholder="Enter street address" type="text" id="addr" name="addr">
        <div class="column">
          <div class="select-box">
            <select id="country" name="country" required>
              <option value="" hidden="">Country</option>
              <option value="India">India</option>
              <option value="USA">USA</option>
              <option value="UK">UK</option>
              <option value="Germany">Germany</option>
              <option value="Japan">Japan</option>
            </select>
          </div>
        <input required="true" placeholder="Enter your city" type="text" name="city" id="city">
        </div>
      </div>
      <div class="column">
      <div class="input-box education-box">
          <label>Your Highest Education</label>
          <input required="true" placeholder="Enter your education level" type="text" name="education" id="education">
        </div>
        <div class="input-box occupation-box">
          <label>Occupation</label>
          <input required="true" placeholder="Enter your occupation" type="text" name="occupation" id="occupation">
        </div>
      </div>
        <div class="input-box school-box">
          <label>School/College Name</label>
          <input required="true" placeholder="Enter school/college name" type="text" name="sname" id="sname">
        </div>
        <div class="input-box address">
          <label>School/College Address</label>
          <input required="true" placeholder="Enter school/college address" type="text" name="saddr" id="saddr">
        </div>
        <div class="column">
          <div class="select-box">
            <select name="medium" id="medium" required>
              <option value="" hidden="">Medium</option>
              <option value="Marathi">Marathi</option>
              <option value="English">English</option>
              <option value="Hindi">Hindi</option>
            </select>
          </div>
          <div class="select-box">
            <select name="gender" id="gender" required>
              <option value="" hidden="">Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>
      <button type="submit" name="button" value="Submit">Submit</button>
  </form>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
include "database.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
   $name=trim($_POST['name']);
   $phone=$_POST['phone'];
   $dob=$_POST['dob'];
   $addr=trim($_POST['addr']);
   $city=trim($_POST['city']);
   $country=$_POST['country'];
   $edu=trim($_POST['education']);
   $occu=trim($_POST['occupation']);
   $s_name=trim($_POST['sname']);
   $s_addr=trim($_POST['saddr']);
   $medium=$_POST['medium'];
   $gender=$_POST['gender'];
   if (empty($name) || empty($phone) || empty($dob) || empty($addr) || empty($city) || empty($country) || empty($edu) || empty($occu) || empty($s_name) ||empty($s_addr) || empty($medium) || empty($gender)) {
        echo '<script>window.alert("All fields are required.");</script>';
    } 
   elseif(!preg_match("/^[a-zA-Z ]+$/",$name))
   {
    echo '<script>window.alert("Name should contain only letters and spaces.");</script>';
   }
   elseif (strlen($name) < 2 || strlen($name) > 25) {
        echo '<script>window.alert("Name should be between 2 and 25 characters.");</script>';
    }
    elseif (!preg_match("/^[0-9]+$/", $phone)) {
        echo '<script>window.alert("Invalid characters in the contact number. Only numeric values are allowed.");</script>';
    }
    elseif (strlen($phone) != 10) {
        echo '<script>window.alert("Contact number should be exactly 10 digits.");</script>';
    }
    elseif (strlen($addr) < 5 || strlen($addr) > 125) {
        echo '<script>window.alert("Address should be between 5 and 125 characters.");</script>';
    }
    elseif(!preg_match("/^[A-Za-z0-9,.\s]+$/i",$addr)){
      echo '<script>window.alert("address should contain only letters and spaces.");</script>';
    }
    elseif (strlen($city) < 3 || strlen($city) > 50) {
        echo '<script>window.alert("City should be between 3 and 50 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$city)){
      echo '<script>window.alert("City should contain only letters and spaces.");</script>';
    }
    elseif (strlen($edu) < 5 || strlen($edu) > 50) {
        echo '<script>window.alert("Education should be between 5 and 50 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$edu)){
      echo '<script>window.alert("Education should contain only letters and spaces.");</script>';
    }
    elseif (strlen($occu) < 5 || strlen($occu) > 50) {
        echo '<script>window.alert("Occupation should be between 5 and 50 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$occu)){
      echo '<script>window.alert("Occupation should contain only letters and spaces.");</script>';
    }
    elseif (strlen($s_name) < 5 || strlen($s_name) > 75) {
        echo '<script>window.alert("School/Collage Name should be between 5 and 75 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$s_name)){
      echo '<script>window.alert("School/Collage Name should contain only letters and spaces.");</script>';
    }
    elseif (strlen($s_addr) < 5 || strlen($s_addr) > 125) {
        echo '<script>window.alert("School/Collage Address should be between 5 and 125 characters.");</script>';
    }
    elseif(!preg_match("/^[A-Za-z0-9,.\s]+$/i",$s_addr)){
      echo '<script>window.alert("School/Collage Address should contain only letters and spaces.");</script>';
    }
    else{
      $insertQuery = "INSERT INTO user_data (name, phone, dob, address, city, country, education, occupation, school_name, school_address, school_medium, gender)
    VALUES ('$name', '$phone', '$dob', '$addr', '$city', '$country', '$edu', '$occu', '$s_name', '$s_addr', '$medium', '$gender')";
      if ($conn->query($insertQuery) === TRUE) {
      echo '<script>
        window.alert("Registration successful.");
        window.location.href="http://localhost:8000/index.php";
        </script>';
      } else {
      echo '<script>window.alert("Error: ' . $conn->error . '");</script>';
      }
    }
}
  ?>