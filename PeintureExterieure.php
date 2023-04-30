<html>
<head> <title>RayArt</title>
<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-XX1rdpOGnNfUDBXsN6iMNjBLuAIjB4V7H1jzMszR10E2SvS1jsl8l3qzFQ+h7jzA" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/344a96aac8.js" crossorigin="anonymous"></script>

<style>

footer {
  background-color: #f2f2f2;
  padding: 20px;
  display: flex;
  justify-content: center;
}

.newsletter {
  max-width: 600px;
  text-align: center;
}

.newsletter h3 {
  font-size: 24px;
  margin-bottom: 10px;
}

.newsletter p {
  font-size: 14px;
  margin-bottom: 20px;
}

.newsletter form {
  display: flex;
  justify-content: center;
  align-items: center;
}

.newsletter input[type="email"] {
  padding: 10px;
  border-radius: 5px;
  border: none;
  width: 300px;
  font-size: 16px;
}

.newsletter button[type="submit"] {
  padding: 10px;
  border-radius: 5px;
  border: none;
  background-color: blue;
  color: #fff;
  margin-left: 10px;
  font-size: 16px;
  cursor: pointer;
}
.social-media a {
  display: inline-block;
  margin-right: 10px;
  color:rgb(255, 187, 0);
  font-size: 24px;
  transition: all 0.3s ease;
}

.social-media a:hover {
  color: blue;
}

.social-media i {
  display: inline-block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  border-radius: 50%;
  border: 2px solid rgb(255, 187, 0);
}


footer h3 {
  margin-top: 0;
  font-weight: bold;
}

footer ul {
  list-style: none;
  padding-left: 0;
}

footer ul li {
  margin-bottom: 5px;
}
footer {
    padding: 20px 0;
  }
  
  .col-sm-6 {
    margin-bottom: 20px;
    margin-right:100px;
    display: inline-block;
    text-align: center;
  }
  
.row{
  text-align: center;
}
.logo img{
 width:450px;
 height:100px
}
.mid-section {
  margin-right:350px;
  margin-left: 100px;
}
.mid-section form{
  padding-top:-50px;
}
.mid-section form button{
  background-color: rgb(255, 187, 0);
}
.fa-solid{
  font-size: 40px;
}
img{
  margin-bottom:-20px;
}
.nav {
  background-color:blue;
  height:40px;
  width: 1171px;
  margin-left: 60px;
  font-size: 20px;
}
.nav li{
  margin-left: 35px;
  margin-top: 5px;
  border-right:3px solid white ;
 
}

.nav li a{
  color:white;
  font-weight: bold;
  text-decoration: none ;
}
.nav li a:hover,.fa-house:hover{
  color:rgb(255, 187, 0);
}
.container li{
  padding-bottom:6px;
}
.container button, .container button a{
    background-color: blue;
    color: white;
    padding: 5px;
    border-radius: 5px;
    border-color: white;
    text-decoration: none;
}
.fa-solid{
  font-size: 24px;
  margin-right: px;
}
.social-icons{
  margin-right:1100px;
  
}
.fa-cart-shopping{
  font-size:24px;
}
.container{
    width: 280px;
    height: 320px;
    display: inline-block;
    border: 1px solid black;
    margin: 10px;
    padding:5px;
}
.container:hover{
  box-shadow: 0 0 10px blue;
}
.container img{
  margin-bottom: 2px;
  margin-top:-12px;
}
</style>

