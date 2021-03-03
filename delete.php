<?php
require'db.php';
$id=($_GET["id"]);
try {
    $conn = new PDO('mysql:dbname=carnet;host=localhost','root','');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // sql to delete a record
    $req = 'DELETE FROM network WHERE id = "'.$id.'"';
    // use exec() because no results are returned
     $conn->exec($req);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $req . "<br>" . $e->getMessage();
    }
$conn = null;
header('Location: contacts.php');
?>