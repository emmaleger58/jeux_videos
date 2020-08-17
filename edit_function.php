<?php
include "config.php";


// $id = $_GET['id'];
if (isset($_POST['submit'])) {
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $type = $_POST['type'];
  $taux_alcool = $_POST['taux_alcool'];
  $prix = $_POST['prix'];
  $origine = $_POST['origine'];
  $note = $_POST['note'];
  $image = $_POST['image'];

try {
$stmt = $conn->prepare("UPDATE alcool SET nom = :nom, description = :description, type = :type, taux_alcool = :taux_alcool, prix = :prix, origine = :origine, note = :note, image = :image WHERE id = 1");

if (!empty($_FILES['new_image']['name'])){
$filename = $_FILES['new_image']['name'];
           $target_files = 'img/'.$filename;
           $file_extension = pathinfo($target_files,PATHINFO_EXTENSION);
           $file_extension = strtolower($file_extension); // convertir notre chaine de character en miniscule
           $valid_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');
           // on vérifie si le fichier a une extension valide
           if (in_array($file_extension,$valid_extension)) {
          if (move_uploaded_file($_FILES['new_image']['tmp_name'],$target_files)) {}}}
          else {
            $target_files = $image ;
          }

$stmt->execute(array(
  ':nom'=>$nom,
  ':description'=>$description,
  ':type'=>$type,
  ':taux_alcool'=>$taux_alcool,
  ':prix'=>$prix,
  ':origine'=>$origine,
  ':note'=>$note,
  ':image'=>$target_files,
));
}

catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}


try {
$sql = $conn->prepare("SELECT nom, description, type, taux_alcool, prix, origine, note, image
                        FROM alcool
                         WHERE id = 1
                        ");
$sql->execute();
$texts = $sql->fetchAll();
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

foreach ($texts as $text) {
}
 ?>
