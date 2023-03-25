<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM item WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
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

<?php include 'components/htmlhelper.php';
head(" | Delete Item"); ?>

<div class="container">

    <h1 class="text-center py-5">Do you really want to delete this item?:</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <div>
            <h1 class="text-center"></h1>
        </div>
        <div>
            <form method="post" action="actions/a_delete.php" class="form-group" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>" />
                <div>
                    <div class='card p-3 mb-3'>
                        <div class='card-img-body'>
                            <img class='card-img mx-auto' data-bs-toggle='modal' data-bs-target='#exampleModal' src='pictures/<?= $picture ?>' alt="<?= $title ?>">
                        </div>
                        <div class='card-body'>
                            <h4 class='card-text'>"<?= $author_first_name ?>" "<?= $author_last_name ?>"</h4>
                            <h5 class='card-title'>"<?= $title ?>"</h5>
                            <p class='card-text'>"<?php substr($short_description, 0, 45) ?> . " <a href='details.php?id=" . <?= $id ?> . "'>...more</a><br></p>
                            <p class='card-text'>"<?= $isbn ?>"</p>
                            <p class='card-text'>Type: "<?= $item_type ?>"</p>
                            <hgroup class="row">
                                <input class="col-4 p-2 ms-3 btn btn-danger btn-sm text-white" type="submit" name="submit" value="Yes, delete it">
                                <a class="col-4 p-2 ms-3 btn btn-secondary btn-sm text-white" href="index.php">No, go back!</a>
                            </hgroup>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class='mb-3'>
        <a class="col-4 p-2 ms-3 btn btn-success btn-sm w-25 text-white" href="create.php">Create a new Item</a>
    </div>
</div>
<?php htmlend(); ?>