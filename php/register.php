<?php
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

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password for security
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];
    $location = $_POST['location'];  // Add location from the form
    $phone_number = $_POST['phone_number'];

    // Prepare SQL to insert the user data, including the location field
    $sql = "INSERT INTO Users (username, firstname, lastname, email, password, dob, blood_group, location ,phone_number) 
            VALUES (:username, :firstname, :lastname, :email, :password, :dob, :blood_group, :location, :phone_number)";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters to the SQL statement
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':blood_group', $blood_group);
    $stmt->bindParam(':location', $location);  // Bind location parameter
    $stmt->bindParam(':phone_number', $phone_number);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the given URL (http://localhost:8000/login.html) after successful registration
        header("Location: http://localhost:8000/login.html");
        exit();
    } else {
        echo "Error: Could not register the user.";
    }
}
?>
