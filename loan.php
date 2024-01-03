<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Loan page</title>
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>

<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
      <div class="relative px-4 py-10 bg-red-100 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
        <h2 class="text-2xl font-medium text-gray-600 title-font mb-2">Loan Form</h2>
        <div class="max-w-md mx-auto text-white">
          <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="memberId">MemberShip
                Id</label>
              <input
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                type="number" id="memberId" name="memberId" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="name">Name</label>
              <input
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                type="text" id="name" name="name" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="phone">Mobile No</label>
              <input
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                type="tel" id="phone" name="phone" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="addr">Address</label>
              <textarea rows="1" cols="50"
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                type="text" id="addr" name="addr" required /></textarea>
            </div>
          </div>
          <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="dist">District</label>
              <input
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                type="text" id="dist" name="dist" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="tehsil">Tehsil</label>
              <input
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500
                type="text" id="tehsil" name="tehsil" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="village">Village</label>
              <input
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                type="text" id="village" name="village" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="amount">Apply Loan
                Amount</label>
              <input
                class="border border-red-400 rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full bg-red-100 text-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                placeholder="(in lach)" type="number" id="amount" name="amount" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="aadhar">Upload
                Aadhar:</label>
              <input accept=".jpg, .jpeg, .png, .gif, .pdf"
                class="p-3 mb-6 border-none bg-blue-500 rounded-md w-full cursor-pointer transition duration-300 hover:bg-blue-700"
                name="aadhar" id="aadhar" type="file" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="pan">Upload PAN:</label>
              <input accept=".jpg, .jpeg, .png, .gif, .pdf"
                class="p-3 mb-6 border-none bg-blue-500 rounded-md w-full cursor-pointer transition duration-300 hover:bg-blue-700"
                name="pan" id="pan" type="file" required />
            </div>
            <div>
              <label class="font-semibold text-sm text-gray-400 pb-1 block" for="bank">Upload
                Bank:</label>
              <input accept=".jpg, .jpeg, .png, .gif, .pdf"
                class="p-3 mb-6 border-none bg-blue-500 rounded-md w-full cursor-pointer transition duration-300 hover:bg-blue-700"
                name="bank" id="bank" type="file" required />
            </div>
          </div>
          <div class="mt-5">
            <button
              class="py-2 px-4 bg-red-400 hover:bg-red-400 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
              type="submit">
              Submit
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>

</html>

<?php
include "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $target_aadhar = "loan/aadhar/";
  $aadhar_file = $target_aadhar . basename($_FILES["aadhar"]["name"]);
  $aadahrFileType = strtolower(pathinfo($aadhar_file, PATHINFO_EXTENSION));
  $target_pan = "loan/pan/";
  $pan_file = $target_pan . basename($_FILES["pan"]["name"]);
  $panFileType = strtolower(pathinfo($pan_file, PATHINFO_EXTENSION));
  $target_bank = "loan/bank/";
  $bank_file = $target_bank . basename($_FILES["bank"]["name"]);
  $bankFileType = strtolower(pathinfo($bank_file, PATHINFO_EXTENSION));
  $allowedFileTypes = array("jpg", "jpeg", "png", "gif");

  $memberId = $_POST['memberId'];
  $name = trim($_POST['name']);
  $contact = $_POST['phone'];
  $addr = trim($_POST['addr']);
  $dist = trim($_POST['dist']);
  $tehsil = trim($_POST['tehsil']);
  $village = trim($_POST['village']);
  $amount = $_POST['amount'];
  $aadharFile = $_FILES['aadhar']['tmp_name'];
  $panFile = $_FILES['pan']['tmp_name'];
  $bankFile = $_FILES['bank']['tmp_name'];
  if (empty($memberId) || empty($name) || empty($contact) || empty($addr) || empty($dist) || empty($tehsil) || empty($village) || empty($amount) || empty($aadharFile) || empty($panFile) || empty($bankFile)) {
    echo '<script>window.alert("All fields are required.");</script>';
  } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    echo '<script>window.alert("Name should contain only letters and spaces.");</script>';
  } elseif (strlen($name) < 2 || strlen($name) > 25) {
    echo '<script>window.alert("Name should be between 2 and 25 characters.");</script>';
  } elseif (!preg_match("/^[0-9]+$/", $contact)) {
    echo '<script>window.alert("Invalid characters in the contact number. Only numeric values are allowed.");</script>';
  } elseif (strlen($contact) != 10) {
    echo '<script>window.alert("Contact number should be exactly 10 digits.");</script>';
  } elseif (strlen($addr) < 5 || strlen($addr) > 150) {
    echo '<script>window.alert("Address should be between 5 and 150 characters.");</script>';
  } elseif (!preg_match("/^[A-Za-z0-9,.\s]+$/i", $addr)) {
    echo '<script>window.alert("address should contain only letters and spaces.");</script>';
  } elseif (strlen($dist) < 3 || strlen($dist) > 50) {
    echo '<script>window.alert("district should be between 3 and 50 characters.");</script>';
  } elseif (!preg_match("/^[A-Za-z0-9,.\s]+$/i", $dist)) {
    echo '<script>window.alert("district should contain only letters and spaces.");</script>';
  } elseif (strlen($tehsil) < 3 || strlen($tehsil) > 50) {
    echo '<script>window.alert("tehsil should be between 3 and 50 characters.");</script>';
  } elseif (!preg_match("/^[A-Za-z0-9,.\s]+$/i", $tehsil)) {
    echo '<script>window.alert("tehsil should contain only letters and spaces.");</script>';
  } elseif (strlen($village) < 3 || strlen($village) > 50) {
    echo '<script>window.alert("City should be between 3 and 50 characters.");</script>';
  } elseif (!preg_match("/^[A-Za-z0-9,.\s]+$/i", $village)) {
    echo '<script>window.alert("village should contain only letters and spaces.");</script>';
  } elseif (!in_array($aadahrFileType, $allowedFileTypes)) {
    echo '<script>window.alert("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");</script>';
  } elseif (!in_array($panFileType, $allowedFileTypes)) {
    echo '<script>window.alert("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");</script>';
  } elseif (!in_array($bankFileType, $allowedFileTypes)) {
    echo '<script>window.alert("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");</script>';
  } elseif (file_exists($target_file)) {
    echo '<script>window.alert("Sorry, file already exists.");</script>';
  } else {
    $insertQuery = "INSERT INTO loan_applications (
      memberId, name, contact, address, district, tehsil, village, amount,
      aadhar_file_path, pan_file_path, bank_file_path
  ) VALUES (
      '$memberId', '$name', '$contact', '$addr', '$dist', '$tehsil', '$village', '$amount',
      '$aadhar_file', '$pan_file', '$bank_file'
  )";
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