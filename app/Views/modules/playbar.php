<div class="playbar">
  <audio 
    onplay="handlePlay()"
    onpause="handlePause()"
    onloadstart="handleLoadStart()"
    oncanplay="handleCanplay()"
    id="audio" 
    src="<?php echo $radio_info -> stream?>" 
    >
  </audio>

  <div class="playbar_left">
    <div class="metadata_container">

      <div class="playbar_cover_container">
        <img class="playbar_cover" src="https://www.radio1160.com.pe/images/cancion/artista/logo_generico_2.png" alt="">
      </div>

      <div class="playbar_song_info_container">
        <span class="song_name"> NOMBRE DE CANCION - NOMBRE DE ARTISTA</span>
        <span class="radio_playing"> <?php echo $radio_info -> nombre?> </span>
      </div>

    </div>
  </div>
  <div class="playbar_right"></div>

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
  .playbar_left {
    flex: 0.5;
    color: black;
  }
  .playbar_right {
    flex: 0.5;
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
</style>
<script>
  let audio = document.getElementById('audio')

  const handleLoadStart = () => {
    console.log('loading has started');
  }
  const handleCanplay = () => {
    audio.play()
  }
  const handlePause = () => {
    console.log('Pause');
  }
  const handlePlay = () => {
    console.log('Play');
  }
</script>