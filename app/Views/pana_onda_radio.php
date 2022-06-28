<div class="pana_onda_radio">
  <?php echo $redes_sociales_element ; ?>
  <?php
  function filterRadio($value)
  {
    $hoy = date('H:i:s');
    return ($hoy >= $value->horaPrograma && $hoy < $value->finPrograma);
  }
  $programa_actual_array = array_filter($programas, 'filterRadio');
  $programa_actual_index = array_keys($programa_actual_array)[0];

  $hoy = date('H:i:s');
  $bloque = array();
  foreach ($programa_actual_array as $programa) {
    $bloque['nombre'] = $programa->titlePrograma;
    $bloque['locutor'] = $programa->locutor;
    $bloque['horaInicio'] = date('h:i a', strtotime($programa->horaPrograma));
    $bloque['horaFin'] = date('h:i a', strtotime($programa->finPrograma));

    if ($radio_actual == 'panamericana') {
      $bloque['fotoLocutor'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoLocutor;
      $bloque['fotoBloque'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoBloque;
      $bloque['fotoPrograma'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoLogo;

      if ($programa_actual_index == count($programas) - 1) {
        $bloque['sigProgramaBanner'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programas[0]->fotoBloque;
      } else {
        $bloque['sigProgramaBanner'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programas[$programa_actual_index  + 1]->fotoBloque;
      }
    } else {
      $bloque['fotoLocutor'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programa->fotoLocutor;
      $bloque['fotoBloque'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programa->fotoBloque;

      if (trim($programa->locutor) == 'Onda Cero') {
        $bloque['fotoPrograma'] = 'https://www.ondacero.com.pe/images/' . str_replace(' ', '_', trim($programa->titlePrograma)) . '_SL.png';
      } else {
        $bloque['fotoPrograma'] = 'https://www.ondacero.com.pe/images/' . str_replace(' ', '_', trim($programa->titlePrograma)) . '.png';
      }

      if ($programa_actual_index == count($programas) - 1) {
        $bloque['sigProgramaBanner'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programas[0]->fotoBloque;
      } else {
        $bloque['sigProgramaBanner'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programas[$programa_actual_index + 1]->fotoBloque;
      }
    }
  }

  $page_background = $radio_info->fondo != '' ? ' url("https://www.radiopanamericana.com/images/nuevo-banner-fondo-web.png")' : 'radial-gradient(#FEE248 30%, #FFA01C 100%)';
  ?>

  <div class="foto_locutor_container">
    <img src="<?php echo $bloque['fotoLocutor'] ?>" alt="">
  </div>

  <div class="program_info_container">
    <div class="al_aire_container">
      <span class="al_aire_text"> <i class="material-icons circle">circle</i> Al aire</span>
    </div>
    <div class="program_name">
      <img src="<?php echo $bloque['fotoPrograma'] ?>" alt="">
    </div>
    <div class="program_schedule">
      <span class="schedule_from"><?php echo $bloque['horaInicio'] ?></span> -
      <span class="schedule_to"><?php echo $bloque['horaFin'] ?></span>
    </div>
  </div>

  <div class="banners_container">

    <div class="banner_left">
      <div class="prev_song_cover_container">
        <img class="prev_song_cover_img" src="" alt="">
      </div>
      <div class="next_song_cover_container">
        <img class="next_song_cover_img" src="" alt="">
      </div>
    </div>

    <div class="banner_right">
      <div class="banner_right_img_container">
        <img src="<?php echo $bloque['sigProgramaBanner'] ?>" alt="">
      </div>
    </div>

  </div>

  <div class="player_btn" onclick="controlPlayBtn()">
    <i class="material-icons play_arrow audio_control_icon_radio">play_arrow</i>
  </div>

</div>
<style>
  .pana_onda_radio {
    padding: 150px;
    width: 100%;
    height: 100vh;
    background-image: <?php echo $page_background ?>;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
    overflow: hidden;
  }

  .material-icons.circle {
    color: red;
    font-size: 20px;
  }

  .program_info_container {
    position: absolute;
    left: 70px;
    top: 50%;
    min-height: 250px;
    transform: translate(0, -50%);
    z-index: 10;
    width: 20%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .banners_container {
    position: absolute;
    bottom: 60px;
    left: 0;
    width: 100%;
    height: 140px;
    display: flex;
    justify-content: center;
  }

  .banner_left,
  .banner_right {
    width: 300px;
    height: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }

  .prev_song_cover_container,
  .next_song_cover_container {
    width: 140px;
    height: 140px;
    position: relative;
  }

  .prev_song_cover_container::after,
  .next_song_cover_container::after,
  .banner_right_img_container::after {
    position: absolute;
    bottom: calc(100% + 5px);
    background-color: white;
    color: black;
    padding: 5px 7px;
    left: 0;
    font-family: 'Oswald', sans-serif;
  }

  .prev_song_cover_container::after {
    content: 'ANTERIOR';
  }

  .next_song_cover_container::after {
    content: 'ACTUAL';
  }

  .banner_right_img_container::after {
    content: 'SIGUIENTE PROGRAMA';
  }


  .banner_right_img_container {
    width: 290px;
    height: 140px;
    position: relative;
  }

  .banner_right_img_container>img {
    width: 100%;
    height: 100%;
  }

  .foto_locutor_container {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, 0);
    height: calc(100vh - 180px)
  }

  .foto_locutor_container>img {
    height: 100%;
  }

  .al_aire_container {
    height: 25px;
    margin-bottom: 20px;
  }

  .program_schedule {
    height: 25px;
    background-color: white;
    font-family: 'Oswald', sans-serif;
    display: flex;
    justify-content: center;
    width: 150px;
    align-items: center;
    margin: 20px auto 0 auto;
    border-radius: 10px;

  }

  .program_name {
    width: 100%;
    
  }

  .program_name>img {
    width: 100%;
  }

  .player_btn {
    position: absolute;
    width: 30vw;
    height: 30vw;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    cursor: pointer;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;

  }

  .player_btn>.material-icons.play_arrow {
    font-size: 150px;
    color: black;
    visibility: hidden;
  }

  .player_btn:hover {
    background-color: rgba(255, 255, 255, 0.5);
  }

  .player_btn:hover>.material-icons.play_arrow {
    opacity: 1;
    transform: scale(1.2);
    visibility: visible;
  }

  .player_btn:active>.material-icons.play_arrow {
    transform: scale(1);
    visibility: visible;
  }

  .audio_control_icon_radio.loading {
    animation: rotate 1s linear forwards infinite;

  }

  .prev_song_cover_img,
  .next_song_cover_img {
    width: 100%;
  }

  .al_aire_text {
    background-color: white;
    padding: 5px 7px;
    display: flex;
    width: 100px;
    border-radius: 10px;
    align-items: center;
    justify-content: center;
    font-family: 'Oswald', sans-serif;
    margin: 0 auto;
  }

  .al_aire_text>.material-icons.circle {
    animation: blink 1s ease infinite;
    margin-right: 20px;
  }

  @keyframes blink {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;

    }
  }
</style>
<script>
  let anterior = $(".prev_song_cover_img");
  let actual = $(".next_song_cover_img");
  anterior.attr(
    "src",
    "https://www.radio1160.com.pe/images/cancion/artista/logo_generico_2.png"
  );
  actual.attr(
    "src",
    "https://www.radio1160.com.pe/images/cancion/artista/logo_generico_2.png"
  );

  // setInterval(() => {}, 2000);
  $(document).ready(function() {
    setInterval(() => {
      if (actual.attr("src") != $('.playbar_cover').attr("src")) {
        anterior.attr("src", actual.attr("src"))
        actual.attr("src", $('.playbar_cover').attr("src"))
      }
    }, 2000);

  })
</script>