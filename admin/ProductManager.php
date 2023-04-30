<?php
class ProductManager
{
public $db;//instance de PDO
public function __construct($db)
{ $this->setDb($db); }
public function setDb(PDO $db)
{ $this->db = $db; }
public function add(Product $prod)
{
$q = $this->db->prepare('INSERT INTO product (id,code,nom,categorie,size,price,photoproduit,pricepromo,description) VALUES (0,:cod,:nom,:cat,:size,:price,:photop,:pricepromo,:descr)');
// Assignation des valeurs
$q->bindValue(':cod', $prod->getCode());
$q->bindValue(':nom', $prod->getNom());
$q->bindValue(':cat', $prod->getCategorie());
$q->bindValue(':size', $prod->getSize());
$q->bindValue(':price', $prod->getPrice());
$q->bindValue(':pricepromo', $prod->getPricePromo());
$q->bindValue(':photop', $prod->getPhotoproduit());
$q->bindValue(':descr', $prod->getDescription());
// Exécution de la requête.
$R=$q->execute();;
}
public function update(Product $prod)
{
$q = $this->db->prepare('UPDATE product SET nom = :nom WHERE id = :id');
// Assignation des valeurs.
$q->bindValue(':nom', $prod->getNom());
$q->bindValue(':id', $prod->getId());
// Exécution de la requête.
$R=$q->execute();
}
public function delete(Product $prod)

{
$this->db->exec('DELETE FROM product WHERE id = '.$prod->getId());
}
public function get($nom){
    $products = array();
   
    $q = $this->db->prepare('SELECT * FROM product where nom like ?');
    $q->execute(array($nom));
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
    
    $prod=new Product($donnees["id"], $donnees["code"], $donnees["nom"],$donnees["categorie"],$donnees["size"],$donnees["price"],$donnees["photoproduit"],$donnees["description"]); 
    $products[]=$prod;
}
    return $products;
}
public function get_exist($id):bool
{
    $id=(int)$id;
$q=$this->db->query('SELECT * FROM product WHERE id ='.$id);
if($q->rowCount())
return true;
return false;

}
public function get_existCode($code): bool
{
    $stmt = $this->db->prepare('SELECT * FROM product WHERE code = :code');
    $stmt->bindValue(':code', $code);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        return true;
    }
    return false;
}
public function getProducts(){
    $products = array();
    $q =$this->db->query('SELECT * FROM product');
    if($q->rowCount()){
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
    $prod=new Product($donnees["id"], $donnees["code"], $donnees["nom"],$donnees["categorie"],$donnees["size"],$donnees["price"],$donnees["photoproduit"],$donnees["description"]);
    
    $products[] =$prod;
    }
    return $products;
    }
    return null;
} 

    public function DeviceCategory($categorie){
    $products = array();
   
    $q = $this->db->prepare('SELECT * FROM product where categorie like ?');
    $q->execute(array($categorie));
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
    
    $prod=new Product($donnees["id"], $donnees["code"], $donnees["nom"],$donnees["categorie"],$donnees["size"],$donnees["price"],$donnees["photoproduit"],$donnees["description"]); 
    $products[]=$prod;
}
    return $products;
}
}
?>