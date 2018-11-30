<?php
$host = 'localhost';
$port = 3306;
$database = 'test';
$login = 'root';
$password = '';
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<button><a href="add-operations.php">Add-Opérations</a></button>
<button><a href="index.php">Accueil</a></button>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Libellé</th>
        <th>Montant</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try
    {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $login, $password);
    $reponse = $pdo->query("SELECT * FROM users");
    while ($donnees = $reponse->fetch()) {
        ?>
        <tr>
            <td><?php echo $donnees['id'];?></td>
            <td><?php echo $donnees['label'];?></td>
            <td><?php echo $donnees['montant'];?></td>
        </tr>
    <?php }
    $reponse->closeCursor();
    ?>
    </tbody>
</table>
</body>
</html>
<?php }
catch (PDOException $pdoE)
{
    echo 'PDO Exception: <br/>'.$pdoE->getMessage();
}
?>