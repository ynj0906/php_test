<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title> てすと</title>
    <link rel="stylesheet" href="css/blog.css">
</head>

<body>
    <?php
    require_once './vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, "config/.env");
    $dotenv->load();

    $host = $_ENV["HOST"];
    $port = $_ENV['port'];
    $dbname = $_ENV['dbname'];
    $user = $_ENV['user'];
    $password = $_ENV['PASSWORD'];

    $conn = " host=$host port=$port dbname=$dbname user=$user password=$password";
    $link = pg_connect($conn);
    $result = pg_query($link, "SELECT * FROM post");
    $arr = pg_fetch_all($result);
    ?>

    <div id="container">
        <header>
            ヘッダ部分
        </header>
        <div id="create">
            <form action="html/create.html" method="post">
            <button type="submit">新規作成</button>
            </form>
        </div>

        <div class="contents">
            <?php
            foreach ($arr as $arrr) {
                ?>

                <div id="contents_main">
                    <a href='detail.php?post_id=<?php echo $arrr["post_id"]; ?>'>
                        <?php echo $arrr["post_title"];
                        ?>
                    </a>

                <?php
                echo $arrr["post_content"];
                echo '<br>';

 
// 出力する

                ?>
                 </div>
        <?php  
        }
            ?> 

                <?php
                unset($value);
                ?>
               
        </div>
    </div>

    <?php
    pg_close($link);
    ?>

</body>

</html>