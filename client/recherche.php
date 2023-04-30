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
include 'Client.php';
include 'ClientManager.php';
$email=$_POST['email'];
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new clientManager($db);
$T=$manager->get($email);

if($T){
    
    echo"<h1>Voici la liste des clients cherchés </h1><table border=1>
<tr>
<th>id</th>
<th>nom</th>
<th>prenom</th>
<th>telephone</th>
<th>email</th>
<th>password</th>
</tr>";
foreach($T as $prod){
        echo
        "<tr><td>".$prod->getId()."</td>".
        "<td>".$prod->getNom()."</td>".
        "<td>".$prod->getPrenom()."</td>".
        "<td>".$prod->getNumeroTel()."</td>".
        "<td>".$prod->getEmail()."</td>".
        "<td>".$prod->getPsw()."</td>
        </tr>";
        
    }
    echo "</table>";}
else echo"<script>alert('aucun client trouvé avec cet email')</script>";
?>
</body>
</html>