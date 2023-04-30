<?php
session_start();
if(date("H")<18)
$bienvenue="Bonjour";
else
$bienvenue="Bonsoir";
?>
<html>
<head>
<title></title>
<style>
    body{
        text-align: center;
        margin-top: 40px;
    }
            button{ 
            background-color: blue;
            margin: 10px;
            width: 200px;
            height: 50px;
            border-radius: 5px;
            padding: 4px;
        }
        button:hover{
            background-color:rgb(255, 187, 0);
        }
            a{
                color: white;
                font-size: 20px;
                text-decoration: none;
            }
            h4{
                color:rgb(255, 187, 0);
            }
        </style>
</head>
<body>
<?php
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) :?>
<h3><?= $bienvenue ." et bienvenue ".$_SESSION['nom']." dans votre espace personnel"?></h3>
<h4>Votre login est: <?= $_SESSION['login']?></h4>
<button><a href="insertion.php">Ajouter Un Produit</a></button><br>
<button><a href="listeProduits.php">Liste Produits</a></button><br>
<button><a href="../commande/listeCommandes.php">Liste Commandes</a></button><br>
<button><a href="../client/listeClient.php">Liste Clients</a></button><br>
<button><a href="Quitter.php">Déconnexion</a></button>
<?php else :
echo 'Les variables de sessions ne sont pas déclarées.';
endif;?>
</body>
</html>