<?php
include 'bdd/config.php';
?>
<section class="tracks">
    <h1>Tracks</h1>
    <h2>The beautiful songs of the users</h2>
    <div class="player">
        <audio id="audio" preload="auto" tabindex="0" type="audio/mpeg" controls>
            <source type="audio/mp3">
            Sorry, your browser does not support HTML5 audio.
        </audio>
        <a href="#popup">
        <div class="button_play">
                Keyboard Options
            </div>
            <div class="button_rect">
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
    <?php foreach($tracks as $song):?>
        <li class="music"><a href="#" data-src="<?= $song->Link ?>"></a>
            <ul>
                <li class="title"><?= $song->Title ?></li>
                <li class="artist"><?= $song->Artist ?></li>
                <li class="time"><?= $song->Time ?></li>
                <li class="share"><a href="about"><?= $song->Share ?></a></li>
            </ul>
        </li>
        <?php endforeach; ?>
        </ol>
    </div>
</section>

