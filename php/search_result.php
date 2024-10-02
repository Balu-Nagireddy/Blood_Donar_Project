<?php
$servername = "localhost";
$username = "root";
$password = "Rgukt143";
$dbname = "Blood_Donating_App";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$location = $_POST['location'];
$bloodType = $_POST['blood_group'];
$urgency = $_POST['urgency'];

$sql = "SELECT * FROM Users WHERE location = ? AND blood_group = ? LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $location, $bloodType);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Blood Donation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
        }

        .card-body {
            background-color: #ffffff;
        }

        .donor-details {
            font-size: 0.9rem;
            margin-top: 10px;
        }

        .btn-view-details {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-view-details:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .no-results {
            text-align: center;
            font-size: 1.5rem;
            margin-top: 50px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Search Results</h2>

    <?php if ($result->num_rows > 0): ?>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/donor.jpg" class="card-img-top" alt="Donor Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['firstname']) . ' ' . htmlspecialchars($row['lastname']); ?></h5>
                            <div class="donor-details">
                                <p><strong>Blood Type:</strong> <?php echo htmlspecialchars($row['blood_group']); ?></p>
                                <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                                <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
                            </div>
                            <a href="#" class="btn btn-view-details" data-toggle="modal" data-target="#donorModal<?php echo $row['id']; ?>">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Modal for Donor Details -->
                <div class="modal fade" id="donorModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="donorModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="donorModalLabel">Donor Details - <?php echo htmlspecialchars($row['firstname']) . ' ' . htmlspecialchars($row['lastname']); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Blood Type:</strong> <?php echo htmlspecialchars($row['blood_group']); ?></p>
                                <p><strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                                <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></p>
                                <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                                <p><strong>Donation History:</strong> 5 donations</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="no-results">
            <p>No donors found matching your search criteria.</p>
        </div>
    <?php endif; ?>

    <?php
    $stmt->close();
    $conn->close();
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
