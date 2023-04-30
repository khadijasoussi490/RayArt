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
    width: 150px;
    margin-right: 10px;
    background-color: blue;
    border-radius: 10px;
} 
a{text-decoration: none;
font-size:16px;
color: white;}


</style>

</head>
<body>
   
<h1>les clients enregistrées </h1>
<div>
<form action="recherche.php" method="POST">
<nav>
<input type="text" placeholder="donner l'email du client" name="email">
<button><i class="material-icons-outlined">search</i></button>
</nav>
</form>
<button><a href="inscription.php">ajouter un client</a></button>
<button><a href="modifcation.php">modifier le numero</a></button>
<button><a href="suppression.php">supprimer un client</a></button>
</div>
<?php
include 'Client.php';
include 'ClientManager.php';
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new ClientManager($db);
$T=$manager->getClients();
echo"<table border=1>
<tr>
<th>id</th>
<th>nom</th>
<th>prenom</th>
<th>code postal</th>
<th>Ville</th>
<th>telephone</th>
<th>email</th>
<th>password</th>
</tr>";
foreach($T as $prod){
    echo
    "<tr><td>".$prod->getId()."</td>".
    "<td>".$prod->getNom()."</td>".
    "<td>".$prod->getPrenom()."</td>".
    "<td>".$prod->getCodePostal()."</td>".
    "<td>".$prod->getVille()."</td>".
    "<td>".$prod->getNumeroTel()."</td>".
    "<td>".$prod->getEmail()."</td>".
    "<td>".$prod->getPsw()."</td>
    </tr>";
    
}
echo "</table>";
 ?>
</body>

</html>
