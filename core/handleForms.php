<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertOwnerBtn'])) {
    $query = insertOwner($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['dateOfBirth'], $_POST['phoneNumber'], $_POST['Email']);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Owner insertion failed";
    }
}

if (isset($_POST['editOwnerBtn'])) {
    $query = updateOwner($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['dateOfBirth'], $_POST['phoneNumber'], $_POST['Email'], $_GET['OwnerID']);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Owner edit failed";
    }
}

if (isset($_POST['deleteOwnerBtn'])) {
    $query = deleteOwner($pdo, $_GET['OwnerID']);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Owner deletion failed";
    }
}

if (isset($_POST['insertPetBtn'])) {
    $query = insertPet($pdo, $_POST['petName'], $_POST['species'], $_POST['breed'], $_POST['dateOfBirth'], $_POST['gender'], $_GET['OwnerID']);

    if ($query) {
        header("Location: ../viewpets.php?OwnerID=" . $_GET['OwnerID']);
    } else {
        echo "Pet insertion failed";
    }
}

if (isset($_POST['editPetBtn'])) {
    $query = updatePet($pdo, $_POST['petName'], $_POST['species'], $_POST['breed'], $_POST['dateOfBirth'], $_POST['gender'], $_GET['PetID']);

    if ($query) {
        header("Location: ../viewpets.php?OwnerID=" . $_GET['OwnerID']);
    } else {
        echo "Pet update failed";
    }
}

if (isset($_POST['deletePetBtn'])) {
    $query = deletePet($pdo, $_GET['PetID']);

    if ($query) {
        header("Location: ../viewpets.php?OwnerID=" . $_GET['OwnerID']);
    } else {
        echo "Pet deletion failed";
    }
}

if (isset($_POST['addAppointmentBtn'])) {
    $petID = $_POST['PetID'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("INSERT INTO Appointments (PetID, AppointmentDate, AppointmentTime, Description, Status) 
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$petID, $appointmentDate, $appointmentTime, $description, $status]);

    header("Location: ../viewappointments.php?PetID=$petID&OwnerID=".$_GET['OwnerID']);
    exit();
}

if (isset($_POST['deleteAppointmentBtn'])) {
    $query = deleteAppointment($pdo, $_GET['AppointmentID']);

    if ($query) {
        header("Location: ../viewappointments.php?PetID=" . $_GET['PetID']);
    } else {
        echo "Appointment deletion failed";
    }
}

?>
