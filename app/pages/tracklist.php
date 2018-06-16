<?php

include_once('./partials/_config.php');

// Save track in database.
$query = "SELECT * FROM upload ORDER BY id DESC  LIMIT 50";
$prepare = $pdo->prepare($query);
$prepare->execute();
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- TRACK LIST - START -->
<section class="tracks">
  <h1>Tracks</h1>
  <h2>The beautiful songs of the users</h2>
  <div class="song">
    <ul class="playlist_top">
        <li>Title</li>
        <li>Artist</li>
        <li>Song</li>
    </ul>
    <ol>
      <?php
        foreach($data as $row) {
        // Retrieve file.
        $file = file_get_contents($row['file'], FILE_USE_INCLUDE_PATH);
        ?>
        <li class="music">
          <ul>
          <li class="title"><?php echo $row['project']; ?></li>
          <li class="artist"><?php echo $row['fullname']; ?></li>
          <audio preload src="data:audio/ogg;base64,<?php echo base64_encode($file); ?>"></audio>
        </ul>
      </li>
      <?php } ?>
    </ol>
  </div>
</section>
<!-- TRACK LIST - END -->