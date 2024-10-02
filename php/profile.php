<?php
// Start session
session_start();

// If user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Database configuration
$host = 'localhost';  // You don't need to specify the port in the host if it's the default MySQL port 3306
$dbname = 'Blood_Donating_App';
$username = 'root'; // MySQL database username
$password = 'Rgukt143'; // MySQL database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Fetch user details from the database
$user_query = "SELECT * FROM Users WHERE username = :username";
$stmt = $pdo->prepare($user_query);
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Error: Could not retrieve user details.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome, <?php echo htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']); ?>!</h1>

        <div class="mt-4">
            <h4>User Details:</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Username:</strong></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>First Name:</strong></td>
                        <td><?php echo htmlspecialchars($user['firstname']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Last Name:</strong></td>
                        <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Date of Birth:</strong></td>
                        <td><?php echo htmlspecialchars($user['dob']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Blood Group:</strong></td>
                        <td><?php echo htmlspecialchars($user['blood_group']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Location:</strong></td>
                        <td><?php echo htmlspecialchars($user['location']); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number:</strong></td>
                        <td><?php echo htmlspecialchars($user['phone_number']); ?></td>  <!-- Assuming the phone number is stored in the Users table -->
                    </tr>
                </tbody>
            </table>
        </div>

        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
