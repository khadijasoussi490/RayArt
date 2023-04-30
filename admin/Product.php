<?php
class Product
{
private int $id;
private string $code;
private string $nom;
private string $categorie;
private string $size;
private float $price;
private float $pricepromo;
public const TAUX_PROMO=0.85;
public string $photoproduit;
public string $description;
public const P_INT="Peinture Interieure";
public const P_EXT="Peinture Exterieure";
public const P_END="Enduit";
public const P_BOIS="Protection Bois";
public function __construct(int $id,string $code,string $nom,string $categorie,String $size,float $price,String $photoproduit,String $description)
{
$this-> id= $id;
$this-> code= $code;
$this-> nom= $nom;
$this-> categorie= $categorie;
$this-> size= $size;
$this-> price= $price;
$this-> photoproduit= $photoproduit;
$this-> description= $description;
$this->pricepromo=$this->price*self::TAUX_PROMO;
}
public function getId():int{return $this->id;}
public function setId(int $id){$this->id=$id;}
public function getCode():string
{return $this->code;}
public function setCode(string $code)
{$this->code=$code;}
public function getNom():string
{return $this->nom;}
public function setNom(string $nom)
{$this->nom=$nom;}
public function getCategorie():string
{return $this->categorie;}
public function setCategorie(string $categorie)
{$this->categorie=$categorie;}
public function getSize():string 
{return $this->size;}
public function setSize(string $size)
{$this->size=$size;}
public function getPrice():float
{return $this->price;}
public function setPricePromo(float $pricepromo)
{$this->price=$pricepromo;}
public function getPricePromo():float
{return $this->pricepromo;}
public function setPrice(float $price)
{$this->price=$price;}

public function getPhotoproduit():string
{return $this->photoproduit;}
public function setPhotoproduit(string $photoproduit)
{$this->photoproduit=$photoproduit;}
public function getDescription():string
{return $this->description;}
public function setDescription(string $description)
{$this->description=$description;}
}
?>