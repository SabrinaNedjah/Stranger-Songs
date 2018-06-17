<?php
// Parse URL
$url = parse_url($_SERVER["REQUEST_URI"]);

// Inject different kind of audio based on type.
switch ($url['query']) {
  case 'type=1': ?>

  <!--DRUM -->
    <audio class="hi-hat" src="  " data-key="65"></audio>
    <audio class="kick" src=" " data-key="90"></audio>
    <audio class="open-hat" src=" " data-key="69"></audio>
    <audio class="snare" src=" " data-key="82"></audio>
    <audio class="open-hat" src=" " data-key="84"></audio>

 <!--PERCUSSION -->
    <audio class="snare" src=" " data-key="89"></audio>  
    <audio class="hi-hat" src=" " data-key="85"></audio>
    <audio class="kick" src=" " data-key="73"></audio>
    <audio class="open-hat" src=" " data-key="79"></audio>
    <audio class="snare" src=" " data-key="80"></audio>

  <!--BASS -->
    <audio class="open-hat" src=" " data-key="81"></audio>
    <audio class="snare" src=" " data-key="83"></audio>
    <audio class="hi-hat" src=" " data-key="68"></audio>
    <audio class="kick" src=" " data-key="70"></audio>
    <audio class="open-hat" src=" " data-key="71"></audio>

  <!--FX -->
    <audio class="snare" src=" " data-key="72"></audio>
    <audio class="open-hat" src=" " data-key="74"></audio>
    <audio class="snare" src=" " data-key="75"></audio>  
    <audio class="hi-hat" src=" " data-key="76"></audio>
    <audio class="kick" src=" " data-key="77"></audio>

  <!--MELODY -->
    <audio class="open-hat" src=" " data-key="87"></audio>
    <audio class="snare" src=" " data-key="88"></audio>
    <audio class="open-hat" src=" " data-key="67"></audio>
    <audio class="snare" src=" " data-key="86"></audio>
    <audio class="open-hat" src=" " data-key="66"></audio>
    <audio class="snare" src=" " data-key="78"></audio>
    <?php
    break;

    case 'type=2': ?>
   
    <?php
    break;

    case 'type=3': ?>
  

    <?php
    break;

  default:
    // code...
    break;
}
?>
