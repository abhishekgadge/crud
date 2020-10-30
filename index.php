<?php  
include('server.php');
        if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$assignment = $n['assignment'];
                        $grade = $n['grade'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
         <?php if (isset($_SESSION['message'])): ?>
	         <div class="msg">
		         <?php 
			         echo $_SESSION['message']; 
			         unset($_SESSION['message']);
		         ?>
	         </div>
         <?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Assignment</th>
                        <th>Grade</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['assignment']; ?></td>
                        <td><?php echo $row['grade']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>



<form method="post" action="server.php" >

                <input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value=""<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Assignment</label>
			<input type="text" name="assignment" value=""<?php echo $assignment; ?>">

                </div>
		<div class="input-group">
			<label>Grade</label>
			<input type="text" name="grade" value=""<?php echo $grade; ?>">

		</div>
		<div class="input-group">

			<?php if ($update == true): ?>
	                    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                        <?php else: ?>
	                    <button class="btn" type="submit" name="save" >Save</button>
                        <?php endif ?>
		</div>
</form>
</body>
</html>