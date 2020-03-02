<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>CSS 練習中！</title>
    <link rel="stylesheet" href="../css/blog.css">
</head>
<form action=" ../update.php" method="post">
	<div>
		<label for="title">タイトル</label>
		<input id="title" type="text" name="view_title" value=" <?php $_POST['post_title']  ?>">
	</div>
	<div>
		<label for="content">内容</label>
		<textarea id="content" name="view_content"></textarea>
	</div>
	<input type="submit" name="btn_submit" value="登録">
</form>
</html>


<?php
echo 111;
echo$_POST['post_title'];
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

?>  

<!-- 
<?php
if( $link ) {
    echo $_POST['view_title'];
    $timestamp = time() ;
    $date = date( "Y/m/d H:i:s" , $timestamp );
    
    $post_id = $_POST["post_id"];
    $sql = "SELECT * FROM POST where post_id = $post_id ";
    // "UPDATE post SET post_title = "" post_content="" ";

    // $post_id = $_GET['post_id'];
    // $result = pg_query($link, "SELECT * FROM post where post_id = $post_id");


    // echo $sql;
    $result = pg_query($link, $sql);

    // $host  = $_SERVER['HTTP_HOST'];
    // header("Location:    http://$host/postgresql.php");
    // exit();

    var_dump($result);

} else {
	var_dump("接続できませんでした");
}

    pg_close($link);
    ?> -->