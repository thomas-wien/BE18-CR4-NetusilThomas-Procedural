<?php include 'components/htmlhelper.php';
head(" | Create Item"); ?>

<div class="container">
    <h1 class="text-center">Create an Item</h1>
</div>
<div>
    <form method="post" action="actions/a_create.php" class="form-group" enctype="multipart/form-data">
        <h1 class="text-center"></h1>
        <div class="row mx-auto needs-validation" novalidate style="width: 75%;">
            <div class="card p-3 mb-5">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="picture" name="picture">
                    </div>
                    <div class="input-group has-validation mb-3">
                        <span class="input-group-text">Author</span>
                        <input type="text" placeholder="Firstname" class="form-control" name="author_first_name">
                        <input type="text" placeholder="Lastname" class="form-control" name="author_last_name" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-title">Title</span>
                        <input type="text" class="form-control" aria-label="title" aria-describedby="inputGroup-title" name="title" required>
                    </div>
                    <select class="form-select form-select mb-3" aria-label=".form-select example" name="item_type" required>
                        <option selected disabled>Item Type</option>
                        <option value="Book">Book</option>
                        <option value="CD">CD</option>
                        <option value="DVD">DVD</option>
                    </select>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Desciption</span>
                        <textarea class="form-control" aria-label="Description" name="short_description" rows="3" required></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-isbn">ISBN</span>
                        <input type="text" class="form-control" aria-label="isbn" aria-describedby="inputGroup-isbn" name="isbn" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-publisher_name">Publisher Name</span>
                        <input type="text" class="form-control" aria-label="publisher_name" aria-describedby="inputGroup-publisher_name" name="publisher_name" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-publisher_address">Publisher Address</span>
                        <input type="text" class="form-control" aria-label="publisher_address" aria-describedby="inputGroup-publisher_address" name="publisher_address" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-publish_date">Date Published</span>
                        <input type="date" class="form-control date" aria-label="publish_date" aria-describedby="inputGroup-publish_date" name="publish_date" required>
                    </div>
                    <select class="form-select mb-3" aria-label="form-select available" name="available" value=<?= $available ?> required>
                        <option disabled>... select</option>
                        <option value="0">Reserved</option>
                        <option value="1">Available</option>
                    </select>
                    <hgroup class="row">
                        <input class="col-4 p-2 ms-3 btn btn-success btn-sm w-25 text-white" type="submit" name="submit" value="Create the Item" class="btn btn-success">
                        <a class="col-4 p-2 ms-3 btn btn-secondary btn-sm w-25 text-white" href="index.php">back</a>
                    </hgroup>
                </div>
            </div>
        </div>
    </form>
</div>
<?php htmlend(); ?>