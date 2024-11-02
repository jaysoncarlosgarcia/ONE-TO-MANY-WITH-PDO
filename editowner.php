<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getOwnerByID = getOwnerByID($pdo, $_GET['OwnerID']); ?>
	<h1>Edit User Info</h1>
	<form action="core/handleForms.php?OwnerID=<?php echo $_GET['OwnerID']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getOwnerByID['firstName']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getOwnerByID['lastName']; ?>">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getOwnerByID['dateOfBirth']; ?>">
		</p>
		<p>
			<label for="phoneNumber">Phone Number</label> 
			<input type="text" name="phoneNumber" value="<?php echo $getOwnerByID['phoneNumber']; ?>">
		</p>
		<p>
			<label for="firstName">Email</label> 
			<input type="text" name="Email" value="<?php echo $getOwnerByID['Email']; ?>">
			<input type="submit" name="editOwnerBtn">
		</p>
	</form>
</body>
</html>