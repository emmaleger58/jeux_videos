include/<?php

include "include/head.php";
include "include/navbar.php";
include "include/config.php";


$id = $_GET['id'];
try {
$sql = $db->prepare("SELECT id,nom, description, type, taux_alcool, prix, origine, note, image
                      FROM alcool
                        WHERE id = $id ");
$sql->execute();
$rows = $sql->fetchAll();
} catch(PDOException $e) {
  echo "connection failed: " . $e->getMessage();
}
foreach ($rows as $row) {
}
?>
<div class="bodyblack text-dark pt-4">
  <div class="container text-center">
    <img src="<?php echo $row['image']?>" alt="">
    <h1 class="text-center"><?php echo $row['nom']?></h1>
    <div class="text-center">
    <?php echo  $row['description']?>
  </div>
    <div class="container d-flex flex-row">

    </div>
  </div>
</div>
