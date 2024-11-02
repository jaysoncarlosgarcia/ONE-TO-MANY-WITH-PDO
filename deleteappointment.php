<?php 
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Appointment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $getAppointmentByID = getAppointmentByID($pdo, $_GET['AppointmentID']); ?>
    
    <h1>Are you sure you want to delete this Appointment?</h1>
    <div class="container">
        <h2>Pet Name: <?php echo htmlspecialchars($getAppointmentByID['petName']); ?></h2>
        <h2>Date: <?php echo htmlspecialchars($getAppointmentByID['AppointmentDate']); ?></h2>
        <h2>Time: <?php echo htmlspecialchars($getAppointmentByID['AppointmentTime']); ?></h2>
        <h2>Description: <?php echo htmlspecialchars($getAppointmentByID['Description']); ?></h2>
        <h2>Status: <?php echo htmlspecialchars($getAppointmentByID['Status']); ?></h2>

        <div class="deleteBtn">
            <form action="core/handleForms.php?AppointmentID=<?php echo $_GET['AppointmentID']; ?>&PetID=<?php echo $_GET['PetID']; ?>" method="POST">
                <input type="submit" name="deleteAppointmentBtn" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>
