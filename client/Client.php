<?php
class Client
{ private int $id;
private int $numerotel,$codePostal;
private string $nom, $prenom, $email, $psw,$ville;
public function __construct(int $id, string $nom,string $prenom,int $codePostal,string $ville,int $numerotel, string $email,string $psw) {
$this->id=$id;
$this->numerotel=$numerotel;
$this->nom=$nom;
$this->prenom=$prenom;
$this->codePostal=$codePostal;
$this->ville=$ville;
$this->email=$email;
$this->psw=$psw;
} 
public function getId():int{return $this->id;}
public function setId(int $id){$this->id=$id;}
public function getNom():string {return $this->nom;}
public function setNom(string $nom){$this->nom=$nom;}
public function getPrenom():string{return $this->prenom;}
public function setPrenom(string $prenom){$this->prenom=$prenom;}
public function getCodePostal():int{return $this->codePostal;}
public function setCodePostal(int $codePostal){$this->codePostal=$codePostal;}
public function getVille():string{return $this->ville;}
public function setVille(string $ville){$this->ville=$ville;}
public function getEmail():string{return $this->email;}
public function getNumeroTel():int{return $this->numerotel;}
public function setNumeroTel(int $numerotel){$this->numerotel=$numerotel;}
public function setEmail(string $email){$this->email=$email;}
public function getPsw():string{return $this->psw;}
public function setPsw(string $psw){$this->psw=$psw;}


}?>