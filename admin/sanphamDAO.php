<?php
include_once 'db.php';

class products extends Db{
    public function getAllSanPham(){
        $sqla = parent::$connection->prepare("SELECT * FROM products inner join `protypes` on `products`.`type_id` = `protypes`.`type_id`");
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
    public function getSPMoiNhat(){
        $sqla = parent::$connection->prepare("SELECT * FROM `products` inner join `protypes` on `products`.`type_id` = `protypes`.`type_id` ORDER BY `id` DESC limit 1");
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
    public function addSanPham($maSanPham, $tenSanPham,$maDanhMuc,$price,$hinh,$hinh2,$hinh3,$hinh4,$mota,$detail){ 

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("INSERT INTO products VALUES('$maSanPham','$tenSanPham','$maDanhMuc',$price,'$hinh','$hinh2','$hinh3','$hinh4','$mota','$detail');");
        if (parent::$connection->query($sql) === TRUE) {
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
            
    }
    public function delSanPham($id){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("DELETE FROM products WHERE `id`='$id'");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function updateSanPham($id,$tenSanPham,$maDanhMuc,$gia,$hinh,$hinh2, $hinh3, $hinh4, $mota){
        $hinhanh="UPDATE products SET name='$tenSanPham',type_id='$maDanhMuc',price=$gia, description ='$mota',";
        if($hinh !=""){
            $hinhanh.="pro_image='$hinh',";
        }
        $hinhanh= substr($hinhanh,0,-1);
        $hinhanh.=" WHERE id='$id'";
        $sql =($hinhanh);
        if (parent::$connection->query($sql) === TRUE) {
            echo "Update successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
}



?>