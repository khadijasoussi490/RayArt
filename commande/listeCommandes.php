<html>
<head> <title>RayArt</title>
<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
rel="stylesheet">
<link rel="stylesheet" href="../style.css">
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
div button, div form{
    display: inline-block;
    

}
div button{
margin-left: -4px;
margin-bottom: -4px;
}
div form{
    margin-right: 320px;
    margin-left: 70px;

} 
div form input{
width:350px;
height: 40px;
}
div form button{
    height: 40px;
}
div>button{
    height: 40px;
    padding: 5px;
    width: 170px;
    margin-right: 10px;
    background-color: blue;
    border-radius: 10px;
} 
a{text-decoration: none;
font-size:16px;
color: white;}
div>button:hover{
background-color: rgb(255, 187, 0);
}
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
div button, div form{
    display: inline-block;
    

}
div form{
    margin-right: 320px;
    margin-left: 100px;

} 
div form input{
width:350px;
height: 40px;
}
div form button{
    height: 40px;
}

</style>

</head>
<body>
   
<h1>les commandes enregistrées </h1>
<div>
<form action="recherche.php" method="POST">
<input type="text" placeholder="Entrez Id Client" name="id">
<button><i class="material-icons-outlined">search</i></button>
</form>
<button><a href="insertion.php">Ajouter Commande</a></button>
<button><a href="modification.php">modifier quantité</a></button>
<button><a href="suppression.php">supprimer commande </a></button>
</div>
<?php
include 'Commande.php';
include 'CommandeManager.php';
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new CommandeManager($db);
$T=$manager->getCommandes();
if($T){
    echo"<table border=1>
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
    else echo"Pas de commande pour le moment";
 ?>
</body>

</html>
