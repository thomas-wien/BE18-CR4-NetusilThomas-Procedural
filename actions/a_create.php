<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {
    $title = (isset($_POST['title'])) ? mysqli_real_escape_string($connect, $_POST['title']) : "";
    $isbn = (isset($_POST['isbn'])) ? mysqli_real_escape_string($connect, $_POST['isbn']) : "";
    $short_description = (isset($_POST['short_description'])) ? mysqli_real_escape_string($connect, $_POST['short_description']) : "";
    $item_type = ((isset($_POST['item_type'])) && $_POST['item_type'] != "Item Type") ? mysqli_real_escape_string($connect, $_POST['item_type']) : "BOOK";
    $author_first_name = (isset($_POST['author_first_name'])) ? mysqli_real_escape_string($connect, $_POST['author_first_name']) : "";
    $author_last_name = (isset($_POST['author_last_name'])) ? mysqli_real_escape_string($connect, $_POST['author_last_name']) : "";
    $publisher_name = (isset($_POST['publisher_name'])) ? mysqli_real_escape_string($connect, $_POST['publisher_name']) : "";
    $publisher_address = (isset($_POST['publisher_address'])) ? mysqli_real_escape_string($connect, $_POST['publisher_address']) : "";
    $publish_date = (isset($_POST['publish_date'])) ? mysqli_real_escape_string($connect, $_POST['publish_date']) : "2000-01-01";
    $available = (isset($_POST['available'])) ? mysqli_real_escape_string($connect, $_POST['available']) : 1;
    // $picture = (isset($_POST['picture'])) ? mysqli_real_escape_string($connect, $_POST['picture']) : "product.png";
    $uploadError = '';
    $picture = file_upload($_FILES['picture']);

    $sql = "INSERT INTO item (title, isbn, short_description, item_type, author_first_name, author_last_name, publisher_name, publisher_address, publish_date, available, picture) VALUES ('$title', '$isbn', '$short_description', '$item_type', '$author_first_name', '$author_last_name', '$publisher_name', '$publisher_address', '$publish_date', '$available', '$picture->fileName')";

    if (mysqli_query($connect, $sql) === true) {
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        header("Location: ../index.php");
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<?php require_once '../components/htmlhelper.php';
head(" | Create Item"); ?>
<div class="container">
    <div class="mt-3 mb-3">
        <h1>Create request response</h1>
    </div>
    <div class="alert alert-<?= $class; ?>" role="alert">
        <p><?php echo ($message) ?? ''; ?></p>
        <p><?php echo ($uploadError) ?? ''; ?></p>
        <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
    </div>
</div>
<?php htmlend(); ?>