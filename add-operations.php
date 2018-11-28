<?php session_start();
//lien de la page d'accueil vers une autre page (opération)
//opération lien vers la page d'accueil + lien add (ajouter une nouvelle opération (libellé + un + ou -)
//opération id libellé et montant
//transaction (libellé et le montant)

class Transaction {
        private $label;
        private $montant;
}
if(!isset($_SESSION['tasks'])) {

    $_SESSION['tasks'] = array();

}
var_dump($_SESSION);
//session_destroy();
?><!doctype html>
<html lang="an">
<head>
    <meta charset="UTF-8">
    <title>Add operations</title>
</head>
<body>
    <form method="post">
        <table>
            <tbody>
                <tr>
                    <td><input type="text" name="label" placeholder="Label" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="montant" placeholder="Montant" /></td>
                </tr>
                <tr>
                    <td><button type="submit">OK</button></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>