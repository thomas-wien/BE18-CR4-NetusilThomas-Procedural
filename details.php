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
head(" | Details"); ?>

<div class="container pb-5">
    <div class="title text-center">
        <h1 class="my-5">Details</h1>
    </div>
    <div class='card'>
        <div class='row'>
            <div class='col-sm-5 col-md-4'>
                <img class='card-img img-fluid rounded-start p-2' src='pictures/<?= $picture ?>' alt=<?= $title ?>>
                <div class='card-footer text-center mx-auto space-around w-100'>
                    <a class='col-4 p-2 ms-3 btn btn-secondary btn-sm w-25 text-white' href='index.php'>Home</a>
                    <a class='col-4 p-2 ms-3 btn btn-secondary btn-sm w-25 text-white' href='update.php?id=<?= $id ?>'>Update</a>
                    <a class='col-4 p-2 ms-3 btn btn-danger btn-sm w-25 text-white' href='delete.php?id=<?= $id ?>'>Delete</a>
                    <div class='mb-3 pt-5 text-center'>
                        <a class="p-2 ms-3 btn btn-success btn-sm w-75 text-white" href="create.php">Create a new Item</a>
                    </div>
                </div>
            </div>
            <div class='col-sm-7 col-md-8'>
                <div class='card-body'>
                    <h5 class='card-title'><?= $author_first_name ?> <?= $author_last_name ?><h5>
                            <h5 class='card-title'><?= $title ?></h5>
                            <p class='card-text'><?= $short_description ?></p>
                            <p class='card-text'>ISBN: <?= $isbn ?></p>
                            <p class='card-text'>Type: <?= $item_type ?></p>
                            <p class='card-text'>Publisher Name: <?= $publisher_name ?></p>
                            <p class='card-text'>Publisher Address: <?= $publisher_address ?></p>
                            <p class='card-text'>Published: <?= $publish_date ?></p>
                            <p class='card-text'>Item is <?= ($available == 0) ? 'Reserved' : 'Available'; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php htmlend(); ?>