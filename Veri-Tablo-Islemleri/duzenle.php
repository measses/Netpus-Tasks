
<?php require_once 'baglan.php';


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php if (isset($_GET['durum'])): ?>
    <?php if ($_GET['durum'] == "ok"): ?>
        <div  class="alert alert-success" role="alert">
           <p style="display: flex;justify-content: center">İşlem Başarılı</p>
        </div>
    <?php elseif ($_GET['durum'] == "no"): ?>
        <div class="alert alert-danger" role="alert">
            İşlem Başarısız
        </div>
    <?php endif; ?>
<?php endif; ?>


<?php
            $bilgilerimisor = $db->prepare("SELECT * FROM bilgilerim where bilgilerim_id=:id");
            $bilgilerimisor->execute(array(
                    'id' => $_GET['bilgilerim_id'],
                ));

           $bilgilerimcek = $bilgilerimisor->fetch(PDO::FETCH_ASSOC);  ?>
<div class="text-center" style="display: flex; justify-content: center; align-items: center;">
    <form class="mt-5" action="islem.php" method="POST">
        <div class="form-group">
            <label for="ad">Ad:</label>
            <input type="text" class="form-control" id="ad" name="bilgilerim_ad" value="<?php echo $bilgilerimcek['bilgilerim_ad']?>" required>
        </div>
        <div class="form-group">
            <label for="soyad">Soyad:</label>
            <input type="text" class="form-control" id="soyad" name="bilgilerim_soyad" value="<?php echo $bilgilerimcek['bilgilerim_soyad']?>" required>
        </div>
        <div class="form-group">
            <label for="mail">Mail:</label>
            <input type="email" class="form-control" id="mail" name="bilgilerim_mail" value="<?php echo $bilgilerimcek['bilgilerim_mail']?>" required>
        </div>
        <div class="form-group">
            <label for="sehir">Şehir:</label>
            <input type="text" class="form-control" id="sehir" name="bilgilerim_sehir" value="<?php echo $bilgilerimcek['bilgilerim_sehir']?>" required>
        </div>
        <input type="hidden" value="<?php echo $bilgilerimcek['bilgilerim_id']?>" name="bilgilerim_id" >
        <button style="margin-top: 20px" type="submit" class="btn btn-primary" name="updateislem">Formu Düzenle</button>
        <a href="index2.php"> <button style="margin-top: 20px" type="button"  class="btn btn-danger" >Tabloya Dön</button></a>
    </form>
</div>






</body>
</html>