<!-- $radio_info -->
<main class="radio_page">
  <?php echo $redes_sociales_element  ?>
  <div>
    <?php

    $background = $radio_info->fondo != '' ? "url('" . base_url() . '/images/' . $radio_info->fondo . "')" : "radial-gradient( " . $radio_info->color_uno . "  0%, " . $radio_info->color_uno . " 50%, " . $radio_info->color_dos . " 100%)";
    ?>

  </div>
  <?php if ($radio_info->artistas != '') : ?>
    <div class="radio_artistas_container">
      <img src="<?php echo base_url() . '/images/' . $radio_info->artistas ?>" alt="">
    </div>
  <?php else : ?>
    <div class="radio_logo_container">
      <img src="<?php echo base_url() . '/images/logo_' . $radio_info->pagina . '.png' ?> " alt="">
    </div>
  <?php endif; ?>
  <div class="player_btn" onclick="controlPlayBtn()">
    <i class="material-icons play_arrow audio_control_icon_radio">play_arrow</i>
  </div>
</main>
<style>
  .radio_page {
    width: 100%;
    height: 100vh;
    background-color: black;
    color: white;
    padding: 150px;
    position: relative;
    background-image: <?php echo $background ?>;
  }

  .radio_logo_container {
    width: 30%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .radio_artistas_container {
    width: 50%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, 0);
    display: flex;
    justify-content: center;
  }

  .radio_artistas_container>img {
    width: 100%;
  }

  .radio_logo_container>img {
    width: 100%;
    border-radius: 25px;
  }

  .player_btn {
    position: absolute;
    width: 30vw;
    height: 30vw;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    cursor: pointer;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;

  }

  .player_btn>.material-icons.play_arrow {
    font-size: 150px;
    color: black;
    opacity: 0.6;
  }

  .player_btn:hover {
    background-color: rgba(255, 255, 255, 0.5);
  }

  .player_btn:hover>i {
    opacity: 1;
    transform: scale(1.2);
  }

  .player_btn:active>i {
    opacity: 0.9;
    transform: scale(1);
  }

  .audio_control_icon_radio.loading {
    animation: rotate 1s linear forwards infinite;

  }
</style>
<script>
  // let audio = document.getElementById('audio')
  // const controlPlayBtnRadio = () => {
  //   if (audio.paused) {
  //     console.log('play audio');
  //     audio.load();
  //   } else {
  //     console.log('pause audio');
  //     audio.pause();
  //   }
  // }
</script>