<?php
// Connection to database.
include_once('./partials/_config.php');

define(APP_MAX_UPLOAD, 200000);
define(APP_ACCEPTED_CONTENT_TYPES, ["audio/ogg"]);

// Check if the form isn't empty.
if (isset($_POST['name']) && isset($_POST['project'])) {
  $fullname = $_POST['name'];
  $project = $_POST['project'];

  // Check if we got a file.
  if ($_FILES['track']['error'] != 0){
    if ($_FILES['track']['error'] == UPLOAD_ERR_INI_SIZE){
      echo("Fichier trop gros! Taille supérieure au maximum de la configuration PHP");
    } else {
      echo("Erreur : Erreur upload #" . $_FILES['track']['error']);
    }
  }

  // Check if the file size doesn't exceed 200000 octets.
  if($_FILES['track']['size'] > APP_MAX_UPLOAD){
    echo("Erreur : Fichier trop gros! " . $_FILES['track']['size']." Octets contre ".APP_MAX_UPLOAD." permis.");
  }

  // Check if the file is an audio file.
  if(!in_array($_FILES['track']['type'], APP_ACCEPTED_CONTENT_TYPES)){
    echo("Erreur : Type de contenu refusé! " . $_FILES['track']['type']);
  }

  // Define upload directory and filename.
  $uploadDir = dirname(__FILE__)."/../uploads/";
  $fileName = uniqid().'.ogg';

  // Check if there is already a file with this name.
  if (file_exists($uploadDir.$fileName)){
    echo("Fichier déjà existant");
  }

  // Check if the upload directory is existing.
  if (!is_dir($uploadDir)){
    echo("Erreur : le répertoire d'upload n'existe pas");
  }

  // Check if we have the right to write.
  if (!is_writable($uploadDir)){
    echo("Erreur : le répertoire d'upload n'est pas accessible en écriture");
  }

  // Move the file to this directory. If it fails, it returns an error.
  if (!move_uploaded_file($_FILES['track']['tmp_name'], $uploadDir.$fileName)){
    echo("Erreur : Fichier temporaire inaccessible");
  } else {
    // Save track in database.
    $query = "INSERT INTO `upload` (`fullname`,`project`,`file`) VALUES (:fullname, :project, :file);";
    $request = $pdo->prepare($query);
    $request->bindValue(':fullname', $fullname);
    $request->bindValue(':project', $project);
    $request->bindValue(':file', $uploadDir.$fileName);
    $request->execute();

    // Return the location of the file.
    echo $uploadDir.$fileName;
  }
}
?>