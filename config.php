<?Php
///////// Database Details change here  ////
$dbhost_name = "localhost";
$database = "ikm";
$username = "root";
$password = "";
//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage();
die();
}
?>