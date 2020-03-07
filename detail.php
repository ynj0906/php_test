<?php
require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, "config/.env");
$dotenv->load();

// $host = $_ENV["HOST"];
$port = $_ENV['port'];
$dbname = $_ENV['dbname'];
$user = $_ENV['user'];
$password = $_ENV['PASSWORD'];

$conn = "  port=$port dbname=$dbname user=$user password=$password";
$link = pg_connect($conn);

?>
<head>
    <meta charset="utf-8">
    <title> てすと</title>
    <link rel="stylesheet" href="css/blog.css">
</head>

<div id="update">
    <form action="update.php" method="post">
        <button type="submit">更新する</button>
        <input type="hidden" name="id" value=<?php echo $_GET['post_id'] ?>>

    </form>
</div>

<?php
if (isset($_GET['post_id']) != '') {

    $post_id = $_GET['post_id'];
    $result = pg_query($link, "SELECT * FROM post where post_id = $post_id");
    // $result = pg_query($link, "SELECT * FROM post");
    $arr = pg_fetch_all($result);
?>

    <div class="contents">

        <?php
        foreach ($arr as $arrr) {
        ?>

            <div id="contents_main">
                <div class="title">

                    <?php echo $arrr["post_title"];
                    echo '<br>';
                    ?>
                </div>

                <div class="content">
                    <?php

                    echo $arrr["post_content"];
                    echo '<br>';
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
} else {
    echo '<strong>$_GET[\'post_title\']はまだ送信されていません。' . "</strong><br/>\n";
}
?>