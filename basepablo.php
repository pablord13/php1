<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('HOST_NAME', 'localhost');
define('DATABASE_NAME', 'parodi_bs_3.01');
define('user', 'parodi');
define('_DB_PASSWORD', '2380');

try {
    $databaseConnection = new PDO('mysql:host=' . HOST_NAME . ';dbname=' . DATABASE_NAME, user, _DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $insertQuery = $databaseConnection->prepare("INSERT INTO TABLA1 (id, nom, cognom1, cognom2, usuario, email, clau, tipus) VALUES (:id, :nom, :cognom1, :cognom2, :usuario, :email, :clau, :tipus);");
    $insertQuery->execute(array(
        ':id' => '13',
        ':nom' => 'Pablo',
        ':Cognom1' => 'Romera',
        ':Cognom2' => 'Diaz',
        ':usuari' => 'promera',
        ':email' => '15586181.clot@fje.edu',
        ':clau' => '1234',
        ':tipus' => '4'
    ));

    $selectQuery = $databaseConnection->query("SELECT * FROM TABLA1 ORDER BY id");
    $rsResultat = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

    echo '<table border=1>';
    foreach ($rsResultat as $alumne) {
        echo '<tr>';
        echo '<td>' . $alumne['id'] . '</td>';
        echo '<td>' . $alumne['nom'] . '</td>';
        echo '<td>' . $alumne['Cognom1'] . '</td>';
        echo '<td>' . $alumne['Cognom2'] . '</td>';
        echo '<td>' . $alumne['usuari'] . '</td>';
        echo '<td>' . $alumne['email'] . '</td>';
        echo '<td>' . $alumne['clau'] . '</td>';
        echo '<td>' . $alumne['tipus'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>