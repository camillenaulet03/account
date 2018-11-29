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
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        while($users = $stmt->fetch()) {
            //var_dump($users['id']);
            //var_dump($users['label']);
            //var_dump($users['montant']);
            foreach($users as $cle=>$valeur){
                //echo $cle.' : '.$valeur.'<br>';
                $id = $users['id'];
                $label = $users['label'];
                $montant = $users['montant'];
                //var_dump($users);
            };

        }
        ?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $label;?></td>
                <td><?php echo $montant;?></td>
            </tr>
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