</head>
<body>
<header>
        <nav>
            <ul class="list1">
            <li Cass="liv"> <div class="social-icons"></div>Livraison Gratuite à partir de 99 TND d'achat sur toute la Tunisie</li>
            <li><a href="login.html"><i class="fa-solid fa-right-to-bracket" style=" color:rgb(250, 195, 43);"></i></a></li>
                <li><a href="client/inscription.php"><i class="fa-solid fa-user-plus" style=" color:rgb(250, 195, 43);"></i></a></li>
            </ul>
        
            <ul class="list1">
                <img src="admin/photos/logo1.jpg">
                <li class="mid-section">
                    <form action="recherche.php" method="POST">
                        <input type="text" placeholder="chercher un produit" name="nom">
                        <button><i class="material-icons-outlined">search</i></button>
                    </form>
                </li>
            </ul>
            <ul class="list1 nav">
               <li><a href="index.php"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a></li>
                <li><a href="PeintureInterieure.php">Peinture Interieure</a></li>
                <li><a href="PeintureExterieure.php">Peinture Exterieure</a></li>
                <li><a href="Enduit.php">Enduit</a></li>
                <li><a href="ProtectionBois.php">Protection Bois</a></li>
                <li><a href="Contact/formcontact.php">Contactez-nous</a></li>
                <li><a href="commande/insertion.php"><i class="fa-solid fa-cart-shopping" style=" color:rgb(250, 195, 43);"></i></a></li>
            </ul>
        </nav>
    </header>
   
    <h1>Les Produits de la Peinture Exterieure</h1>
<?php
include 'admin/Product.php';
include 'admin/ProductManager.php';
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new ProductManager($db);

$T=$manager->DeviceCategory(Product::P_EXT);

foreach($T as $prod){
    echo"<div class='container'><ul><li><img src=admin/photos/".$prod->getPhotoproduit()."></li>".
    "<li style='margin-left:30px;font-weight:bolder;font-size:22px;color:blue;'> ".$prod->getNom()."</li>".
    "<li> Réference : ".$prod->getCode()."</li>".
    "<li> Catégorie : ".$prod->getCategorie()."</li>".
    "<li style='color:red;font-weight:bold'>".$prod->getPricePromo()." TND   <s style='color:grey;margin-left:6px;'> ".$prod->getPrice()."TND</s></li>".
    "<button><a href='commande/insertion.php'>Ajouter Au Panier</a></button>
    <a href=\"det_produit.php?code=".$prod->getCode()."\"><button>Voir détails</button>";
    echo "</a></ul></div>";
}
 ?>
</body>
<footer>

  <div class="newsletter">
    <h3>Newsletter</h3>
    <p>Recevez les dernières actualités directement dans votre boîte mail.</p>
    <form action="" method="post">
      <input type="email" name="email" placeholder="Entrez votre adresse e-mail" required>
      <button type="submit">S'abonner</button>
    </form>
    <br>
    
  <div class="social-media">
    <h3>SUIVEZ NOUS!</h3>
    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a><br><br>
    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
  </div>
  </div>
<div class="containerf">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <h3>Informations</h3>
        <ul>
          <li>Conditions génerales de vente</li>
          <li>Mentions legales</li>
          <li>Livraison et Paiement</li>
          <li>Plan du site</li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-6">
        <h3>En savoir plus</h3>
        <ul class="liste-unstyled">
          <li><a>Choisir vos teintes de peinture</a></li>
          <li><a>Fiches Conseils</a></li>
          <li><a>Nos partenaires et amis</a></li>
          <li><a>Compte Pros</a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-6">
        <h3>Nos Magasins</h3>
        <ul class="liste-unstyled">
          <li>RayArt</li>
          <li>km 7 rue saltniya 3000 Sfax</li>
          <li>Tel : 74 301 887</li>
          <li>Fax : 02 98 03 61 51</li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-6">
        <h3>Nos Point De Vente</h3>
        <ul class="liste-unstyled">
          <li>Socièté Ezzihra</li>
          <li> rue Tayeb Mhiri 5100 Sousse</li>
          <li>Tel : 74 897 120</li>
          <li>Fax : 32 98 83 67 51</li>
        </ul>
      </div>
      
    </div>
  </div>
  
</footer>
<div class="row">
      <div class="col-md-12">
        <hr style="color:rgb(255, 187, 0)">
        <p class="text-center" style="font-weight:bold;color:blue">&copy; 2023 RayArt.com. All rights reserved.</p>
      </div>
    </div>
</html>
