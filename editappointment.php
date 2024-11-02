<?php 
require_once 'core/models.php'; 
require_once 'core/dbConfig.php'; 

$appointmentID = $_GET['AppointmentID']; 
$petID = $_GET['PetID']; 

$appointmentDetails = getAppointmentByID($pdo, $appointmentID);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    updateAppointment($pdo, $appointmentID, $appointmentDate, $appointmentTime, $description, $status);

    header("Location: viewappointments.php?PetID=$petID&OwnerID=" . $_GET['OwnerID']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="viewappointments.php?PetID=<?php echo $petID; ?>&OwnerID=<?php echo isset($_GET['OwnerID']) ? $_GET['OwnerID'] : ''; ?>">Return to Appointments</a>

    <h1>Edit Appointment for <?php echo htmlspecialchars($appointmentDetails['petName']); ?></h1>

    <form action="" method="POST">
        <p>
            <label for="appointmentDate">Date:</label>
            <input type="date" name="appointmentDate" value="<?php echo htmlspecialchars($appointmentDetails['AppointmentDate']); ?>" required>
        </p>
        <p>
            <label for="appointmentTime">Time:</label>
            <input type="time" name="appointmentTime" value="<?php echo htmlspecialchars($appointmentDetails['AppointmentTime']); ?>" required>
        </p>
        <p>
            <label for="description">Description:</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($appointmentDetails['Description']); ?>" required>
        </p>
        <p>
            <label for="status">Status:</label>
            <input type="text" name="status" value="<?php echo htmlspecialchars($appointmentDetails['Status']); ?>" required>
        </p>
        <input type="submit" value="Update Appointment">
    </form>
</body>
</html>
