<?php
class ContactManager
{
public $db;//instance de PDO
public function __construct($db)
{ $this->setDb($db); }
public function setDb(PDO $db)
{ $this->db = $db; }
public function add(Contact $contact)
{
$q = $this->db->prepare('INSERT INTO contact (id,sujet,email,doc,message) VALUES (0,:sujet,:email,:doc,:message)');
// Assignation des valeurs
$q->bindValue(':sujet', $contact->getSujet());
$q->bindValue(':email', $contact->getEmail());
$q->bindValue(':doc', $contact->getDoc());
$q->bindValue(':message', $contact->getMessage());
// Exécution de la requête.
$R=$q->execute();;
if (!$R)
{echo "envoi non réussi";}
else
{echo "envoi réussi";
}
}
}
?>