<div class="pana_onda_radio">
  <?php
    function filterRadio($value) {
      $hoy = date('H:i:s');
      return ($hoy >= $value->horaPrograma && $hoy < $value->finPrograma);
    }
    $programa_actual_array = array_filter($programas,'filterRadio');
    $programa_actual_index = array_keys($programa_actual_array)[0];
    
    echo('<pre>');
      print_r(array_keys($programa_actual_array));
      print_r($programa_actual_index);
    echo('</pre>');

    $hoy = date('H:i:s');
    $bloque = array();
    foreach ($programa_actual_array as $programa) {
      $bloque['nombre'] = $programa->titlePrograma;
      $bloque['locutor'] = $programa->locutor;
      $bloque['horaInicio'] = date('h:i a', strtotime($programa->horaPrograma));
      $bloque['horaFin'] = date('h:i a', strtotime($programa->finPrograma));

      if($radio_actual == 'panamericana') {
        $bloque['fotoLocutor'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoLocutor;
        $bloque['fotoBloque'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoBloque;
        $bloque['fotoPrograma'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programa->fotoLogo;
        
        if($programa_actual_index == count($programas)) {
          $bloque['sigProgramaBanner'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programas[0]->fotoBloque;
        } else {
          $bloque['sigProgramaBanner'] = 'https://www.radiopanamericana.com/j/images/programacion/' . $programas[$programa_actual_index  + 1]->fotoBloque;
        }
        
      } else {
        $bloque['fotoLocutor'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programa->fotoLocutor;
        $bloque['fotoBloque'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programa->fotoBloque;
        // $bloque['fotoPrograma'] = 'http://www.ondacero.com.pe/j/images/programacion/' . $programa->fotoLocutor;
        
        if($programa_actual_index == count($programas)) {
          $bloque['sigProgramaBanner'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programas[0]->fotoBloque;
        } else {
          $bloque['sigProgramaBanner'] = 'https://www.ondacero.com.pe/j/images/programacion/' . $programas[$programa_actual_index  + 1]->fotoBloque;
        }

      }
      
    }

    $page_background = $radio_info->fondo != '' ? ' url("https://www.radiopanamericana.com/images/nuevo-banner-fondo-web.png")': 'radial-gradient(#FEE248 30%, #FFA01C 100%)';
  ?>

  <div class="foto_locutor_container">
    <img src="<?php echo $bloque['fotoLocutor'] ?>" alt="">
  </div>

  <div class="program_info_container">
    <div class="al_aire_container">
      <span class="al_aire_text"> <i class="material-icons circle">circle</i> Al aire</span>
    </div>
    <div class="program_name">
      <img src="" alt="">
    </div>
    <div class="program_schedule">
      <span class="schedule_from"><?php echo $bloque['horaInicio'] ?></span>
      <span class="schedule_to"><?php echo $bloque['horaFin'] ?></span>
    </div>
  </div>

  <div class="banners_container"> 
    
    <div class="banner_left">
        <div class="prev_song_cover_container">
          <img src="" alt="">
        </div>
        <div class="next_song_cover_container">
          <img src="" alt="">
        </div>
    </div>
    
    <div class="banner_right">
      <div class="banner_right_img_container">
        <img src="<?php echo $bloque['sigProgramaBanner'] ?>" alt="">
      </div>
    </div>

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
    bottom: 150px;
    border: solid red 1px;
    width: 200px;
    height: 200px; 
  }
  .banners_container {
    position: absolute;
    bottom: 60px;
    left: 0;
    width: 100%;
    height: 140px;
    border: solid red 1px;
    display: flex;
    justify-content: center;
  }
  .banner_left, .banner_right {
    width: 300px;
    height: 100%;
    border: solid black 1px;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }
  .prev_song_cover_container, .next_song_cover_container {
    width: 140px;
    height: 140px;
    border: solid green 1px;
  }
  .banner_right_img_container {
    width: 290px;
    height: 140px;
    border: solid green 1px;
  }

  .banner_right_img_container > img {
    width: 100%;
  }

  .foto_locutor_container {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, 0);
    border: solid red 1px;
    height: calc(100vh - 180px)
  }

  .foto_locutor_container > img {
    height: 100%;
  }
</style>