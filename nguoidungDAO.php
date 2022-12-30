<?php
include_once 'db.php';

class user extends Db{
    public function getAllNguoiDung(){
        $sqla = parent::$connection->prepare("SELECT * FROM user");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllOrder(){
        $sqla = parent::$connection->prepare("SELECT * FROM `order` inner join `products` on `order`.id = `products`.id");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function checkLoginAdmin($username,$password){
        $sql = self::$connection->prepare("SELECT * FROM `admin` WHERE `user_name`=? AND `password`=?");
        $password = md5($password);
        $sql->bind_param("ss",$username,$password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        }else{
            return false;
        }
    }
    public function checkLogin($username,$password){
        $sql = self::$connection->prepare("SELECT * FROM `user` WHERE `user_name`=? AND `password`=?");
        $password = md5($password);
        $sql->bind_param("ss",$username,$password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        }else{
            return false;
        }
    }
    public function findNguoiDung($value){
        
        $sqla = parent::$connection->prepare("SELECT * FROM `user` WHERE `user_name`='$value' ");
        $items = [];
        $sqla -> execute();                 
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function addNguoiDung($maND, $tenND,$maukhau,$email){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("INSERT INTO user(id, user_name, password, email)VALUES('$maND','$tenND',md5('$maukhau'),'$email');");
        
        if (parent::$connection->query($sql) === TRUE) {
            
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
        
    }
    public function delNguoiDung($id){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("DELETE FROM nguoidung WHERE maND='$id'");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function updateNguoiDung($maND,$tenND,$email,$matkhau){
        $sql =("UPDATE nguoidung SET tenND='$tenND',email='$email', matkhau='$matkhau' WHERE maND='$maND';");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Update successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function updateQty($id, $user, $qty){
        $sql =("UPDATE `order` SET `qty` = $qty WHERE `id`=$id and `user_name`='$user';");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Update successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function addOrder($user_name,$id,$qty,$price){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("INSERT INTO `order` VALUES('$user_name',$id,$qty,$price);");
        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
            
    }
    public function delOrder($user){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("DELETE FROM `order` WHERE `user_name`='$user'");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
}



?>