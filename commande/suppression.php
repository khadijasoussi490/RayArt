<html>
<head>
<title>FormulaireSuppression</title>
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
h3{
        margin: 10px 500px;
        font-size: 40px;
        text-align: center;
        color: rgb(255, 187, 0);
    }
    div{
        border:2px solid black;
        padding: 40px;
        margin: 20px 400px;
        font-size: 25px;
        box-shadow: 0 0 10px blue;
    }
    div:hover{
        box-shadow: 0 0 10px rgb(255, 187, 0);
    }
    label{
        margin-right: 10px;
        color: blue;
        font-weight: bold;
    }
    input{
        margin-bottom: 10px;
    }
    .submit{
        margin-left:750px;margin-top:-5px;background-color: blue;
            width: 100px;
            height: 34px;
            border-radius: 5px;
            padding: 4px;
            color:white;
            border-color:blue;
    }.submit:hover{
        background-color:rgb(255, 187, 0);
        border-color: rgb(255, 187, 0);
    }
    input:hover{
        box-shadow: 0 0 20px rgb(255, 187, 0);
    }



</style>
</head>
<body>
<h3>Formulaire de Suppression d'une commande</h3>
<form Method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<div>
<label>Id Commande</label><input type="number" name="idClient">
</div>
<input class="submit"type="submit" name="submit" value="Supprimer">
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'Commande.php';
include 'CommandeManager.php';
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new CommandeManager($db);
$i=$_POST['idClient'];
$cmd = new Commande(0,$i,"",0,0,"");
if($manager->get($i)){
$manager->delete($cmd);

echo"<script>alert('suppression effectuée avec succès')</script>";
}
else 
echo"<script>alert('Aucune Commande pour ce client')</script>";
}
?>