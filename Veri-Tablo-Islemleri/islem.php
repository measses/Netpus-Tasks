
<?php
require_once 'baglan.php';

if (isset($_POST['insertislem'])){


    $kaydet = $db->prepare("INSERT into bilgilerim set
                           
        bilgilerim_ad =:bilgilerim_ad,
        bilgilerim_soyad =:bilgilerim_soyad,
        bilgilerim_mail =:bilgilerim_mail,
        bilgilerim_sehir =:bilgilerim_sehir");

    $insert=$kaydet->execute(array(

        'bilgilerim_ad'=> $_POST['bilgilerim_ad'],
        'bilgilerim_soyad'=> $_POST['bilgilerim_soyad'],
        'bilgilerim_mail'=> $_POST['bilgilerim_mail'],
        'bilgilerim_sehir'=> $_POST['bilgilerim_sehir']

    ));
if ($insert){
    //echo "Success";

    Header("Location:index2.php?durum=ok");
    exit;
} else {
    //echo "Error";
    Header("Location:index2.php?durum=no");
    exit;
}


}
if (isset($_POST['updateislem'])){
    $bilgilerim_id=$_POST['bilgilerim_id'];

        $kaydet = $db->prepare("UPDATE bilgilerim set
                           
        bilgilerim_ad =:bilgilerim_ad,
        bilgilerim_soyad =:bilgilerim_soyad,
        bilgilerim_mail =:bilgilerim_mail,
        bilgilerim_sehir =:bilgilerim_sehir
        where bilgilerim_id={$_POST['bilgilerim_id']}
        ");

    $insert=$kaydet->execute(array(

        'bilgilerim_ad'=> $_POST['bilgilerim_ad'],
        'bilgilerim_soyad'=> $_POST['bilgilerim_soyad'],
        'bilgilerim_mail'=> $_POST['bilgilerim_mail'],
        'bilgilerim_sehir'=> $_POST['bilgilerim_sehir']

    ));
    if ($insert){
        //echo "Success";

        Header("Location:duzenle.php?durum=ok&bilgilerim_id=$bilgilerim_id");
        exit;
    } else {
        //echo "Error";
        Header("Location:duzenle.php?durum=no&$bilgilerim_id");
        exit;
    }
}

if (isset($_GET['bilgilerimsil']) && $_GET['bilgilerimsil'] == "ok") {

    $sil = $db->prepare("DELETE FROM bilgilerim WHERE bilgilerim_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['bilgilerim_id'],
    ));
    if ($kontrol) {
        Header("Location:index2.php?durum=ok");
        exit;
    } else {
        Header("Location:index2.php?durum=no");
        exit;
    }
}

?>