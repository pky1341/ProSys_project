<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tuition Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="flex flex-col items-center justify-center h-screen dark">
    <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-6">
      <h2 class="text-2xl font-bold text-gray-200 mb-4">Tuition Form</h2>

      <form class="flex flex-wrap" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
          placeholder="Full Name"
          name="name"
        />
        <input
          type="tel"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
          placeholder="Mobile Number"
          name="phone"
        />
        <input
          type="date"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
          placeholder="Date of Birth"
          name="dob"
        />
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
          placeholder="Address"
          name="addr"
        />
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
          placeholder="Education"
          name="education"
        />
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
          placeholder="School Name"
          name="s_name"
        />
        <select
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
        name="medium">
          <option value="" disabled selected>Select School Medium</option>
          <option value="hindi">Hindi</option>
          <option value="english">English/CBSE</option>
          <option value="marathi">Marathi/ICSE</option>
        </select>
        <input
          type="text"
          class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full"
          placeholder="Subject like ,English,Hindi,Math"
          name="subject"
        />
        <button
          type="submit"
          class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150"
          name="submit"
          value="submit"
        >
          Submit
        </button>
      </form>
    </div>
  </div>
</body>
</html>
<?php
include "database.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
   $name=trim($_POST['name']);
   $phone=$_POST['phone'];
   $dob=$_POST['dob'];
   $addr=trim($_POST['addr']);
   $edu=trim($_POST['education']);
   $s_name=trim($_POST['s_name']);
   $medium=$_POST['medium'];
   $subject=trim($_POST['subject']);
   if (empty($name) || empty($phone) || empty($dob) || empty($addr) || empty($edu) || empty($s_name) || empty($medium) || empty($subject)) {
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
    elseif (strlen($edu) < 5 || strlen($edu) > 50) {
        echo '<script>window.alert("Education should be between 5 and 50 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$edu)){
      echo '<script>window.alert("Education should contain only letters and spaces.");</script>';
    }
    elseif (strlen($s_name) < 5 || strlen($s_name) > 75) {
        echo '<script>window.alert("School/Collage Name should be between 5 and 75 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$s_name)){
      echo '<script>window.alert("School/Collage Name should contain only letters and spaces.");</script>';
    }
    elseif (strlen($subject) < 3 || strlen($subject) > 75) {
        echo '<script>window.alert("subject should be between 3 and 75 characters.");</script>';
    }
    elseif(!preg_match("/^[A-Za-z0-9,.\s]+$/i",$subject)){
      echo '<script>window.alert("subject should contain only letters and spaces.");</script>';
    }
    else{
      $insertQuery = "INSERT INTO tuition_details (name, phone, dob, address, education,  school_name, medium, subject)
      VALUES ('$name', '$phone', '$dob', '$addr', '$edu', '$s_name', '$medium', '$subject')";
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