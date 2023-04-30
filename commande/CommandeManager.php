<?php
/**
 * Summary of ProductManager
 */
class CommandeManager
{
public $db;//instance de PDO
public function __construct($db)
{ $this->setDb($db); }
public function setDb(PDO $db)
{ $this->db = $db; }
public function add(Commande $cmd)
{
$q=$this->db->prepare('INSERT INTO commande (id,idClient,codeProduit,quantite,prixUnitaire,MontantTotale,date) VALUES (0,:idClient,:codeProduit,:quantite,:prixUnitaire,:MontantTotale,:date)');
// Assignation des valeurs
$q->bindValue(':idClient', $cmd->getIdClient());
$q->bindValue(':codeProduit', $cmd->getCodeProduit());
$q->bindValue(':quantite', $cmd->getQuantite());
$q->bindValue(':prixUnitaire', $cmd->getPrixUnitaire());
$q->bindValue(':date', $cmd->getDate());
$q->bindValue(':MontantTotale', $cmd->getMontantTotale());
// Exécution de la requête.
$R=$q->execute();;
}
public function update(Commande $cmd)
{
$q = $this->db->prepare('UPDATE commande SET quantite = :quantite WHERE idClient = :idClient');
// Assignation des valeurs.
$q->bindValue(':quantite', $cmd->getQuantite());
$q->bindValue(':idClient', $cmd->getIdClient());
// Exécution de la requête.
$R=$q->execute();
}
public function delete(Commande $cmd)

{
$this->db->exec('DELETE FROM commande WHERE idClient ='.$cmd->getIdClient());
}
public function get($idClient){
    $cmds = array();
   
    $q = $this->db->prepare('SELECT * FROM commande where idClient like ?');
    $q->execute(array($idClient));
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
    
    $cmd=new Commande($donnees["id"],$donnees["idClient"],$donnees["codeProduit"], $donnees["quantite"],$donnees["prixUnitaire"],$donnees["date"]); 
    $cmds[]=$cmd;
}
    return $cmds;
}
public function get_exist($id):bool
{
    $id=(int)$id;
$q=$this->db->query('SELECT * FROM product WHERE id ='.$id);
if($q->rowCount())
return true;
return false;

}
public function getCommandes(){
    $cmds = array();
    $q =$this->db->query('SELECT * FROM commande');
    if($q->rowCount()){
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
        $cmd=new Commande($donnees["id"],$donnees["idClient"], $donnees["codeProduit"], $donnees["quantite"],$donnees["prixUnitaire"],$donnees["date"]); 
    
    $cmds[] =$cmd;
    }
    return $cmds;
    }
    return null;
} 
}
?>