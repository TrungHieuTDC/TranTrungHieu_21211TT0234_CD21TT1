<?php
	session_start();
     include_once 'db.php';
     include_once 'sanphamDAO.php';
     $data = new products();
	include_once 'danhmucDAO.php';
	$danhmuc=new protypes();
    include_once 'nguoidungDAO.php';
    $nguoidung= new user();
    $temp = $data->get1SP($_GET['id']);
    $check = false;
    $i = 0;
    $batky = $nguoidung->getAllOrder();
    
        foreach ($nguoidung->getAllOrder() as $key => $value) {
            # code...
            if($_GET['id']==$value['id'] && $_SESSION['user']==$value['user_name']){
                $check =true;
                $i=$value['qty'];
                break;
            }
        }
    
    
    if($check==false){
        $nguoidung->addOrder($_SESSION['user'], $_GET['id'],1, $temp[0]['price']);
        
    }
    else{
        $nguoidung->updateQty($_GET['id'], $_SESSION['user'],$i+1);
    }
    header("location: index.php");
?>