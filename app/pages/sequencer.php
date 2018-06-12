<div class="sequencer">
  <ul class="sequencer_keyboard">
    <li data-type="1" data-letter="a">a</li>
    <li data-type="1" data-letter="z">z</li>
    <li data-type="1" data-letter="e">e</li>
    <li data-type="1" data-letter="r">r</li>
    <li data-type="1" data-letter="t">t</li>
    <li data-type="2" data-letter="y">y</li>
    <li data-type="2" data-letter="u">u</li>
    <li data-type="2" data-letter="i">i</li>
    <li data-type="2" data-letter="o">o</li>
    <li data-type="2" data-letter="p">p</li>
    <li class="nested" data-type="3" data-letter="q">q</li>
    <li data-type="3" data-letter="s">s</li>
    <li data-type="3" data-letter="d">d</li>
    <li data-type="3" data-letter="f">f</li>
    <li data-type="3" data-letter="g">g</li>
    <li data-type="4" data-letter="h">h</li>
    <li data-type="4" data-letter="j">j</li>
    <li data-type="4" data-letter="k">k</li>
    <li data-type="4" data-letter="l">l</li>
    <li data-type="4" data-letter="m">m</li>
    <li class="double-nested" data-type="5" data-letter="w">w</li>
    <li data-type="5" data-letter="x">x</li>
    <li data-type="5" data-letter="c">c</li>
    <li data-type="5" data-letter="v">v</li>
    <li data-type="5" data-letter="b">b</li>
    <li data-type="5" data-letter="n">n</li>
  </ul>
  <?php require_once('partials/sequencer-sounds.php'); ?>
  <div class="sequencer_track">
    <div class="sequencer_toolbar">
      <div>
        <span class="button record"><img src="images/tracks/icon_record.svg"></span>
        <span class="button play"><img src="images/tracks/icon_play.svg"></span>
        <p class="timer"><span>00:00</span> / 01:00</p>
      </div>
      <div>
        <a href="" class="save">Save</a>
      </div>
    </div>
    <div class="sequencer_start-record"><p>Press <span>SHIFT</span> to start recording...</p></div>
    <ul class="sequencer_recorder">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
    <canvas id="song"></canvas>
  </div>
</div>
<div class="popup-save">
  <h3>It's done!</h3>
  <div class="popup-save_content">
    <div>
    </div>
    <div>
      <form method="post">
        <p>
          <label for="name">Name</label><br>
          <input id="name" type="text" name="name" placeholder="Fullname" />
        </p>
        <p>
          <label for="project">Project name</label>
          <input id="project" type="text" name="project" placeholder="Give a name to your project" />
        </p>
        <input class="track_file" type="file" name="track" />
      </form>
    </div>
  </div>
  <div class="popup-save_footer">
    <a href="" class="save-track" download>Download the track</a>
    <button class="submit">Publish</button>
  </div>
  <div class="popup-close">x</div>
</div>
