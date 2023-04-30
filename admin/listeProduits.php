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
div form{
    margin-right: 520px;
    margin-left: 100px;

} 
div form input{
width:350px;
height: 40px;
}
div form button{
    height: 40px;
}
td img{
    width: 50px;
    height: 50px;
}

div form input{
width:350px;
height: 40px;
}
div form button{
    height: 40px;
}
button{
    height: 40px;
    padding: 5px;
    width: 200px;
    margin-right: 10px;
    background-color: blue;
    border-radius: 10px;
    margin-top: 10px;
    margin-bottom: 20px;
} 
a{text-decoration: none;
font-size:18px;
font-weight: bolder;
color: white;}

</style>

</head>
<body>
   
<h1>les Produits enregistrées </h1>
<button><a href="modification.php">modifier un produit</a></button>
<button><a href="suppression.php">supprimer un produit</a></button>
</div>
<?php
include 'Product.php';
include 'ProductManager.php';
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new ProductManager($db);
$T=$manager->getProducts();
echo"<table border=1>
<tr>
<th>image Produit</th>
<th>id</th>
<th>code</th>
<th>nom</th>
<th>categorie</th>
<th>size</th>
<th>price</th>
<th>price Promo</th>
<th>Description</th>
</tr>";
foreach($T as $prod){
    echo
    "<tr><td><img src=photos/".$prod->getPhotoproduit()."></td>
    <td>".$prod->getId()."</td>".
    "<td>".$prod->getCode()."</td>".
    "<td>".$prod->getNom()."</td>".
    "<td>".$prod->getCategorie()."</td>".
    "<td>".$prod->getSize()."</td>".
    "<td>".$prod->getPrice()."</td>".
    "<td>".$prod->getPricePromo()."</td>".
    "<td>".$prod->getDescription()."</td>".
   
    "</tr>";
    
}
echo "</table>";
 ?>
</body>

</html>
