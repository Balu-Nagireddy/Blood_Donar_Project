<?php
// Database configuration
$host = 'localhost';
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

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL to select the user
    $sql = "SELECT * FROM Users WHERE username = :username";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':username', $username);

    // Execute the query
    $stmt->execute();

    // Fetch the user data
    $user = $stmt->fetch();

    // Verify if the user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Start a session and save user data
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];

        // Redirect to a dashboard or profile page after successful login
        header("Location: profile.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
