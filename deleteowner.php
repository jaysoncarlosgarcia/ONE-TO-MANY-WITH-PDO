<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete User</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getOwnerByID = getOwnerByID($pdo, $_GET['OwnerID']); ?>
	<div class="container">
		<h2>First Name: <?php echo $getOwnerByID['firstName']; ?></h2>
		<h2>Last Name: <?php echo $getOwnerByID['lastName']; ?></h2>
		<h2>Date Of Birth: <?php echo $getOwnerByID['dateOfBirth']; ?></h2>
		<h2>Phone Number: <?php echo $getOwnerByID['phoneNumber']; ?></h2>
		<h2>Email: <?php echo $getOwnerByID['Email']; ?></h2>
		<h2>Date Added: <?php echo $getOwnerByID['date_added']; ?></h2>

		<div class="deleteBtn">
			<form action="core/handleForms.php?OwnerID=<?php echo $_GET['OwnerID']; ?>" method="POST">
				<input type="submit" name="deleteOwnerBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
