<!-- SEQUENCER - START -->
<div class="sequencer">
<!-- POP UP HELP - START -->
<aside id="popup">
    <div class="menu_help">
      <h4>Help</h4>
      <div class="help">
        <div class="square_options">
          <div class="square red"></div>
          <p>Drums</p>
        </div>
        <div class="square_options">
          <div class="square purple"></div>
          <p>Percussion</p>
        </div>
        <div class="square_options">
          <div class="square orange"></div>
          <p>Bass</p>
        </div>
        <div class="square_options">
          <div class="square pink"></div>
          <p>FX</p>
        </div>
        <div class="square_options">
          <div class="square dark_purple"></div>
          <p>Melody</p>
        </div>
      </div>
      <h4>Keyboard options</h4>
      <div class="keyboard_options">
        <div class="square_options azerty active">Azerty</div>
        <div class="square_options qwerty">Qwerty</div>
      </div>
      <div class="popup-close_help">x</div>
    </div>
</aside>
<!-- POP UP HELP - END -->
<!-- SEQUENCER KEYBOARD - START -->
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
<!-- SEQUENCER KEYBOARD - END -->
<!-- SEQUENCER TRACK - START -->
  <div class="sequencer_track">
    <div class="sequencer_toolbar">
      <div>
        <span class="button record"><img src="images/tracks/icon_record.svg"></span>
        <span class="button play"><img src="images/tracks/icon_play.svg"></span>
        <p class="timer"><span>00:00</span> / 01:00</p>
      </div>
      <a href="#popup">
        <div class="button_play">
        Options
        </div>
      </a>
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
<!-- SEQUENCER TRACK - END -->
<!-- POP UP SAVE - START -->
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
    <div class="discover">
      <a href="category"><button class="replay">Replay</button></a>
      <a href="tracklist">Discover Tracks List</a>
    </div>
  </div>
  <div class="popup-close">x</div>
</div>
<!-- POP UP SAVE - START -->
<!-- SEQUENCER - END -->

