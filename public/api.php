<?php

require_once realpath(__DIR__.'/../config/db_config.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //debug_to_console( "Connected successfully");
} catch (PDOException $e) {
      //debug_to_console(  "Connection failed: " . $e->getMessage());
}

try {
    $str = $_POST['str'];
    $stmt = $conn->prepare("Insert into strings(sentence) values(:str)");
    $stmt->bindParam(":str", $str);

    if ($stmt->execute())
        echo 1;
    else
        echo 0;

    $conn = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
