
<?php require_once 'baglan.php'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
<h1 style="display: flex;justify-content: center;margin-top: 50px ">Veritabanı PDO İşlemleri</h1>
<hr>



<table class="table table-striped table-bordered">
    <thead class="thead-dark">
    <tr>
        <th>S.NO</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>E-Mail</th>
        <th>Şehir</th>
        <th width="50">İşlemler</th>
        <th width="50">İşlemler</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $bilgilerimisor = $db->prepare("SELECT * FROM bilgilerim");
    $bilgilerimisor->execute();
    $say=0;
    while ($bilgilerimcek = $bilgilerimisor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>
        <tr>
            <td> <?php echo $say; ?>  </td>
            <td><?php echo $bilgilerimcek["bilgilerim_ad"]; ?></td>
            <td><?php echo $bilgilerimcek["bilgilerim_soyad"]; ?></td>
            <td><?php echo $bilgilerimcek["bilgilerim_mail"]; ?></td>
            <td><?php echo $bilgilerimcek["bilgilerim_sehir"]; ?></td>
            <td align="center"><a href="duzenle.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id']?>"><button class="btn btn-primary btn-sm">Düzenle</button></a></td>
            <td align="center"><a href="islem.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id']?>&bilgilerimsil=ok"><button class="btn btn-danger btn-sm">Sil</button></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>




</form>
</body>
</html>