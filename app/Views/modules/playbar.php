<div class="playbar">
  <audio onplay="handlePlay()" onpause="handlePause()" onloadstart="handleLoadStart()" oncanplay="handleCanplay()" onerror="handleError()" data-now_playing="<?php echo (isset($radio_info) ? $radio_info->pagina  : 'ondacero') ?>" data-now_playing_name="<?php echo (isset($radio_info) ? $radio_info->nombre : 'Onda Cero') ?>" id="audio" src="<?php echo (isset($radio_info) ? $radio_info->stream  : 'https://streaming.gometri.com/stream/8011/stream') ?>">
  </audio>

  <div class="playbar_left">
    <div class="metadata_container">

      <div class="playbar_cover_container">
        <img class="playbar_cover" src="https://www.radio1160.com.pe/images/cancion/artista/logo_generico_2.png" alt="">
      </div>

      <div class="playbar_song_info_container">
        <span class="song_name"> NOMBRE DE CANCION - NOMBRE DE ARTISTA</span>
        <span class="radio_playing"> <?php echo (isset($radio_info) ? $radio_info->nombre  : 'Onda Cero') ?> </span>
      </div>

    </div>
  </div>
  <div class="playbar_right">
    <div class="playbar_right_play_icon_container" onclick="controlPlayBtn()">
      <i class="material-icons play_arrow audio_control_icon_playbar">play_arrow</i>
    </div>
    <div class="volume_input_container">
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

  .playbar_right {
    flex: 0.5;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }

  .playbar_right_play_icon_container>.material-icons.play_arrow {
    font-size: 40px;
    color: black;
    cursor: pointer;
  }

  .playbar_left {
    flex: 0.5;
    color: black;
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

  @keyframes rotate {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);

    }
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
</style>
<script>
  let audio = document.getElementById('audio')
  audio.volume = 0.5
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
</script>
<script src="<?php echo base_url('js/playbar_controller.js') ?>"></script>