<?php
$dsn = 'mysql:host=localhost;dbname=test';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dbh = new PDO($dsn, $username, $password, $options);
$sth = $dbh->prepare("SELECT * FROM user");

$sth->execute();

/* Fetch all of the remaining rows in the result set */
//print("Fetch all of the remaining rows in the result set:\n");
echo "emails:";
$result = $sth->fetchAll();
foreach($result as $row){
    echo "<li>";
    echo $row['email'];
    echo'</li>';
}
//print_r($result);
?>