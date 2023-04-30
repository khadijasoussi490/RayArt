<html>
<head>
     <title>RayArt</title>
     <link rel="stylesheet" href="style.css">
     <style>
h1{
    text-align: center;
    font-size: 30px;
    margin: auto;
    padding-bottom: 15px;
}
table{
    font-size: 25px;
    text-align: center;
    margin: auto;
}
th,td{
    padding: 10px;
}
th{
    color: blue;
}
</style>
</head>
<body>
<?php
include 'Commande.php';
include 'CommandeManager.php';
$i=$_POST['id'];
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new CommandeManager($db);
$T=$manager->get($i);

if($T){
    echo"
    <h1>Voici la commande cherchée </h1> <table border=1>
<tr>
<th>Code Commande</th>
<th>Id Client</th>
<th>Code Produit</th>
<th>Quantité</th>
<th>Prix Unitaire</th>
<th>Montant Totale</th>
<th>Date de Livraison</th>
</tr>";
foreach($T as $prod){
        echo
        "<tr><td>".$prod->getId()."</td>".
        "<td>".$prod->getIdClient()."</td>".
        "<td>".$prod->getcodeProduit()."</td>".
        "<td>".$prod->getQuantite()."</td>".
        "<td>".$prod->getPrixUnitaire()."</td>".
        "<td>".$prod->getMontantTotale()."</td>".
        "<td>".$prod->getDate()."</td>
        </tr>";
        
    }
    echo "</table>";}
else echo"<script>alert('aucune commande trouvée pour ce client')</script>";
?>
</body>
</html>