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

        $sqla = parent::$connection->prepare("SELECT * FROM user WHERE user_name = '$value'");
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
        $sql = ("DELETE FROM user WHERE user_name='$id'");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function updateNguoiDung($tenND,$email,$matkhau){
        $sql =("UPDATE user SET  `password`='$matkhau' ,email='$email' WHERE user_name='$tenND';");
        echo "UPDATE user SET  `password`='$matkhau' ,email='$email' WHERE user_name='$tenND';";
        if (parent::$connection->query($sql) === TRUE) {
            echo "Update successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
}



?>