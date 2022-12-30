
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">   
        <?php
        include_once 'nguoidungDAO.php';
        $data = new nguoidung();
        $id = $_GET['id'];
        echo "<br>";
        echo "Ma nguoi dung can sua hien tai la: ".$id;
        echo "<br>";
        ?>
        <label for="name">Nhập tên nguoi dung:</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="email">Nhập email nguoi dung:</label><br>
        <input type="text" name="email" id="email"><br>
        <label for="name">Nhap MK nguoi dung:</label><br>
        <input type="text" name="matkhau" id="matkhau"><br>
        <input type="submit" value="submit">
       
    </form>
    <?php    
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['matkhau']))
        {
            $name = $_POST['name'];
            $email =$_POST['email'];
            $matkhau= $_POST['matkhau'];
            $data->updateNguoiDung($id,$name,$email,$matkhau); 
            //header('location: viewDanhMuc.php ');
        }     
    ?>
</body>
</html>