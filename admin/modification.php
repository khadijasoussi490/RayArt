<html>
<head>
<title>Formulaire de modification</title>
<meta charset="UTF-8">
<style>
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
<h3>Formulaire de mise à jour des produits</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
<div>
<label>Id Produit</label><input type="number" name="id"><br>
<label>Nom   </label><input type="text" name="nom">
</div>
<input type="submit" class="submit"value="Modifier" size="50">
</form>
</body>
</html>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'Product.php' ;
include 'ProductManager.php';
$prod = new Product($_POST['id'],'',$_POST['nom'],"","",0,"","");
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new ProductManager($db);
if($manager->get_exist($_POST['id'])){
$manager->update($prod);
echo"<script>alert('Modification effectuée avec succès')</script>";
 }
 else
 echo"<script>alert('ce produit n existe pas')</script>";
}
?>