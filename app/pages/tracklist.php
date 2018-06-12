<?php

include_once('./partials/_config.php');

// Save track in database.
$query = "SELECT * FROM upload LIMIT 50";
$prepare = $pdo->prepare($query);
$prepare->execute();
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
?>
<ul>
  <?php
    foreach($data as $row) {
      // Retrieve file.
      $file = file_get_contents($row['file'], FILE_USE_INCLUDE_PATH);
  ?>
    <li>
        <h5><?php echo $row['id']; ?></h5>
        <p><?php echo $row['project']; ?></p>
        <audio controls="controls" src="data:audio/ogg;base64,<?php echo base64_encode($file); ?>"></audio>
        <br>
    </li>
  <?php } ?>
</ul>
