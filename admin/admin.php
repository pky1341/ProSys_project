<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #43A047;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }

    .form .register-form {
        display: none;
    }

    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }

    .container:before,
    .container:after {
        content: "";
        display: block;
        clear: both;
    }

    .container .info {
        margin: 50px auto;
        text-align: center;
    }

    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }

    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }

    .container .info span a {
        color: #000000;
        text-decoration: none;
    }

    .container .info span .fa {
        color: #EF3B3A;
    }

    body {
        background: #76b852;
        /* fallback for old browsers */
        background: rgb(141, 194, 111);
        background: linear-gradient(90deg, rgba(141, 194, 111, 1) 0%, rgba(118, 184, 82, 1) 50%);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    </style>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" placeholder="Enter a Username" name="username" required />
                <input type="password" placeholder="password" name="password" required />
                <input type="email" placeholder="email address" name="email" required />
                <button type="submit" name="create" id="create">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" placeholder="username" name="login_username" required />
                <input type="password" placeholder="password" name="login_passwd" required />
                <button type="submit" name="login" id="login">login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"
        integrity="sha512-egJ/Y+22P9NQ9aIyVCh0VCOsfydyn8eNmqBy+y2CnJG+fpRIxXMS6jbWP8tVKp0jp+NO5n8WtMUAnNnGoJKi4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $('.message a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "slow");
    });
    </script>
</body>
</html>
<?php
include "config.php";

if (isset($_POST['create']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "SELECT * FROM adminUsers WHERE username='$username'";
    $result = $conn->query($sql);
    if (empty($username) || empty($password) || empty($email)) {
        echo '<script> window.alert("all fields are required"); </script>';
    } elseif (strlen($username) < 3 || strlen($username) > 20) {
        echo '<script>window.alert("Name should be between 3 and 20 characters.");</script>';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        echo '<script>window.alert("Username should start with a letter and can contain letters, numbers, and underscores.");</script>';
    } elseif ($result->num_rows > 0) {
        echo '<script>window.alert("Username already exists. Choose a different one.");</script>';
    } elseif (strlen($password) < 8) {
        echo '<script>window.alert("Password should be at least 8 characters.");</script>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>window.alert("Invalid email format.");</script>';
    } elseif (!checkdnsrr(explode('@', $email)[1], 'MX')) {
        echo '<script>window.alert("Invalid email domain.");</script>';
    } else {
        // Insert user data into the database
        $insert_user = "INSERT INTO adminUsers (username, password, email) VALUES ('$username', '$password', '$email')";
        if ($conn->query($insert_user) === TRUE) {
            echo ' <script>alert("Admin created successfully");</script> ';
        } else {
            echo '<script>window.alert("Error: ' . $conn->error . '");</script>';
        }
    }
}
// User login
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['login_username']);
    $password = $_POST['login_passwd'];
    // Check if the username exists
    $check_user = "SELECT * FROM adminUsers WHERE username='$username'";
    $result = $conn->query($check_user);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if ($password == $row['password'] && $username == $row['username']) {
            echo '<script>window.alert("Login successful")</script>';
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $row['username'];
            echo '<script> window.location.href="http://localhost:8000/admin/dashboard.php"; </script>';
        } else {
            echo '<script> window.alert("Invalid Credentials!!!");</script>';
        }
    } else {
        echo '<script> window.alert("User not found. Please check your username.");</script>';
    }
}
?>