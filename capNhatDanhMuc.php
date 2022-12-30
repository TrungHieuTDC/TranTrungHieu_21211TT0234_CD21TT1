
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
        include_once 'danhmucDAO.php';
        $data = new danhmuc();
        $id = $_GET['id'];
        echo "<br>";
        echo "Ma danh muc can sua hien la la: ".$id;
        echo "<br>";
        ?>
        <label for="name">Nhập tên danh muc:</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="name">Nhập ghi chu:</label><br>
        <input type="text" name="ghichu" id="ghichu"><br>
        <input type="submit" value="submit">
       
    </form>
    <?php    
        if(!empty($_POST['name']) && !empty($_POST['ghichu']))
        {
            $name = $_POST['name'];
            $ghichu =$_POST['ghichu'];
            $data->updateDanhMuc($name,$ghichu,$id); 
            //header('location: viewDanhMuc.php ');
        }     
    ?>
</body>
</html>