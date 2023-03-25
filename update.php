<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM item WHERE id = {$id}";
	$result = mysqli_query($connect, $sql);
	if (mysqli_num_rows($result) == 1) {
		$data = mysqli_fetch_assoc($result);
		$title = $data['title'];
		$isbn = $data['isbn'];
		$short_description = $data['short_description'];
		$item_type = $data['item_type'];
		$author_first_name = $data['author_first_name'];
		$author_last_name = $data['author_last_name'];
		$publisher_name = $data['publisher_name'];
		$publisher_address = $data['publisher_address'];
		$publish_date = $data['publish_date'];
		$available = $data['available'];
		$picture = $data['picture'];
	} else {
		header("location: error.php");
	}
	mysqli_close($connect);
} else {
	header("location: error.php");
}
?>
<?php require_once 'components/htmlhelper.php';
head(" | Update"); ?>

<div class="container pb-5 pt-2">
	<h1 class="text-center">Update the <?= $item_type ?></h1>
</div>
<div class="container">
	<form method="post" action="actions/a_update.php" class="form-group" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $id ?>" />
		<div class="row mx-auto needs-validation" novalidate style="width: 80%;">
			<div class="card p-3 mb-5 bg-secondary bg-gradient">
				<div class="card-img-body">
					<img class="card-img w-25 mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" src=pictures/<?= $picture ?> alt="<?= $title ?>">
					<input type="file" class="form-control" name="picture" placeholder="Please choose a picture...">
				</div>
				<div class="card-body">
					<div class="input-group has-validation mb-3">
						<span class="input-group-text">Author</span>
						<input type="text" placeholder="Firstname" class="form-control" name="author_first_name" value="<?= $author_first_name ?>">
						<input type="text" placeholder="Lastname" class="form-control" name="author_last_name" value="<?= $author_last_name ?>">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-title">Title</span>
						<input type="text" class="form-control" aria-label="title" aria-describedby="inputGroup-title" name="title" value="<?= $title ?>">
					</div>
					<select class="form-select mb-3" aria-label="form-select Type" name="item_type" value=<?= $item_type ?> required>
						<option disabled>... select</option>
						<option value="Book" <?php if ($item_type == 'Book') echo 'selected="selected"'; ?>>Book</option>
						<option value="CD" <?php if ($item_type == 'CD') echo 'selected="selected"'; ?>>CD</option>
						<option value="DVD" <?php if ($item_type == 'DVD') echo 'selected="selected"'; ?>>DVD</option>
					</select>
					<div class="input-group mb-3">
						<span class="input-group-text">Desciption</span>
						<textarea class="form-control" aria-label="Description" name="short_description" style="height: 100px" value="<?= $short_description ?>"><?= $short_description ?></textarea>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-isbn">ISBN</span>
						<input type="text" class="form-control" aria-label="isbn" aria-describedby="inputGroup-isbn" name="isbn" value="<?= $isbn ?>">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-publisher_name">Publisher Name</span>
						<input type="text" class="form-control" aria-label="publisher_name" aria-describedby="inputGroup-publisher_name" name="publisher_name" value="<?= $publisher_name ?>">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-publisher_address">Publisher Address</span>
						<input type="text" class="form-control" aria-label="publisher_address" aria-describedby="inputGroup-publisher_address" name="publisher_address" value="<?= $publisher_address ?>">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="inputGroup-publish_date">Date Published</span>
						<input type="date" class="form-control date" aria-label="publish_date" aria-describedby="inputGroup-publish_date" name="publish_date" value="<?= $publish_date ?>">
					</div>
					<select class="form-select mb-3" aria-label="form-select available" name="available" value=<?= $available ?> required>
						<option disabled>... select</option>
						<option value="0" <?php if ($available == 0) echo 'selected="selected"'; ?>>Reserved</option>
						<option value="1" <?php if ($available == 1) echo 'selected="selected"'; ?>>Available</option>
					</select>
				</div>
				<div class='card-footer text-center mx-auto space-around w-100'>
					<a class="col-4 p-2 ms-3 btn btn-light btn-sm w-25 text-dark" href="index.php">Home</a>
					<input class="col-4 p-2 ms-3 btn btn-success btn-sm w-25 text-white" type="submit" name="submit" value="Submit Changes" class="btn btn-success">
					<a class="col-4 p-2 ms-3 btn btn-danger btn-sm w-25 text-white" href="delete.php?id=<?= $id ?>">Delete</a>
					<div class='mb-3 pt-5 text-center'>
						<a class="col-4 p-2 ms-3 btn btn-success btn-sm w-25 text-white" href="create.php">Create a new Item</a>
					</div>
				</div>


			</div>
		</div>
	</form>
</div>
<?php htmlend(); ?>