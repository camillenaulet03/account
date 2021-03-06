<?php
class Personnage
{
    private $id;
    private $label;
    private $montant;

    public function __construct(array $array=array())
    {
        $this->hydrate($array);
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }


    public function getLabel()
    {
        return $this->label;
    }


    public function getMontant()
    {
        return $this->montant;
    }


    public function setId($id)
    {
        //on vérifie qu'il s'agit bien d'une chaine de caractère
        if(is_string($id))
        {
            $this->id=$id;
        }
    }


    public function setLabel($label)
    {
        //on vérifie qu'il s'agit bien d'une chaine de caractère
        if(is_string($label))
        {
            $this->label=$label;
        }
    }


    public function setMontant($montant)
    {
        //on vérifie qu'il s'agit bien d'une chaine de caractère
        if(is_string($montant))
        {
            $this->montant=$montant;
        }
    }
}


$host = 'localhost';
$port = 3306;
$database = 'test';
$login = 'root';
$password = '';
?><!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Operation</title>
</head>
<body>
<button><a href="add-operations.php" class="badge badge-dark">Add-Opérations</a></button>
<button><a href="index.php" class="badge badge-dark">Accueil</a></button>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Libellé</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody class="thead-light">
        <?php
        try
        {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $login, $password);
        $reponse = $pdo->query("SELECT id, label, montant FROM users");
        while ($donnees = $reponse->fetch()) {
            $perso = new Personnage($donnees);
            //var_dump($perso); ?>
            <tr>
                <td class=""><?php echo $perso->getId(); ?></td>
                <td><?php echo $perso->getLabel(); ?></td>
                <td><?php echo $perso->getMontant(); ?></td>
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
} ?>
