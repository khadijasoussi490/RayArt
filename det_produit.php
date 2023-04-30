<html>
<head> <title>Page Affichage</title> 
<link href="../html/style.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/344a96aac8.js" crossorigin="anonymous"></script></head>
<style>
h1{text-align:center;font-size: 25px;color:blue}
.product-div img{width: 350px ;height:400;display: block;margin: auto;}
.product-section {display: flex;flex-wrap: wrap;justify-content: space-between; padding: 20px;margin-left: 20px;}
.product-div2 {border:1px solid #333;box-shadow:2px 2px 5px #333;width:65%;height:500px;margin-bottom:10px;text-align:center;}
.product-div2 h3 {padding: 20px; margin: 0;}
.product-div2 h2 {color:red;font-size:15px;}
.product-div2 button { background-color: #333;color:#fff;padding:10px 30px;border: none;border-radius: 5px;margin-top: 5px;}
</style>
<body>
<?php
include 'admin/Product.php';
include 'admin/ProductManager.php';
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$code = $_GET['code'];
$stmt = $db->prepare("SELECT * FROM product WHERE code = ?");
$stmt->execute([$code]);
$prod = $stmt->fetch(PDO::FETCH_ASSOC); //cree instance de prod apres l'obtenir

echo"<section class=\"product-section\">";
echo "<div class=\"product-div\">";
echo'<img src=admin/photos/'.$prod['photoproduit'].'></div>';
echo "<div class=\"product-div2\">";
echo "<h1>".$prod['nom']."</h1>";
echo "<h3>Référence: ".$prod['code']."</h3>";
echo "<h3>Catègorie: ".$prod['categorie']."</h3>";
echo "<h4>".$prod['description']."</h4>";
echo'<p style="color:#2fe218;font-weight:bold;font-size:20px;margin:0px"><i class="fa-sharp fa-solid fa-check" style="color:#2fe218; font-size:20px"></i> En Stock</p>';
echo "<h3>size: ".$prod['size']."</h3>";
echo "<h2><s>".$prod['price']." dt</s></h2>";
echo "<h2>".$prod['pricepromo']."TND</h2>";
echo "Quantité   <input type=\"number\" value=\"1\" min=\"1\" pattern=\"[0-9]*\" name=\"quantite\"><br>";
echo "<button>Commender</button></div></section>";
 ?>