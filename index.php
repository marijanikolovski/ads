<?php include_once('db.php'); 


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

<body class="va-l-page va-l-page--homepage">

    <?php include('header.php') ?>

    <div style="display: flex; justify-content: center;" class="va-l-container">
        <main class="va-l-page-content">
        <header">
            <h1 style="text-align: center; margin-bottom: 25px;">Ads</h1>
        </header>

            
        <?php
                $sql = "SELECT a.id, a.title, a.created_at, p.first_name, p.last_name
                FROM ads as a INNER JOIN profiles as p 
                ON p.user_id = a.user_id  
                ORDER BY created_at
                LIMIT 5";
                $oglasi = fetch($sql, $connection,true);
                ?>

            <?php
                foreach ($oglasi as $oglas) {
            ?>

                <article class="va-c-article">
                    <header>
                        <h1><a href="update_ad.php?ads_id=<?php echo($oglas['id']) ?>"><?php echo($oglas['title']) ?></a></h1>

                            <div class="va-c-article__meta"><?php echo($oglas['created_at']) ?> by <?php echo($oglas['first_name']);
                            echo(' ');
                             echo($oglas['last_name']) ?></div>
                    </header>
                </article>

            <?php
                }
            ?>
        </main>
    </div>
    <div style="text-align: center;">
        <form action="list_ads.php" method="POST" id="postsForma">
            <button class="va-c-btn" type="submit" name="all_ads">All ads</button>
        </form>
    </div>
    <?php include('footer.php'); ?>

    <script>
        document.querySelector('.va-c-btn').addEventListener('click', function () {
            include('list_ads.php');
        })
    </script>

</body>