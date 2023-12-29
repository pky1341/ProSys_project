<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="flex flex-col items-center justify-center h-screen dark">
    <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-md p-6">
      <h2 class="text-2xl font-bold text-gray-200 mb-4">Health Information Form</h2>

      <form class="flex flex-col" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
        <input placeholder="Name" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" type="text" name="name" id="name" required>
        <input placeholder="Mobile Number" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" type="text" name="phone" id="phone" required>
        <input placeholder="Date of Birth" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" type="date" name="dob" id="dob" required>
        <select placeholder="Gender" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" name="gender" id="gender" required>
          <option value="" disabled selected>Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        <textarea placeholder="Address" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" name="addr" id="addr" required></textarea>
        <input placeholder="Aadhar Card Number" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" type="number" name="aadhar_no" id="aadhar_no" required>
        <input placeholder="Upload Aadhar Card" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" type="file" name="upload_aadhar" id="upload_aadhar" required>
        <select placeholder="Disability" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" name="dis" id="dis" required>
          <option value="" disabled selected>Select Disability Status</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        <input placeholder="Occupation" class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" type="text" name="occu" id="occu" required>

        <button class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150" type="submit" name="button" value="Submit">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>
<?php
include "database.php";



if($_SERVER['REQUEST_METHOD']=='POST'){

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["upload_aadhar"]["name"]);
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $allowedFileTypes = array("jpg", "jpeg", "png", "gif");

   $name=trim($_POST['name']);
   $phone=$_POST['phone'];
   $dob=$_POST['dob'];
   $addr=trim($_POST['addr']);
   $aadhar_no=$_POST['aadhar_no'];
   $occu=trim($_POST['occu']);
   $gender=$_POST['gender'];
   $dis=$_POST['dis'];
   $uploadFile=$_FILES["upload_aadhar"]["tmp_name"];

   if (empty($name) || empty($phone) || empty($dob) || empty($addr) || empty($aadhar_no) ||  empty($occu) || empty($dis) || empty($gender) || empty($uploadFile)) {
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
    elseif (strlen($occu) < 5 || strlen($occu) > 50) {
        echo '<script>window.alert("Occupation should be between 5 and 50 characters.");</script>';
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/",$occu)){
      echo '<script>window.alert("Occupation should contain only letters and spaces.");</script>';
    }
    elseif (!preg_match("/^[0-9]{12}$/", $aadhar_no)) {
    echo '<script>window.alert("Invalid Aadhar number. It should be a 12-digit numeric value.");</script>';
    }
    elseif (!in_array($fileType, $allowedFileTypes)) {
    echo '<script>window.alert("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");</script>';
    }
    elseif(file_exists($target_file)){
      echo '<script>window.alert("Sorry, file already exists.");</script>';
    }
    else{
      $insertQuery = "INSERT INTO health_details (name, phone, dob, address, aadhar_no, occupation, gender, disability, upload_file_path)
      VALUES ('$name', '$phone', '$dob', '$addr', '$aadhar_no', '$occu', '$gender', '$dis', '$target_file')";
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