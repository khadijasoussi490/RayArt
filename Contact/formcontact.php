<html>
<head>
<title>Formulaire d'inscription</title>
<meta charset="UTF-8">
<style>
    body{
        margin-left: 350px;
        margin-top: 50px;
       

    }
   table{
        border: 1px solid blue;
        padding: 20px;
        box-shadow: 0 0 20px blue;
        font-size: 24px;
    }
    h1{
        margin-bottom: 30px;
        color: blue;
    }
    table:hover{
        box-shadow: 0 0 30px blue;
    }
    .submit:hover{
        background-color:rgb(255, 187, 0);
        border-color: rgb(255, 187, 0);
    }
    .submit{
        margin-left:450px;margin-top:10px;background-color: blue;
            width: 100px;
            height: 34px;
            border-radius: 5px;
            padding: 4px;
            color:white;
            border-color:blue;
    }

</style>
</head>
<body>
<h1>Contactez-nous</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<table>
<tr><td>sujet</td><td><input type="text" name="sujet"></td></tr>
<tr><td>Email:</td><td><input type="email" name="email"></td></tr>
<tr><td>Document Joint</td><td><input type="file" name="doc"></td></tr>
<tr><td>Message</td><td><textarea name="message" id="" maxcols="10" rows="6"></textarea></td></tr>
<tr><td></td><td><input type="checkbox">J'accepte les conditions générales <br>et la politique de confidentialité</td>
</tr>
</table>
<input  class="submit"type="submit" value="Envoyer" size="50">
</form></body></html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'contact.php';
include 'contactmanager.php';
include '../admin/Upload.php';
if(empty($_POST['sujet'])||empty($_POST['email'])||empty($_FILES['doc']['name'])||empty($_POST['message'])):
echo "<script>alert('erreur il faut remplir tous les champs')</script>";
else:
    $file = new Upload($_FILES['doc']);
    $file->setTypesValides(array('doc/text','doc/pfd'));
    $file->setMaxsize(10000000);
    $file->setRepertoire("contact/");
$contact=new Contact(0,$_POST['sujet'],$_POST['email'],$_FILES['doc']['name'],$_POST['message']);
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new ContactManager($db);
echo "<script>alert('Formulaire Envoyée')</script>";
$manager->add($contact);
endif;}
?>