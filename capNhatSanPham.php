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
        include_once 'sanphamDAO.php';
        $data = new sanpham();
        $id = $_GET['id'];
        echo "<br>";
        echo "Ma san pham can sua hien tai la: ".$id;
        echo "<br>";
        ?>
        <label for="name">Nhập tên san pham:</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="name">Nhập gia san pham:</label><br>
        <input type="text" name="gia" id="gia"><br>
        <label for="name">Nhập hinh san pham:</label><br>
        <input type="text" name="hinh" id="hinh"><br>
        <label for="name">Nhập mo ta san pham:</label><br>
        <input type="text" name="mota" id="mota"><br>
        <label for="name">Nhập ma danh muc san pham:</label><br>
        <input type="text" name="madanhmuc" id="madanhmuc"><br>
        <input type="submit" value="submit">
       
    </form>
    <?php    
        if(!empty($_POST['name']) &&!empty($_POST['gia'])&&!empty($_POST['mota'])&&!empty($_POST['madanhmuc'] && !empty($_POST['hinh'])))
        {
            $name = $_POST['name'];
            $gia = $_POST['gia'];
            $hinh = $_POST['hinh'];
            $mota = $_POST['mota'];
            $madanhmuc = $_POST['madanhmuc'];
            $data->updateSanPham($name,$gia,$hinh,$mota,$madanhmuc,$id); 
            //header('location: viewSanPham.php ');
        }
        
        

    
    ?>
</body>
</html>