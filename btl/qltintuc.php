
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="lienket.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>QUẢN TRỊ</title>
</head>      
<body>
        <div id=”wrapper”>
            
            <?php include('header1.php'); ?>
            <div style="text-align: center;">
                <h1 style="margin-top:30px">QUẢN LÝ TIN TỨC</h1>  
                <a href="qltintuc.php?tt=them">Thêm tin tức</a>
                <a href="qltintuc.php?tt=listtt">Danh sách tin tức</a>
            </div>

                
                 <?php
                    if(isset($_GET['tt'])){
                        $id=$_GET['tt'];}else{
                            $id='listtt';
                        }

                    if(!isset($id) OR $id=='listtt'){
                        include('listtt.php');
                    } else
                    
                    if(isset($_GET['tt'])&& $id=='them' ){
                        include('themtt.php');
                    }else if(isset($_GET['tt'])&& $id=='sua' ){
                        include('suatt.php');
                    }else if(isset($_GET['tt'])&& $id=='xoa' ){
                        include('xoatt.php');
                    }

                     
                 ?>
            
            <?php include('footer.php'); ?>
        </div>
       
   
</body>
</html>