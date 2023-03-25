<?php
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture == "product.png") ?: unlink("../pictures/$picture");

    $sql = "DELETE FROM item WHERE id = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        header("location: ../index.php");
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<?php require_once 'components/htmlhelper.php';
head(" | Delete"); ?>

<div class="container">
    <div class="mt-3 mb-3">
        <h1>Deletion request response</h1>
    </div>
    <div class="alert alert-<?= $class; ?>" role="alert">
        <p><?= $message; ?></p>
        <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
    </div>
</div>
<?php htmlend(); ?>