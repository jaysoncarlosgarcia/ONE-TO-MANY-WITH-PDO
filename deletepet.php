<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Pet</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getPetByID = getPetByID($pdo, $_GET['PetID']); ?>
	<h1>Are you sure you want to delete this Pet?</h1>
	<div class="container">
		<h2>Pet Name: <?php echo htmlspecialchars($getPetByID['petName']); ?></h2>
		<h2>Species: <?php echo htmlspecialchars($getPetByID['species']); ?></h2>
		<h2>Breed: <?php echo htmlspecialchars($getPetByID['breed']); ?></h2>
		<h2>Date Of Birth: <?php echo htmlspecialchars($getPetByID['dateofBirth']); ?></h2>
		<h2>Gender: <?php echo htmlspecialchars($getPetByID['gender']); ?></h2>
		<h2>Pet Owner: <?php echo htmlspecialchars($getPetByID['pet_owner']); ?></h2>
		<h2>Date Added: <?php echo htmlspecialchars($getPetByID['date_added']); ?></h2>

		<div class="deleteBtn">
			<form action="core/handleForms.php?PetID=<?php echo $_GET['PetID']; ?>&OwnerID=<?php echo $_GET['OwnerID']; ?>" method="POST">
				<input type="submit" name="deletePetBtn" value="Delete">
			</form>			
		</div>	
	</div>
</body>
</html>
