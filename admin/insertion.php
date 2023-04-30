<html>
<head>
<title>Formulaire d'insertion</title>
<meta charset="UTF-8">
<style>
    h3{
        margin: 10px 500px;
        font-size: 30px;
        text-align: center;
        color: rgb(255, 187, 0);
    }
    div{
        border:2px solid black;
        padding: 40px;
        margin: 20px 400px;
        font-size: 18px;
        box-shadow: 0 0 10px blue;
    }
    div:hover{
        box-shadow: 0 0 10px rgb(255, 187, 0);
    }
    label{
        margin-right: 10px;
        color: blue;
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
<h3>Formulaire d'ajout du produit</h3>
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype='multipart/form-data'>
<div><label>Code :</label><input type="text" name="code"><br>
<label>nom  :</label><input type="text" name="nom"><br>
<label>Catègorie :</label><br>

<input type="radio" id="Peinture Interieure" name="categorie" value="Peinture Interieure" checked="true">
<label style='color:black;font-weight:bold' for="Peinture Interieure">Peinture Interieure</label>

<input type="radio" id="Peinture Exterieure" name="categorie" value="Peinture Exterieure">
<label style='color:black;font-weight:bold' for="Peinture Exterieure">Peinture Exterieure</label><br>

<input style='margin-left:92px' type="radio" id="Enduit" name="categorie" value="Enduit">
<label style='color:black;font-weight:bold' for="Enduit">Enduit</label>

<input style='margin-left:102px'type="radio" id="Protection Bois" name="categorie" value="Protection Bois">
<label style='color:black;font-weight:bold' for="Protection Bois">Protection Bois</label><br>
<label>Size:</label><input type="text" name="size"><br>
<label>Price:</label><input type="text" name="price"><br>
<label>Photo du produit:</label><input type="file" name="photoproduit"><br>
<label>Description:</label><input style='height:100px;width:250px' type="text" name="description"><br>
</div>
<input class="submit"type="submit" value="Ajouter" size="50"><br>
</form>
</body>
</html>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'Product.php';
include 'ProductManager.php';
include 'Upload.php';
if(empty($_POST['code'])||empty($_POST['nom'])||empty($_POST['categorie'])||empty($_POST['size'])||empty($_POST['price'])||empty($_FILES['photoproduit']['name'])||empty($_POST['description'])):
echo "<script>alert('erreur il faut remplir tous les champs')</script>";
else:
if(!is_numeric($_POST['price'])):
echo "<script>alert('le prix doit être numérique')</script>";
else:
    $file = new Upload($_FILES["photoproduit"]);
    $file->setTypesValides(array('image/jpg','image/png','image/gif','image/webp'));
    $file->setMaxsize(10000000);
    $file->setRepertoire("admin/photos/");
    $cat=Product::P_INT;
if($_POST['categorie']=="Peinture Exterieure")
$cat=Product::P_EXT;
elseif($_POST['categorie']=="Enduit")
$cat=Product::P_END;
elseif($_POST['categorie']=="Protection Bois")
$cat=Product::P_BOIS;;
endif;
$product=new Product(0,$_POST['code'],$_POST['nom'],$cat,$_POST['size'],(float)$_POST['price'],$_FILES['photoproduit']['name'],$_POST['description']);
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new ProductManager($db);
if(!$manager->get_existCode($_POST['code'])){
$manager->add($product);
echo"<script>alert('insertion effectuée avec succès')</script>";
}else
echo "<script>alert('ce produit déjà existe')</script>";
endif;}?>
