<div class="playbar <?php echo $is_mobile == true ? 'mobile' : '' ?>">
  <audio onplay="handlePlay()" onpause="handlePause()" onloadstart="handleLoadStart()" oncanplay="handleCanplay()" onerror="handleError()" data-now_playing="<?php echo (isset($radio_info) ? $radio_info->pagina  : 'onda-cero') ?>" data-now_playing_name="<?php echo (isset($radio_info) ? $radio_info->nombre : 'Onda Cero') ?>" id="audio" src="<?php echo (isset($radio_info) ? $radio_info->stream  : 'https://streaming.gometri.com/stream/8011/stream') ?>">
  </audio>

  <div class="playbar_left <?php echo $is_mobile == true ? 'mobile' : '' ?>">
    <div class="metadata_container">

      <div class="playbar_cover_container">
        <img class="playbar_cover" src="https://www.radio1160.com.pe/images/cancion/artista/logo_generico_2.png" alt="">
      </div>

      <div class="playbar_song_info_container">
        <?php if($is_mobile) :?>
          <div class="song_name_container">
            <span class="song_name  <?php echo $is_mobile == true ? 'mobile' : '' ?>"> NOMBRE DE CANCION - NOMBRE DE ARTISTA</span>
          </div>
          <span class="radio_playing"> <?php echo (isset($radio_info) ? $radio_info->nombre  : 'Onda Cero') ?> </span>
        <?php else:?>
          <span class="song_name  <?php echo $is_mobile == true ? 'mobile' : '' ?>"> NOMBRE DE CANCION - NOMBRE DE ARTISTA</span>
          <span class="radio_playing"> <?php echo (isset($radio_info) ? $radio_info->nombre  : 'Onda Cero') ?> </span>
        <?php endif;?>
      </div>
      
    </div>
    <?php if($is_mobile) :?>
      <div class="arrow_show_radio <?php echo (isset($radio_page) ? 'hide':'')?>" onclick="show_radio()">
        <i class="material-icons home arrow_show_radio_i">expand_less</i>
      </div>
    <?php endif;?>
  </div>
  <div class="playbar_right <?php echo $is_mobile == true ? 'mobile' : '' ?>">
    <div class="playbar_right_play_icon_container" onclick="controlPlayBtn()">
      <i class="material-icons play_arrow audio_control_icon_playbar">play_arrow</i>
    </div>
    <div class="volume_input_container <?php echo $is_mobile == true ? 'mobile' : '' ?>">
      <input type="range" min='0' max='100' value="50" onmousedown="handleMouseDown()" onchange="handleRangeChange(this)">
    </div>
  </div>

