<?php
include_once 'db.php';

class products extends Db{
    public function getAllSanPham(){
        $sqla = parent::$connection->prepare("SELECT * FROM products");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function get10SP(){
        $sqla = parent::$connection->prepare("SELECT * FROM `products` inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` ORDER BY `id` DESC limit 10");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
    public function getTheoDanhMuc($id){
        $sqla = parent::$connection->prepare("SELECT * FROM `products` inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` WHERE `products`.`type_id`='$id'");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function get1SP($id){
        $sqla = parent::$connection->prepare("SELECT * FROM `products` inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` WHERE `products`.`id`='$id'");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function get10SPGiaCaoNhat(){
        $sqla = parent::$connection->prepare("SELECT * FROM `products` inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` ORDER BY `price` DESC limit 10");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function findSanPham($value){

        $sqla = parent::$connection->prepare("SELECT * FROM `products`inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` WHERE name like '%$value%' or id like '$value%' ");
        $items = [];
        $sqla -> execute();                 
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
   
    public function addSanPham($maSanPham, $tenSanPham,$price,$hinh,$mota,$maDanhMuc){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("INSERT INTO sanpham(maSP, tenSP, gia, hinh, mota, maDM)VALUES($maSanPham,$tenSanPham,$price,$hinh,$mota,$maDanhMuc);");
        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
            
    }
    public function delSanPham($id){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("DELETE FROM sanpham WHERE maDM='$id'");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function updateSanPham($tenSanPham,$price,$hinh,$mota,$maDanhMuc,$id){
        $sql =("UPDATE sanpham SET tenSP='$tenSanPham', gia=$price,hinh='$hinh', mota='$mota', maDM='$maDanhMuc' WHERE maSP='$id';");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Update successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function LMSearch($f,$lm, $s)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` WHERE `name` LIKE '%$s%'  LIMIT $f,$lm");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array 
    }
    public function LM($f,$lm)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`  inner join `protypes` on `products`.`type_id` = `protypes`.`type_id`LIMIT $f,$lm ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array 
    }
    public function getALLSearch($s)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` WHERE `name` LIKE '%$s%' ");
        $sql->execute();
        $items = 0;
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array 
    }
    public function LMID($f,$lm,$id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`  inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` WHERE `protypes`.`type_id` = '$id' LIMIT $f,$lm ");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array 
    }
   
}



?>