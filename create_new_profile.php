<?php
session_start();
include('db.php');

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    if(empty($first_name) || empty($last_name) || empty($date_of_birth) || empty($phone) || empty($city)) {
        echo 'Nisu ispunjena sva polja';
    } else {
        $sql_id = "SELECT id FROM users WHERE email = {$_GET['username']}";
        $statement = $connection->prepare($sql_id );
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $user_id = $statement->fetch();  
        $id = $user_id['id'];             
        $_SESSION['user_id'] =  $id;        
       // var_dump($user_id);
        //var_dump($id);

        
        $sql = "INSERT INTO profiles (
            first_name, last_name, date_of_birth, phone, city, user_id)
            VALUES ('$first_name', '$last_name', '$date_of_birth', ' $phone', '$city', '$id')";
         $statement = $connection->prepare($sql);
         $statement->execute();
        header('Location:create_new_add.php');
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
    <?php include('header.php') ?>
        <div style="flex-direction: column" class="va-c-paginator">
            <header">
                <h1 style="text-align: center;">Create new profile</h1>
            </header>
            <div class="va-c-paginator">
                <form class="va-c-form-control" action="create_new_profile.php?username=<?php echo $_GET['username'] ?>" method="POST" id="postsForma">
                    <div >
                        <div>
                            <label class="va-c-control-label" for='first_name'>First name</label>
                            <input style="width: 400px; height: 25px;" type="text" id='first_name' name='first_name'>
                        </div>

                        <div >
                            <label class="va-c-control-label" for='last_name' >Last name</label>
                            <input style="width: 400px; height: 25px;" type="text" name='last_name' id ='last_name'>
                        </div>

                        <div >
                            <label class="va-c-control-label" for='date_of_birth' >Date of birth</label>
                            <input style="width: 400px; height: 25px;" type="text" name='date_of_birth' id ='date_of_birth'>
                        </div>

                        <div >
                            <label class="va-c-control-label" for='phone' >Phone</label>
                            <input style="width: 400px; height: 25px;" type="text" name='phone' id ='phone'>
                        </div>

                        <div >
                            <label class="va-c-control-label" for='city' >City</label>
                            <input style="width: 400px; height: 25px;" type="text" name='city' id ='city'>
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