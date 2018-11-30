<?php
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

} catch (PDOException $e) {
    //var_dump($e->getMessage());
    var_dump("Vos identifiants de connexion à la base de données ne sont as corrects");
} finally {
    $pdo = null;
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add operations</title>
    <link rel="stylesheet" type="text/css" href="hide.css">
</head>
<body>
<form method="post" align="center">
    <input type="text" name="label" placeholder="Label" value="" /><br>
    <input type="text" name="montant" placeholder="Montant" value="" /><br>
</form>
<?php if ($label = ""  && $montant = "") { ?>
    <button align="center" class="ex1" type="submit">OK</button>
<?php } else { ?>
    <button align="center" type="submit">OK</button>
<?php } ?>

</body>
</html>