</div>
<style>
  .playbar {
    width: 100%;
    height: 50px;
    position: fixed;
    bottom: 0;
    left: 0;
    color: white;
    z-index: 11;
    display: flex;
    background-color: lightgray;
  }
  .playbar.mobile {
    flex-direction: row-reverse;
  }

  .arrow_show_radio {
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .arrow_show_radio > i {
    margin-left: 10px;
  }
  .arrow_show_radio.hide {
    display: none;
  }
  .playbar_right {
    flex: 0.5;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }
  .playbar_right.mobile {
    position: relative;
  }

  .playbar_right_play_icon_container>.material-icons.play_arrow {
    font-size: 40px;
    color: black;
    cursor: pointer;
  }

  .playbar_left {
    flex: 0.5;
    color: black;
    display: flex;
    justify-content: space-between;
  }

  .metadata_container {
    display: flex;
    font-family: 'Oswald', sans-serif;
  }

  .playbar_cover_container {
    display: flex;
    width: 50px;
    align-items: center;
    justify-content: center;
  }

  .playbar_song_info_container {
    margin-left: 10px;
  }

  img.playbar_cover {
    width: 45px;
  }

  span.song_name {
    display: block;
  }
  

  span.radio_playing {
    display: block;
  }

  .playbar_right_play_icon_container.loading {
    animation: rotate 1s linear forwards infinite;
  }

  .song_name_container {
    width: 100%;
    overflow: hidden;
    position: relative;
  }

  span.song_name.mobile {
    display: block;
    width: 150%;
    position: relative;
    left: 10px;
    animation: slide 6s linear forwards infinite;
  }
  @keyframes rotate {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);

    }
  }
    @keyframes slide {
    0% {
      left: 200%;
    }

    100% {
      left: -200%;
    }
  }
  .volume_input_container {
    margin-right: 10px;
  }
  .volume_input_container.mobile {
    display: none;
  }
  .playbar_left.mobile {
    flex: 0.9;
  }
  .playbar_right.mobile {
    flex: 0.1;
  }
  /* estilizar barra de volumen */
  input[type="range"] {
    display: block;
    width: 100%;
    height: 30px;
    background-color: transparent;
  }

  input[type="range"]:focus {
    outline: none;
  }

  input[type="range"],
  input[type="range"]::-webkit-slider-runnable-track,
  input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
  }

  input[type="range"]::-webkit-slider-thumb {
    background-color: #777;
    width: 20px;
    height: 20px;
    border: 2px solid #eeeff1;
    border-radius: 50%;
    margin-top: -9px;
  }

  input[type="range"]::-moz-range-thumb {
    background-color: #777;
    width: 15px;
    height: 15px;
    border: 3px solid #333;
    border-radius: 50%;
  }

  input[type="range"]::-ms-thumb {
    background-color: #777;
    width: 20px;
    height: 20px;
    border: 3px solid #333;
    border-radius: 50%;
  }

  input[type="range"]::-webkit-slider-runnable-track {
    background-color: #777;
    height: 3px;
  }

  input[type="range"]:focus::-webkit-slider-runnable-track {
    outline: none;
  }

  input[type="range"]::-moz-range-track {
    background-color: #777;
    height: 3px;
  }

  input[type="range"]::-ms-track {
    background-color: #777;
    height: 3px;
  }

  input[type="range"]::-ms-fill-lower {
    background-color: HotPink;
  }

  input[type="range"]::-ms-fill-upper {
    background-color: black;
  }
  .radios_page_view {
    transition: all 1s ease forwards;
  }
</style>
<script>
  
   
  let audio = document.getElementById('audio')
  // audio.volume = 0.5
  let audio_control_icon_playbar = $('.audio_control_icon_playbar')
  let audio_control_icon_radio = $('.audio_control_icon_radio')
  let playbar_right_play_icon_container = $('.playbar_right_play_icon_container')

  const handleLoadStart = () => {
    audio_control_icon_playbar.text('refresh')
    audio_control_icon_radio.text('refresh')
    playbar_right_play_icon_container.toggleClass('loading')
    audio_control_icon_radio.toggleClass('loading')
  }
  const handleCanplay = () => {
    audio.play()
    audio_control_icon_playbar.text('pause')
    audio_control_icon_radio.text('pause')
    if (playbar_right_play_icon_container.hasClass('loading')) {
      playbar_right_play_icon_container.toggleClass('loading')
      audio_control_icon_radio.toggleClass('loading')
    }
  }
  const handlePause = () => {
    audio_control_icon_playbar.text('play_arrow')
    audio_control_icon_radio.text('play_arrow')
    if (playbar_right_play_icon_container.hasClass('loading')) {
      playbar_right_play_icon_container.toggleClass('loading')
      audio_control_icon_radio.toggleClass('loading')
    }
  }
  const handlePlay = () => {}
  const handleError = () => {
    audio_control_icon_playbar.text('warning')
    audio_control_icon_radio.text('warning')

    if (playbar_right_play_icon_container.hasClass('loading')) {
      playbar_right_play_icon_container.toggleClass('loading')
      audio_control_icon_radio.toggleClass('loading')
    }
  }

  const handleMouseDown = () => {
    window.getSelection().removeAllRanges();
  }

  const handleRangeChange = function(range) {
    audio.volume = range.value / 100;
  }

  const controlPlayBtn = () => {
    if (audio.paused) {
      audio.load();
    } else {
      audio.pause();
    }
  }
            
  let showing_radio = false;
  
  function show_radio() { 
    let arrow_show_radio_i = document.querySelector('.arrow_show_radio_i') 
    let radios_page_view = document.querySelector('.radios_page_view') 
    arrow_show_radio_i.textContent = showing_radio ? 'expand_less' : 'expand_more' 
    showing_radio = !showing_radio;
    console.log('show radio clicked');
    console.log(radios_page_view);
    radios_page_view.style.top = showing_radio ? '58px' : '110%';
  }
   
</script>
<script src="<?php echo base_url('js/playbar_controller.js') ?>"></script>