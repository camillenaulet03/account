<?php
$host = 'localhost';
$port = 3306;
$database = 'test';
$login = 'root';
$password = '';

$label=(isset($_POST["label"])) ? $_POST["label"]:false;
$montant=(isset($_POST["montant"])) ? $_POST["montant"]:false;
$sauv=(isset($_GET["sauv"])) ? $_GET["sauv"]:false;
if ($sauv) {
    if (($label == "") || ($montant == "")) {
        echo " Merci de remplir tous les champs";
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $login, $password);
            //var_dump($pdo);
            $stmt = $pdo->prepare('INSERT INTO users (label, montant) VALUES (:label, :montant);');
            $stmt->bindParam(':label', $label, PDO::PARAM_STR);
            $stmt->bindParam(':montant', $montant, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            //var_dump($e->getMessage());
            var_dump("Vos identifiants de connexion à la base de données ne sont as corrects");
        } finally {
            $pdo = null;
            header('Location: operations.php');
        }
    }
}
?><!doctype html>
<html lang="an">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Add operations</title>
</head>
<body>
<form method="post" action="add-operations.php?sauv=ok">
    <table class="table">
        <tr>
            <td align="center"><input type="text" name="label" placeholder="Label" value="" /></td>
        </tr>
        <tr>
            <td align="center"><input type="number" name="montant" placeholder="Montant" value="" /></td>
        </tr>
        <tr>
            <td align="center"><button type="submit" class="btn btn-primary mb-2">0K</button></td>
        </tr>
    </table>
</form>
</body>
</html>