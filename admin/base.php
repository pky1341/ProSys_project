<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      padding-top: 56px;
    }

    @media (max-width: 767px) {
      body {
        padding-top: 0;
      }
    }
  </style>
  <title>Admin Dashboard </title>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/admin/dashboard.php">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/admin/dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin/dashboard.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Downline</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Recharge</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Transaction</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Forms report
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/loanData.php">Loan</a>
          <a class="dropdown-item" href="/admin/healthData.php">Health</a>
          <a class="dropdown-item" href="/admin/careerData.php">career</a>
          <a class="dropdown-item" href="/admin/tutionData.php">Tution</a>
        </div>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Bootstrap JS and jQuery (required for Bootstrap components) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
