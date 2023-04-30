<?php
session_start ();
$clients=[ "admin1"=>array("login"=>"soussikhadija101@gmail.com",

"pwd"=>"0000","nom"=>"Khadija Soussi"),

"admin2"=>array("login"=>"salmadrira@gmail.com","pwd"=>"salma","nom"=>"Salma Drira" )];
if (isset($_POST['login']) && isset($_POST['pwd'])) {
$valide=false;
foreach ($clients as $index => $value){
if ($value["login"] == $_POST['login'] && $value["pwd"]==$_POST['pwd']){
$_SESSION['login'] = $_POST['login'];
$_SESSION['pwd'] = $_POST['pwd'];
$_SESSION['indice']=$index;
$_SESSION['nom']=$value['nom'];
$valide=true;
break;
}
}
if($valide)
header("location:admin/page_admin.php");
else
header("location:login.html");

}
// if (isset($_POST['login']) && isset($_POST['psw'])) {
//     include'client/Client.php';
//     include'client/ClientManager.php';
//     try{
//         $db = new PDO('mysql:host=localhost;port=3300;dbname=bdproducts','root','');
//         $manager=new ClientManager($db);
//         $client=$manager->getClientLogin($_POST['login'],$_POST['psw']);
//         if(!empty($client))
//         {
//             $_SESSION['login'] = $client->getEmail();
//             $_SESSION['psw'] = $client->getPsw();
//             $_SESSION['nom']=$client->getNom();
//             $_SESSION['prenom']=$client->getPrenom();
//             header("location:admin/page_admin.php");
//         }
//         else
//         header("location:login.html");
//     }catch(PDOException $e){ echo $e->getMessage();} 
// }
else
echo "Les variables du formulaire ne sont pas déclarées.";?>