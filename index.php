<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1><center>Welcome To Pawnect.</center></h1>
	<h2>Please enter your information below to Register.</h2>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name: </label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="lastName">Last Name: </label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth: </label> 
			<input type="date" name="dateOfBirth">
		</p>
        <p>
			<label for="phoneNumber">Phone Number: </label> 
			<input type="text" name="phoneNumber">
		</p>
		<p>
			<label for="Email">Email: </label> 
			<input type="text" name="Email">
		</p>
			<input type="submit" name="insertOwnerBtn">
	</form>
	<h1>List of Registered Owners</h1>
	<?php $getAllOwners = getAllOwners($pdo); ?>
	<?php foreach ($getAllOwners as $row) { ?>
		<div class="container" style="border-style: solid; width: 50%; margin-top: 20px; padding: 15px;">
    <h3>Owner Details:</h3>
	<p>ID: <?php echo $row['OwnerID']; ?></p>
    <p>First Name: <?php echo $row['firstName']; ?></p>
    <p>Last Name: <?php echo $row['lastName']; ?></p>
    <p>Date Of Birth: <?php echo $row['dateOfBirth']; ?></p>
    <p>Phone Number: <?php echo $row['phoneNumber']; ?></p>
    <p>Email: <?php echo $row['Email']; ?></p>
    <p>Date Added: <?php echo $row['date_added']; ?></p>
	
    <div class="editAndDelete" style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 10px;">
        <a href="viewpets.php?OwnerID=<?php echo $row['OwnerID']; ?>">View Pets</a>
        <a href="editowner.php?OwnerID=<?php echo $row['OwnerID']; ?>">Edit</a>
        <a href="deleteowner.php?OwnerID=<?php echo $row['OwnerID']; ?>">Delete</a>
    </div>
	</div>
 
	<?php } ?>
</body>
</html>