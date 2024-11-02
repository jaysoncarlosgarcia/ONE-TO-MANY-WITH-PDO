<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pets</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to home</a>

    <?php $getOwnerByID = getOwnerByID($pdo, $_GET['OwnerID']); ?>
    <h1>Enter your pet information below to register your Pet.</h1>
    <form action="core/handleForms.php?OwnerID=<?php echo $_GET['OwnerID']; ?>" method="POST">
        <p>
            <label for="petName">Pet Name</label> 
            <input type="text" name="petName" required>
        </p>
        <p>
            <label for="species">Species</label> 
            <input type="text" name="species" required>
        </p>
        <p>
            <label for="breed">Breed</label> 
            <input type="text" name="breed" required>
        </p>
        <p>
            <label for="dateOfBirth">Date of Birth</label> 
            <input type="date" name="dateOfBirth" required>
        </p>
        <p>
            <label for="gender">Gender</label> 
            <input type="text" name="gender" required>
        </p>
        <input type="submit" name="insertPetBtn" value="Add Pet">
    </form>
    <h1>Your Pets</h1>
    <table>
      <tr>
        <th>Pet ID</th>
        <th>Pet Name</th>
        <th>Species</th>
        <th>Breed</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Pet Owner</th>
        <th>Date Added</th>
        <th>Appointments</th>
        <th>Action</th>
      </tr>
      <?php 
          $getPetsFromOwner = getPetsFromOwner($pdo, $_GET['OwnerID']); 
          foreach ($getPetsFromOwner as $row) { 
      ?>
      <tr>
        <td><?php echo htmlspecialchars($row['PetID']); ?></td>
        <td><?php echo htmlspecialchars($row['petName']); ?></td>
        <td><?php echo htmlspecialchars($row['species']); ?></td>
        <td><?php echo htmlspecialchars($row['breed']); ?></td>
        <td><?php echo htmlspecialchars($row['dateOfBirth']); ?></td>
        <td><?php echo htmlspecialchars($row['gender']); ?></td>
        <td><?php echo htmlspecialchars($row['pet_owner']); ?></td>
        <td><?php echo htmlspecialchars($row['date_added']); ?></td>
        <td>
            <a href="viewappointments.php?PetID=<?php echo $row['PetID']; ?>&OwnerID=<?php echo $_GET['OwnerID']; ?>">View Appointments</a>
        </td>
        <td>
            <a href="editpet.php?PetID=<?php echo $row['PetID']; ?>&OwnerID=<?php echo $_GET['OwnerID']; ?>">Edit</a>
            <a href="deletepet.php?PetID=<?php echo $row['PetID']; ?>&OwnerID=<?php echo $_GET['OwnerID']; ?>">Delete</a>
        </td>      
      </tr>
      <?php } ?>
    </table>
</body>
</html>
