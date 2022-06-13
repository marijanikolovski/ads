<?php
session_start();
include('db.php');

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $created_at  = $_POST['created_at'];
    $expires_on = $_POST['expires_on'];


    $id = $_SESSION['user_id'];

    if(empty($title) || empty($content) || empty($category) || empty($created_at) || empty($expires_on)) {
        echo 'Nisu ispunjena sva polja';
    } else {
        $sql = "INSERT INTO ads (
            title, content, category, created_at,expires_on, user_id)
            VALUES ('$title', '$content', '$category', ' $created_at', '$expires_on', '$id')";
         $statement = $connection->prepare($sql);
         $statement->execute();
         header('Location:list_ads.php');
         echo ("Upisi u bazu");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Vivifyads</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
    <body >
        <?php include('header.php'); ?>
            <div style="flex-direction: column" class="va-c-paginator">
                <header>
                    <h1 >Create new add</h1>
                </header>
                <div class="va-c-paginator">
                    <form class="va-c-form-control" action="create_new_add.php" method="POST" id="postsForma">
                        <div >
                            <div>
                                <label class="va-c-control-label" for='title'>Title</label>
                                <input style="width: 400px; height: 25px;" type="text" id='title' name='title'>
                            </div>

                            <div >
                                <label class="va-c-control-label" for='content' >Content</label>
                                <input style="width: 400px; height: 25px;" type="text" name='content' id ='last_name'>
                            </div>

                            <div >
                                <label class="va-c-control-label" for='category' >Category</label>
                                <input style="width: 400px; height: 25px;" type="text" name='category' id ='category'>
                            </div>

                            <div >
                                <label class="va-c-control-label" for='created_at' >Created_at</label>
                                <input style="width: 400px; height: 25px;" type="text" name='created_at' id ='created_at'>
                            </div>

                            <div >
                                <label class="va-c-control-label"for='expires_on' >Expires_on</label>
                                <input style="width: 400px; height: 25px;" type="text" name='expires_on' id ='expires_on'>
                            </div>

                            <div >
                                <button class="va-c-btn" type="submit" name="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    <?php include('Footer.php'); ?>

</body>
</html>