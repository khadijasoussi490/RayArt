<?php
class Commande
{
private int $id;
private int $idClient;
private string $codeProduit;
private int $quantite;
private float $prixUnitaire;
private float $montantTotale;
private string $date ;
public function __construct(int $id,int $idClient,string $codeProduit,int $quantite,float $prixUnitaire,string $date)
{
$this->id= $id;
$this->idClient=$idClient;
$this->codeProduit=$codeProduit;
$this->quantite=$quantite;
$this->prixUnitaire=$prixUnitaire;
$this->montantTotale=$this->quantite*$this->prixUnitaire;
$this->date=$date;
}
public function getId():int{return $this->id;}
public function setId(int $id){$this->id=$id;}
public function getIdClient():int{return $this->idClient;}
public function setIdClient(int $idClient){$this->idClient=$idClient;}
public function getcodeProduit():string{return $this->codeProduit;}
public function setIdProduit(string $codeProduit){$this->codeProduit=$codeProduit;}
public function getQuantite():int{return $this->quantite;}
public function setQuantite(int $quantite){$this->quantite=$quantite;}
public function getPrixUnitaire():float{return $this->prixUnitaire;}
public function setPrixUnitaire(float $prixUnitaire){$this->prixUnitaire=$prixUnitaire;}
public function getMontantTotale():float{return $this->montantTotale;}
public function setMontantTotale(float $montantTotale){$this->montantTotale=$montantTotale;}
public function getDate():string{return $this->date;}
public function setDate(string $date){$this->date=$date;}
} 
?>