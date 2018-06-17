<?php
// Parse URL
$url = parse_url($_SERVER["REQUEST_URI"]);

// Inject different kind of audio based on type.
switch ($url['query']) {
  case 'type=1': ?>

  <!--DRUM -->
    <audio class="hi-hat" src="sounds/80s/Drums/1.mp3" data-key="65"></audio>
    <audio class="kick" src="sounds/80s/Drums/2.mp3" data-key="90"></audio>
    <audio class="open-hat" src="sounds/80s/Drums/3.mp3" data-key="69"></audio>
    <audio class="snare" src="sounds/80s/Drums/4.mp3" data-key="82"></audio>
    <audio class="open-hat" src="sounds/80s/Drums/5.mp3" data-key="84"></audio>

 <!--PERCUSSION -->
    <audio class="snare" src="sounds/80s/Percussion/1.mp3" data-key="89"></audio>  
    <audio class="hi-hat" src="sounds/80s/Percussion/2.m4a" data-key="85"></audio>
    <audio class="kick" src="sounds/80s/Percussion/3.m4a" data-key="73"></audio>
    <audio class="open-hat" src="sounds/80s/Percussion/4.mp3" data-key="79"></audio>
    <audio class="snare" src="sounds/80s/Percussion/5.mp3" data-key="80"></audio>

  <!--BASS -->
    <audio class="open-hat" src="sounds/80s/Bass/1.m4a" data-key="81"></audio>
    <audio class="snare" src="sounds/80s/Bass/2.mp3" data-key="83"></audio>
    <audio class="hi-hat" src="sounds/80s/Bass/3.mp3" data-key="68"></audio>
    <audio class="kick" src="sounds/80s/Bass/4.mp3" data-key="70"></audio>
    <audio class="open-hat" src="sounds/80s/Bass/5.mp3" data-key="71"></audio>

  <!--FX -->
    <audio class="snare" src="sounds/80s/FX/1.mp3" data-key="72"></audio>
    <audio class="open-hat" src="sounds/80s/FX/2.m4a" data-key="74"></audio>
    <audio class="snare" src="sounds/80s/FX/3.m4a" data-key="75"></audio>  
    <audio class="hi-hat" src="sounds/80s/FX/4.m4a" data-key="76"></audio>
    <audio class="kick" src="sounds/80s/FX/5.m4a" data-key="77"></audio>

  <!--MELODY -->
    <audio class="open-hat" src="sounds/80s/Melody/1.m4a" data-key="87"></audio>
    <audio class="snare" src="sounds/80s/Melody/2.m4a" data-key="88"></audio>
    <audio class="open-hat" src="sounds/80s/Melody/3.mp3" data-key="67"></audio>
    <audio class="snare" src="sounds/80s/Melody/4.mp3" data-key="86"></audio>
    <audio class="open-hat" src="sounds/80s/Melody/5.mp3" data-key="66"></audio>
    <audio class="snare" src="sounds/80s/Melody/6.mp3" data-key="78"></audio>
    <?php
    break;

    case 'type=2': ?>
   
    <!--DRUM -->
    <audio class="hi-hat" src="sounds/Dark/Drums/1.mp3" data-key="65"></audio>
    <audio class="kick" src="sounds/Dark/Drums/2.mp3" data-key="90"></audio>
    <audio class="open-hat" src="sounds/Dark/Drums/3.mp3" data-key="69"></audio>
    <audio class="snare" src="sounds/Dark/Drums/4.mp3" data-key="82"></audio>
    <audio class="open-hat" src="sounds/Dark/Drums/5.mp3" data-key="84"></audio>

 <!--PERCUSSION -->
    <audio class="snare" src="sounds/Dark/Percussion/1.mp3" data-key="89"></audio>  
    <audio class="hi-hat" src="sounds/Dark/Percussion/2.mp3" data-key="85"></audio>
    <audio class="kick" src="sounds/Dark/Percussion/3.mp3" data-key="73"></audio>
    <audio class="open-hat" src="sounds/Dark/Percussion/4.mp3" data-key="79"></audio>
    <audio class="snare" src="sounds/Dark/Percussion/5.mp3" data-key="80"></audio>

  <!--BASS -->
    <audio class="open-hat" src="sounds/Dark/Bass/1.mp3" data-key="81"></audio>
    <audio class="snare" src="sounds/Dark/Bass/2.mp3" data-key="83"></audio>
    <audio class="hi-hat" src="sounds/Dark/Bass/3.mp3" data-key="68"></audio>
    <audio class="kick" src="sounds/Dark/Bass/4.mp3" data-key="70"></audio>
    <audio class="open-hat" src="sounds/Dark/Bass/5.mp3" data-key="71"></audio>

  <!--FX -->
    <audio class="snare" src="sounds/Dark/FX/1.m4a" data-key="72"></audio>
    <audio class="open-hat" src="sounds/Dark/FX/2.m4a" data-key="74"></audio>
    <audio class="snare" src="sounds/Dark/FX/3.m4a" data-key="75"></audio>  
    <audio class="hi-hat" src="sounds/Dark/FX/4.mp3" data-key="76"></audio>
    <audio class="kick" src="sounds/Dark/FX/5.m4a" data-key="77"></audio>

  <!--MELODY -->
    <audio class="open-hat" src="sounds/Dark/Melody/1.m4a" data-key="87"></audio>
    <audio class="snare" src="sounds/Dark/Melody/2.mp3" data-key="88"></audio>
    <audio class="open-hat" src="sounds/Dark/Melody/3.mp3" data-key="67"></audio>
    <audio class="snare" src="sounds/Dark/Melody/4.mp3" data-key="86"></audio>
    <audio class="open-hat" src="sounds/Dark/Melody/5.mp3" data-key="66"></audio>
    <audio class="snare" src="sounds/Dark/Melody/6.mp3" data-key="78"></audio>
    <?php
    break;

    case 'type=3': ?>
    <!--DRUM -->
    <audio class="hi-hat" src="sounds/Light/Drums/1.mp3" data-key="65"></audio>
    <audio class="kick" src="sounds/Light/Drums/2.mp3" data-key="90"></audio>
    <audio class="open-hat" src="sounds/Light/Drums/3.mp3" data-key="69"></audio>
    <audio class="snare" src="sounds/Light/Drums/4.mp3" data-key="82"></audio>
    <audio class="open-hat" src="sounds/Light/Drums/5.mp3" data-key="84"></audio>

 <!--PERCUSSION -->
    <audio class="snare" src="sounds/Light/Percussion/1.mp3" data-key="89"></audio>  
    <audio class="hi-hat" src="sounds/Light/Percussion/2.mp3" data-key="85"></audio>
    <audio class="kick" src="sounds/Light/Percussion/3.mp3" data-key="73"></audio>
    <audio class="open-hat" src="sounds/Light/Percussion/4.mp3" data-key="79"></audio>
    <audio class="snare" src="sounds/Light/Percussion/5.mp3" data-key="80"></audio>

  <!--BASS -->
    <audio class="open-hat" src="sounds/Light/Bass/1.m4a" data-key="81"></audio>
    <audio class="snare" src="sounds/Light/Bass/2.mp3" data-key="83"></audio>
    <audio class="hi-hat" src="sounds/Light/Bass/3.mp3" data-key="68"></audio>
    <audio class="kick" src="sounds/Light/Bass/4.mp3" data-key="70"></audio>
    <audio class="open-hat" src="sounds/Light/Bass/5.mp3" data-key="71"></audio>

  <!--FX -->
    <audio class="snare" src="sounds/Light/FX/1.m4a" data-key="72"></audio>
    <audio class="open-hat" src="sounds/Light/FX/2.m4a" data-key="74"></audio>
    <audio class="snare" src="sounds/Light/FX/3.m4a" data-key="75"></audio>  
    <audio class="hi-hat" src="sounds/Light/FX/4.m4a" data-key="76"></audio>
    <audio class="kick" src="sounds/Light/FX/5.m4a" data-key="77"></audio>

  <!--MELODY -->
    <audio class="open-hat" src="sounds/Light/Melody/1.wav" data-key="87"></audio>
    <audio class="snare" src="sounds/Light/Melody/2.mp3" data-key="88"></audio>
    <audio class="open-hat" src="sounds/Light/Melody/3.mp3" data-key="67"></audio>
    <audio class="snare" src="sounds/Light/Melody/4.m4a" data-key="86"></audio>
    <audio class="open-hat" src="sounds/Light/Melody/5.m4a" data-key="66"></audio>
    <audio class="snare" src="sounds/Light/Melody/6.wav" data-key="78"></audio>
    <?php
    break;

  default:
    // code...
    break;
}
?>
