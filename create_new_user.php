<?php
include('db.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email) || empty($password)) {
        echo 'Nisu ispunjena sva polja';
    } else {
        $sql = "INSERT INTO users (
            email, password)
            VALUES ('$email', '$password')";
         $statement = $connection->prepare($sql);
         $statement->execute();
         echo ("Upisi u bazu");
         header("Location:create_new_profile.php?username='$email'");

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
    <?php include('header.php') ?>
        <div style="flex-direction: column" class="va-c-paginator">
            <header">
                <h1 style="text-align: center;">User profile</h1>
            </header>
            <div class="va-c-paginator">
                <form class="va-c-form-control" action="create_new_user.php" method="POST" id="postsForma">
                    <div >
                        <div>
                            <label class="va-c-control-label" for='email'>Email</label>
                            <input style="width: 400px; height: 25px;" type="text" id='email' name='email'>
                        </div>

                        <div >
                            <label class="va-c-control-label" for='password' >Password</label>
                            <input style="width: 400px; height: 25px;" type="text" name='password' id ='password'>
                        </div>

                        <div >
                            <button class="va-c-btn" type="submit" name="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php include('footer.php') ?>
</body>
</html>