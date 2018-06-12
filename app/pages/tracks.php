<?php
include 'partials/_config.php';
?>
<section class="tracks">
    <h1>Tracks</h1>
    <h2>The beautiful songs of the users</h2>
    <div class="player">
        <a href="#popup">
        <div class="button_play">
                Keyboard Options
            </div>
        </a>
        <div id="popup">
          <div class="popup">
              <img src="images/tracks/ARROW_1.png" alt="arrow">
              <p>Next track</p>
              <img src="images/tracks/ARROW_2.png" alt="arrow">
              <p>Previous track</p>
              <img src="images/tracks/SPACE.png" alt="arrow">
              <p>Play/pause</p>
        </div>
  </div>
    </div>
    <div class="song">
    <ul class="playlist_top">
        <li>Title</li>
        <li>Artist</li>
        <li>Time</li>
        <li>Share</li>
    </ul>
    <ol>
    <?php 
    $req = $pdo->prepare('SELECT * FROM upload ORDER BY id  DESC');
    $req->execute();
    $results = $req->fetchAll();
    
  
  
  foreach($results as $_results):
  ?>

            <ul>
            
            <li>
           
                <li class="title"><?= $_results->project ?></li>
                <li class="artist"><?= $_results->fullname ?></li>
                <audio controls>
                    <source src="<?= $_results->file ?>" type="audio/ogg">
                    </audio>  </li>

                
        </li>
        </ul>
<?php 
 

endforeach; ?>
        </ol>
    </div>
</section>