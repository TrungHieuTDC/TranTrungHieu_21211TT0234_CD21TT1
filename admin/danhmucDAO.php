<?php
include_once 'db.php';

class protypes extends Db{
    public function getAllDanhMuc(){
        $sqla = parent::$connection->prepare("SELECT * FROM `protypes`");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function get1DanhMuc($id){
        $sqla = parent::$connection->prepare("SELECT * FROM `protypes` WHERE `type_id` ='$id'");
        $sqla -> execute();             
        $items = [];
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function findDanhMuc($value){

        $sqla = parent::$connection->prepare("SELECT * FROM protypes WHERE tenDM like '$value%' or maDM like '$value%'");
        $items = [];
        $sqla -> execute();                 
        $items = $sqla->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function addDanhMuc($maDanhMuc, $tenDanhMuc,$ghichu){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("INSERT INTO protypes VALUES('$maDanhMuc', '$tenDanhMuc','$ghichu');");
        if (parent::$connection->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
        
    }
    public function deldanhmuc($id){

        //$product ="INSERT INTO products(name,manu_id,type_id,price,image,description,feature,created_at)VALUES('Iphone14','10001','202201','32950000','14,75cmx7,85cm','May ma vang, dung luong 128GB','1',now());";
        $sql = ("DELETE FROM protypes WHERE type_id='$id'");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Delete successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
    public function updateDanhMuc($tenDanhMuc,$ghichu, $maDanhMuc){
        $sql =("UPDATE protypes SET type_name='$tenDanhMuc', ghichu='$ghichu' WHERE maDM='$maDanhMuc'");
        if (parent::$connection->query($sql) === TRUE) {
            echo "Update successfully";
            } else {
            echo "Error: " . $sql . "<br>" . parent::$connection->error;
            }
          parent::$connection->close();
    }
}



?>