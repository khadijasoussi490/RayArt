<html>
<head>
<title>Formulaire d'inscription</title>
<meta charset="UTF-8">
<style>
    h3{color:rgb(255, 187, 0);}
    .submit {
        background-color:blue;width:140px;height:30px;border-radius:10px;border-color:blue;
    }
    .submit:hover{
        background-color:rgb(255, 187, 0) ;
        border-color: rgb(255, 187, 0);
    }
</style>
</head>
<body>
<div style="margin:40px 450px;border:1px solid black;padding:20px;box-shadow:0px 0px 10px blue">
<h3>JE SUIS UN NOUVEAU CLIENT</h3>
<p>Merci de bien renseigner tous les champs de saisie.</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h3>INFORMATIONS PERSONNELLES</h3>
<table>
<tr><td>Nom :</td><td><input type="text" name="nom"></td></tr>
<tr><td>Prénom:</td><td><input type="text" name="prenom"></td></tr>
<tr><td>Téléphone:</td><td><input type="text" name="numerotel"></td></tr>
<tr><td>Code Postal</td><td><input type="number" name="codePostal"></td></tr>
<tr><td>ville</td><td><input type="text" name="ville"></td></tr>
</table>
<br>
<input type="radio" id="l1" >
<label for="l1">Je souhaite bénéficier par e-mail et/ou SMS des promotions et des réductions exclusives de RayArt</label><br><br>
<h3>PARAMETRES DE CONNEXION</h3>
<table>
<tr><td>Email:</td><td><input type="email" name="email"></td></tr>
<tr><td>Mot de passe:</td><td><input type="password" name="psw"></td></tr>
<tr><td>Validation du mot de passe:</td>
<td><input type="password" name="validation"></td></tr>
<tr><td></td></tr>
<tr><td></td><td> <input class="submit"type="submit" value="S'inscrire" size="70"></td>
</tr>
</table>
</form>
</div></body></html>

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'Client.php';
include 'ClientManager.php';
if(empty($_POST['nom'])||empty($_POST['prenom'])||empty($_POST['numerotel'])
||empty($_POST['email'])||empty($_POST['psw'])||empty($_POST['validation'])):
echo"<script>alert('il faut remplir tous les champs')</script>";
else:
if($_POST['psw']!==$_POST['validation']):
echo 'mot de passe non valide';
else:
$client=new Client(0,$_POST['nom'],$_POST['prenom'],$_POST['codePostal'],$_POST['ville'],$_POST['numerotel'],$_POST['email'],$_POST['psw']);
$db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
$manager = new ClientManager($db);
if(!$manager->get($_POST['email'])){
$manager->add($client);
echo"<script>alert('inscription effectuée avec succès')</script>";}
else
echo"<script>alert('ce email est déjà utilisé')</script>";
endif;
endif;

}
?>