<?php session_start();
//lien de la page d'accueil vers une autre page (opération)
//opération lien vers la page d'accueil + lien add (ajouter une nouvelle opération (libellé + un + ou -)
//opération id libellé et montant
//transaction (libellé et le montant)

$host = 'localhost';
$port = 3306;
$database = 'test';
$login = 'root';
$password = '';

$label=(isset($_POST["label"])) ? $_POST["label"]:false;
$montant=(isset($_POST["montant"])) ? $_POST["montant"]:false;
try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $login, $password);
    //var_dump($pdo);
    $stmt = $pdo->prepare('INSERT INTO users (label, montant) VALUES (:label, :montant);');
    $stmt->bindParam(':label', $label, PDO::PARAM_STR);
    $stmt->bindParam(':montant', $montant, PDO::PARAM_STR);
    $stmt->execute();
    //var_dump($stmt);
    while($users = $stmt->fetch()) {
        //var_dump($users['label']);
    }
} catch (PDOException $e) {
    //var_dump($e->getMessage());
    var_dump("Vos identifiants de connexion à la base de données ne sont as corrects");
} finally {
    $pdo = null;
}

class Transaction {
        private $label;
        private $montant;
}

//var_dump($_SESSION);
//session_destroy();
?><!doctype html>
<html lang="an">
<head>
    <meta charset="UTF-8">
    <title>Add operations</title>
</head>
<body>
    <form method="post">
        <input type="text" name="label" placeholder="Label" value="" />
        <input type="text" name="montant" placeholder="Montant" value="" />
        <button type="submit" class="btn btn-primary mb-2">OK</button>
    </form>
        <table>
            <tbody>
            </tbody>
        </table>
</body>
</html>