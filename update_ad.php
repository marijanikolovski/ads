<?php
include('db.php');
session_start();


if(isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $created_at  = $_POST['created_at'];
    $expires_on = $_POST['expires_on'];
    $id = $_POST['id'];


    if(empty($title) || empty($content) || empty($category) || empty($created_at) || empty($expires_on)) {
        echo 'Nisu ispunjena sva polja';
    } else {
        $sql = "UPDATE ads SET 
        title = '$title', content = '$content', category = '$category', created_at = '$created_at', expires_on = '$expires_on' 
        WHERE id = '$id'";
         $statement = $connection->prepare($sql);
         $statement->execute();
         header('Location:index.php');
         echo ("Upisi u bazu");
    }
}

    $sql_oglas ="SELECT * FROM ads WHERE id = {$_GET['ads_id']}";
    $ad = fetch($sql_oglas, $connection); 
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
                <header">
                    <h1 style="text-align: center;">Update ad </h1>
                </header>

                <form class="va-c-form-control" action="update_ad.php" method="POST" id="postsForma">
                <div >
                    <div>
                        <label class="va-c-control-label" for='title'>Title</label>
                        <input style="width: 400px; height: 25px;" type="text" id='title' name='title' value='<?php echo $ad['title'] ?>'>
                    </div>

                    <div >
                        <label class="va-c-control-label" for='content' >Content</label>
                        <input style="width: 400px; height: 25px;" type="text" name='content' id ='content'  value='<?php echo $ad['content'] ?>'>
                    </div>

                    <div >
                        <label class="va-c-control-label" for='category' >Category</label>
                        <input style="width: 400px; height: 25px;" type="text" name='category' id ='category'  value='<?php echo $ad['category'] ?>'>
                    </div>

                    <div >
                        <label class="va-c-control-label" for='created_at' >Created_at</label>
                        <input style="width: 400px; height: 25px;" type="text" name='created_at' id ='created_at'  value='<?php echo $ad['created_at'] ?>'>
                    </div>

                    <div >
                        <label class="va-c-control-label" for='expires_on' >Expires_on</label>
                        <input style="width: 400px; height: 25px;" type="text" name='expires_on' id ='expires_on'  value='<?php echo $ad['expires_on'] ?>'>
                    </div>

                        <input hidden id="id" name="id" value="<?php echo $_GET['ads_id'] ?>">   

                    <div >
                        <button class="va-c-btn" type="submit" name="update">Update</button>
                    </div>
                </div>
            </form>
            </div>
            <?php include('Footer.php'); ?>

</body>
</html>