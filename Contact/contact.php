<?php
class Contact
{
private int $id;
private string $sujet;
private string $email;
private string $doc;
private string $message;
public function __construct(int $id,string $sujet,string $email,string $doc,string $message)
{
$this-> id= $id;
$this-> sujet= $sujet;
$this-> email= $email;
$this-> doc= $doc;
$this-> message= $message;
}
public function getId():int
{return $this->id;}
public function setId(int $id)
{$this->id=$id;}
public function getSujet():string
{return $this->sujet;}
public function setSujet(string $sujet)
{$this->sujet=$sujet;}
public function getEmail():string
{return $this->email;}
public function setEmail(string $email)
{$this->email=$email;}
public function getDoc():string
{return $this->doc;}
public function setDoc(string $doc)
{$this->doc=$doc;}
public function getMessage():string
{return $this->message;}
public function setMessahe(string $message)
{$this->message=$message;}
}
?>