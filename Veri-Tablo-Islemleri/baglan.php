
<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=udemy;charset=utf8", 'root', '');

    //echo "Veritabanı Bağlantısı Başarılı";

} catch(PDOException $e) {
echo $e->getMessage();
}
?>