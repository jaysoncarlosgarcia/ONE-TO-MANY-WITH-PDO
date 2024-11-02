<?php  

function insertOwner($pdo, $firstName, $lastName, $dateOfBirth, $phoneNumber, $Email) {

	$sql = "INSERT INTO Owners (firstName, lastName, dateOFBirth, phoneNumber, Email) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$firstName, $lastName, $dateOfBirth, $phoneNumber, $Email]);

	if ($executeQuery) {
		return true;
	}
}

function updateOwner($pdo, $firstName, $lastName, $dateOfBirth, $phoneNumber, $Email, $OwnerID) {

	$sql = "UPDATE Owners
				SET firstName = ?,
					lastName = ?,
					dateOfBirth = ?, 
					phoneNumber = ?,
					Email = ?
				WHERE OwnerID = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$firstName, $lastName, $dateOfBirth, $phoneNumber, $Email, $OwnerID]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteOwner($pdo, $OwnerID) {
	$deleteOwnerPet = "DELETE FROM Pets WHERE OwnerID = ?";
	$deleteStmt = $pdo->prepare($deleteOwnerPet);
	$executeDeleteQuery = $deleteStmt->execute([$OwnerID]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM Owners WHERE OwnerID = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$OwnerID]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function getAllOwners($pdo) {
	$sql = "SELECT * FROM Owners";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getOwnerByID($pdo, $OwnerID) {
	$sql = "SELECT * FROM Owners WHERE OwnerID = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$OwnerID]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getOwnerIDByPetID($pdo, $PetID) {
    $sql = "SELECT OwnerID FROM Pets WHERE PetID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$PetID]);
    return $stmt->fetchColumn();
}

function getPetsFromOwner($pdo, $OwnerID) {
	
	$sql = "SELECT 
				Pets.PetID AS PetID,
				Pets.petName AS petName,
				Pets.Species AS species,
				Pets.Breed AS breed,
				Pets.dateOfBirth AS dateOfBirth,
				Pets.Gender AS gender,
				Pets.date_added AS date_added,
				CONCAT(Owners.FirstName,' ',Owners.LastName) AS pet_owner
			FROM Pets
			JOIN Owners ON Pets.OwnerID = Owners.OwnerID
			WHERE Pets.OwnerID = ? 
			GROUP BY Pets.PetName;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$OwnerID]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function insertPet($pdo, $petName, $species, $breed, $dateOfBirth, $gender, $OwnerID) {
    $sql = "INSERT INTO Pets (petName, Species, Breed, dateOfBirth, Gender, OwnerID) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$petName, $species, $breed, $dateOfBirth, $gender, $OwnerID]);
    if ($executeQuery) {
        return true;
    }
}

function getPetByID($pdo, $PetID) {
	$sql = "SELECT 
				Pets.PetID AS PetID,
				Pets.petName AS petName,
				Pets.Species AS species,
				Pets.Breed AS breed,
				Pets.dateOfBirth AS dateofBirth,
				Pets.gender AS gender,
				Pets.date_added AS date_added,
				CONCAT(Owners.firstName,' ',Owners.lastName) AS pet_owner
			FROM Pets
			JOIN Owners ON Pets.OwnerID = Owners.OwnerID
			WHERE Pets.PetID  = ? 
			GROUP BY Pets.petName";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$PetID]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updatePet($pdo, $petName, $species, $breed, $dateOfBirth, $gender, $PetID) {
    $sql = "UPDATE Pets
            SET PetName = ?,
                Species = ?,
                Breed = ?,
                dateOfBirth = ?,
                Gender = ?
            WHERE PetID = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$petName, $species, $breed, $dateOfBirth, $gender, $PetID]);

    if ($executeQuery) {
        return true;
    }
}

function deletePet($pdo, $PetID) {
	$sql = "DELETE FROM Pets WHERE PetID = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$PetID]);
	if ($executeQuery) {
		return true;
	}
}

function getAppointmentByID($pdo, $appointmentID) {
    $sql = "SELECT Appointments.*, Pets.PetName AS petName 
            FROM Appointments 
            JOIN Pets ON Appointments.PetID = Pets.PetID 
            WHERE Appointments.AppointmentID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$appointmentID]);

    return $stmt->fetch();
}

function getAppointmentsByPetID($pdo, $PetID) {
    $sql = "SELECT * FROM Appointments WHERE PetID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$PetID]);
    return $stmt->fetchAll();
}

function updateAppointment($pdo, $appointmentID, $appointmentDate, $appointmentTime, $description, $status) {
    $sql = "UPDATE Appointments
            SET AppointmentDate = ?,
                AppointmentTime = ?,
                Description = ?,
                Status = ?
            WHERE AppointmentID = ?";
    
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$appointmentDate, $appointmentTime, $description, $status, $appointmentID]);

    if ($executeQuery) {
        return true;
    }
}

function deleteAppointment($pdo, $appointmentID) {
	$sql = "DELETE FROM Appointments WHERE AppointmentID = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$appointmentID]);
	return $executeQuery;
}


?>