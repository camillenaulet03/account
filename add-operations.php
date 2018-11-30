<?php session_start();
class Transaction {
    private $label;
    private $montant;

    public function setLabel($label)
    {
        $this->label = $label;
    }
    public function getLabel()
    {
        return $this->label;
    }
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
    public function getMontant()
    {
        return $this->montant;
    }
}

class Account extends Transaction {
    private $transactions;

    public function setTransaction($transactions)
    {
        $this->transactions = $transactions;
    }
    public function getTransactions()
    {
        return $this->transactions;
    }
    public function addTransaction(Transaction $transaction) {
        $this->transactions = $transaction;
    }
}

class User extends Account {
    private $accounts;

    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }
    public function getAccounts()
    {
        return $this->accounts;
    }
}
$transaction = new Transaction();
$account = new Account();
$account->addTransaction($transaction);
//var_dump($account);

$host = 'localhost';
$port = 3306;
$database = 'test';
$login = 'root';
$password = '';

$label=(isset($_POST["label"])) ? $_POST["label"]:false;
$montant=(isset($_POST["montant"])) ? $_POST["montant"]:false;

    try {
        if (($label=="") || ($montant=="")) {
            echo " Merci de remplir tous les champs";
        } else {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $login, $password);
        //var_dump($pdo);
        $stmt = $pdo->prepare('INSERT INTO users (label, montant) VALUES (:label, :montant);');
        $stmt->bindParam(':label', $label, PDO::PARAM_STR);
        $stmt->bindParam(':montant', $montant, PDO::PARAM_STR);
        $stmt->execute(); }
        //var_dump($stmt);
    } catch (PDOException $e) {
        //var_dump($e->getMessage());
        var_dump("Vos identifiants de connexion à la base de données ne sont as corrects");
    } finally {
        $pdo = null;
    }

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