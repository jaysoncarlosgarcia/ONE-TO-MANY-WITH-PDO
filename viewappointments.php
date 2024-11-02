<?php 
require_once 'core/models.php';
require_once 'core/dbConfig.php';

$petID = $_GET['PetID'];
$petDetails = getPetByID($pdo, $petID);
$petName = $petDetails['petName'];
$OwnerID = getOwnerIDByPetID($pdo, $petID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="viewpets.php?OwnerID=<?php echo htmlspecialchars($OwnerID); ?>">Return to Pets</a>

    <h1>Add a New Appointment for <?php echo htmlspecialchars($petName); ?></h1>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="PetID" value="<?php echo htmlspecialchars($petID); ?>">
        <p>
            <label for="appointmentDate">Date:</label>
            <input type="date" name="appointmentDate" required>
        </p>
        <p>
            <label for="appointmentTime">Time:</label>
            <input type="time" name="appointmentTime" required>
        </p>
        <p>
            <label for="description">Description:</label>
            <input type="text" name="description" required>
        </p>
        <p>
            <label for="status">Status:</label>
            <input type="text" name="status" required>
        </p>
        <input type="submit" name="addAppointmentBtn" value="Add Appointment">
    </form>
    <h1>Appointments for <?php echo htmlspecialchars($petName); ?></h1>
    <table style="width:100%; margin-top: 20px; border-collapse: collapse;">
        <tr>
            <th>Appointment ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php 
            $appointments = getAppointmentsByPetID($pdo, $petID);
            foreach ($appointments as $appointment) {
        ?>
        <tr>
            <td><?php echo htmlspecialchars($appointment['AppointmentID']); ?></td>
            <td><?php echo htmlspecialchars($appointment['AppointmentDate']); ?></td>
            <td><?php echo htmlspecialchars($appointment['AppointmentTime']); ?></td>
            <td><?php echo htmlspecialchars($appointment['Description']); ?></td>
            <td><?php echo htmlspecialchars($appointment['Status']); ?></td>
            <td>
                <a href="editappointment.php?AppointmentID=<?php echo $appointment['AppointmentID']; ?>&PetID=<?php echo $petID; ?>">Edit</a>
                <a href="deleteappointment.php?AppointmentID=<?php echo $appointment['AppointmentID']; ?>&PetID=<?php echo $petID; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
