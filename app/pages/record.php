<?php

if (isset($_POST['name']) && $_POST['project']) {
  $fullname = $_POST['name'];
  $project = $_POST['project'];

  echo $fullname.$project;

  // TODO:
  // - Générer un ID unique
  // - Stocker le fichier sur le serveur
  // - Associer le lien du fichier sur le serveur avec l'ID unique.
  // - Générer un lien de partage qui contient l'ID unique
  // - Créer la page de partage sur lesquels les visiteurs arriveront et pourront écouter la musique.
}
?>
