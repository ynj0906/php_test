<?php
    require_once './vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, "config/.env");
    $dotenv->load();

    // $host = $_ENV["HOST"];
    $port = $_ENV['port'];
    $dbname = $_ENV['dbname'];
    $user = $_ENV['user'];
    $password = $_ENV['PASSWORD'];

    $conn = " port=$port dbname=$dbname user=$user password=$password";
    $link = pg_connect($conn);

?>  

<?php
if( $link ) {
    echo $_POST['view_title'];
    $timestamp = time() ;
    $date = date( "Y/m/d H:i:s" , $timestamp );
    

    $sql="INSERT INTO post (
         post_title, post_content, time
        ) VALUES ('$_POST[view_title]', '$_POST[view_content]', '$date')";
    
    // echo $sql;
    $result = pg_query($link, $sql);

    $host  = $_SERVER['HTTP_HOST'];
    header("Location:    http://$host/postgresql.php");
    exit();
    var_dump($result);

} else {
	var_dump("接続できませんでした");
}
    pg_close($link);
    ?>

<?php

?>
