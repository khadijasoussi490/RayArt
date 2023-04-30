<?php
class ClientManager
{

public $db;
public function __construct($db){$this->setDb($db);}
public function setDb(PDO $db){ $this->db = $db;}
public function add(Client $client){
    // $statement = $this->db->prepare();
    $q = $this->db->prepare('INSERT INTO client (id, nom, prenom,codePostal,ville,numerotel, email, psw) VALUES (0,:nom,:prenom,:codePostal,:ville,:numerotel,:email,:psw)');

    $q->bindValue(':nom',$client->getNom());
    $q->bindValue(':prenom',$client->getPrenom() );
    $q->bindValue(':codePostal',$client->getCodePostal() );
    $q->bindValue(':ville',$client->getVille() );
    $q->bindValue(':numerotel',$client->getNumeroTel() );
    $q->bindValue(':email',$client->getEmail() );
    $q->bindValue(':psw',$client->getPsw() );
    // Exécution de la requête.
    $R=$q->execute();;

    }
    public function update(Client $client)
    {
    $q = $this->db->prepare('UPDATE client SET numerotel = :numerotel WHERE id = :id');
    // Assignation des valeurs.
    $q->bindValue(':numerotel', $client->getNumeroTel());
    $q->bindValue(':id', $client->getId());
    // Exécution de la requête.
    $R=$q->execute();
    }
    public function delete(Client $client)
    
    {
    $this->db->exec('DELETE FROM client WHERE id = '.$client->getId());
    }
    public function get($email){
        $clients = array();
       
        $q = $this->db->prepare('SELECT * FROM client where email like ?');
        $q->execute(array($email));
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
        
        $client=new Client($donnees["id"], $donnees["nom"], $donnees["prenom"],$donnees["codePostal"],$donnees["ville"],$donnees["numerotel"],$donnees["email"],$donnees["psw"]); 
        $clients[]=$client;
    }
        return $clients;
    }
    public function get_exist($id):bool
    {
        $id=(int)$id;
    $q=$this->db->query('SELECT * FROM client WHERE id ='.$id);
    if($q->rowCount())
    return true;
    return false;
    
    }
    public function getClients(){
        $clients = array();
        $q =$this->db->query('SELECT * FROM client');
        if($q->rowCount()){
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $client=new Client($donnees["id"], $donnees["nom"], $donnees["prenom"],$donnees["codePostal"],$donnees["ville"],$donnees["numerotel"],$donnees["email"],$donnees["psw"]); 
        
        $clients[] =$client;
        }
        return $clients;
        }
        return null;
    } 
    
}?>