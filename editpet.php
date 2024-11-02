<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Pet</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewpets.php?OwnerID=<?php echo $_GET['OwnerID']; ?>">View Pets</a>
	<h1>Edit Pet Info</h1>
	<?php $getPetByID = getPetByID($pdo, $_GET['PetID']); ?>
	<form action="core/handleForms.php?PetID=<?php echo $_GET['PetID']; ?>
	&OwnerID=<?php echo $_GET['OwnerID']; ?>" method="POST">
		<p>
			<label for="petName">Pet Name</label> 
			<input type="text" name="petName" 
			value="<?php echo $getPetByID['petName']; ?>">
		</p>
		<p>
			<label for="Species">Species</label> 
			<input type="text" name="species" 
			value="<?php echo $getPetByID['species']; ?>">
		</p>
		<p>
			<label for="Breed">Breed</label> 
			<input type="text" name="breed" 
			value="<?php echo $getPetByID['breed']; ?>">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" 
			value="<?php echo $getPetByID['dateofBirth']; ?>">
		</p>
		<p>
			<label for="Gender">Gender</label> 
			<input type="text" name="gender" 
			value="<?php echo $getPetByID['gender']; ?>">
			<input type="submit" name="editPetBtn">
		</p>
	</form>
</body>
</html>
