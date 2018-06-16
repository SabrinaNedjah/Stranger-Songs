<?php
// Parse URL
$url = parse_url($_SERVER["REQUEST_URI"]);

// Inject different kind of audio based on type.
switch ($url['query']) {
  case 'type=1': ?>
    <audio class="hi-hat" src="sounds/hi-hat.mp3" data-key="65"></audio>
    <audio class="kick" src="sounds/kick.mp3" data-key="90"></audio>
    <audio class="open-hat" src="sounds/open-hat.mp3" data-key="69"></audio>
    <audio class="snare" src="sounds/snare.mp3" data-key="82"></audio>
    <audio class="open-hat" src="sounds/open-hat.mp3" data-key="84"></audio>
    <audio class="snare" src="sounds/snare.mp3" data-key="78"></audio>
    <?php
    break;

    case 'type=2': ?>
    <audio class="hi-hat" src="sounds/hi-hat.mp3" data-key="65"></audio>
    <audio class="kick" src="sounds/kick.mp3" data-key="90"></audio>
    <audio class="open-hat" src="sounds/open-hat.mp3" data-key="69"></audio>
    <audio class="snare" src="sounds/snare.mp3" data-key="82"></audio>
    <audio class="open-hat" src="sounds/open-hat.mp3" data-key="84"></audio>
    <audio class="snare" src="sounds/snare.mp3" data-key="89"></audio>
    <?php
    break;

    case 'type=3': ?>
    <audio class="hi-hat" src="sounds/hi-hat.mp3" data-key="65"></audio>
    <audio class="kick" src="sounds/kick.mp3" data-key="90"></audio>
    <audio class="open-hat" src="sounds/open-hat.mp3" data-key="69"></audio>
    <audio class="snare" src="sounds/snare.mp3" data-key="82"></audio>
    <audio class="open-hat" src="sounds/open-hat.mp3" data-key="84"></audio>
    <audio class="snare" src="sounds/snare.mp3" data-key="89"></audio>
    <?php
    break;

  default:
    // code...
    break;
}
?>
