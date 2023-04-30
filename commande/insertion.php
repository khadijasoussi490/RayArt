<html>
<head>
<title>Formulaire d'insertion</title>
<script src="https://kit.fontawesome.com/344a96aac8.js" crossorigin="anonymous"></script>
<meta charset="UTF-8">
<style>
body{
        text-align: center;
        font-size: 30px;
        

    }
    form{
        border: 1px dashed black;
        width: 400px;
        margin: auto;
        box-shadow: 0 0 20px rgb(255, 187, 0);
    }
    form input{
        margin-bottom: 20px;
    }
    .submit{
        color:white; width:150px;height:30px;background-color:blue;border-radius:20px;
    }
    .submit:hover{
background-color: rgb(255, 187, 0);
    }

   
</style>
</head>
<body>
<h3>Passer votre Commande</h3>
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'>
idClient    <input type="number" name="idClient"><br>
Code Produit   <input type="text" name="codeProduit"><br>
Quantité   <input type="number" value="1" min="1" pattern="[0-9]*" name="quantite"><br>
prix unitaire<input type="text" name="prixUnitaire"><br>
Date<input type="date" name="date"><br>
<input class="submit"type="submit" value="Ajouter au panier" size="50"><br>
<i class="fa-solid fa-cart-plus" style="color:rgb(255, 187, 0);font-size:30px;margin-top:-5px;margin-bottom:10px"></i><br>
</form>
    </body>
</html>

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'Commande.php';
include '../admin/ProductManager.php';
include '../client/ClientManager.php';
include 'CommandeManager.php';
if(empty($_POST['idClient'])||empty($_POST['codeProduit'])||empty($_POST['quantite'])||empty($_POST['prixUnitaire'])
||empty($_POST['date'])):
echo"<script>alert('il faut remplir tous les champs')</script>";
else:
$commande=new Commande(0,$_POST['idClient'],$_POST['codeProduit'],$_POST['quantite'],$_POST['prixUnitaire'],$_POST['date']);
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager=new CommandeManager($db);
$managerC= new ClientManager($db);
$managerP= new ProductManager($db);
if(!$managerC->get_exist($_POST['idClient'])){
echo"<script>alert('ce client n existe pas')</script>";
}
elseif(!$managerP->get_existCode($_POST['codeProduit'])){
 echo"<script>alert('ce Produit n'existe pas')</script>";   
}
else
{
    $manager->add($commande);
echo"<script>alert('Insertion effectuée avec succes')</script>";
} ;
endif;}

?>