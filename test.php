<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
  <?php
$servername = "localhost";
$username = "teamEdbuser";
$password = "teamEdbuser";
$database = "teamEdb";
try {
    // echo phpversion();
    
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected successfully";

    $stmt = $conn->query("select * from topics");
    $topics = $stmt->fetchAll();

    echo $topics[0]['lao'];

} catch (\Throwable $th) {
    echo "connection failed:" . $th->getMessage();
}

?>
  </body>

</html>
