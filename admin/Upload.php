<?php
class Upload
{
/** déclaration des propriétés et définition du constructeur**/
private int $maxsize;
private int $taille;
private string $nom;
private string $type;
private string $temp;
private string $repertoire;
private string $erreur;
private array $typesValides;
public function __construct(array $fichier){
$this->temp = $fichier['tmp_name'];
$this->nom = $fichier['name'];
$this->type =$fichier['type'];
$this->taille=$fichier['size'];
}
/** définition des accesseurs et des modificateurs **/
public function getMaxsize():int { return $this->maxsize;}
public function setMaxsize(int $max){ $this->maxsize = $max;}
public function setTypesValides(array $types){ $this->typesValides = $types;}
public function getTypesValides():array{ return $this->typesValides ;}
public function setRepertoire($rep){ $this->repertoire = $rep;}
public function getRepertoire():string{ return $this->repertoire ;}
public function uploadErreur():string{ return $this->erreur;}
public function setNom($nom){ $this->nom=$nom;}
public function getNom():string{ return $this->nom;}
public function getType():string{ return $this->type;}
public function setType($typ){ $this->type=$typ;}
public function setTaille($t){ $this->taille=$t;}
public function getTaille():int{ return $this->taille;}
public function __toString():string{ return $this->nom;}
/** définition string de la méthode d'upload du fichier **/
public function uploadFichier()
{
if(!in_array($this->type,$this->typesValides)) {
$this->erreur= "Le fichier <b>".$this->nom."</b> n'est pas un type valide";
return false;
}
elseif($this->taille>$this->maxsize){
$this->erreur="Impossible de copier le fichier: la taille du fichier est > à ".$this->maxsize;
return false;
}
elseif(!move_uploaded_file($this->temp, $this-> repertoire.$this->nom)) {
$this->erreur="Impossible de copier le fichier ".$this->nom;
return false;
}
else {
echo "**Transfert effectué avec succès**<br>";
return true;
}}
}
?>