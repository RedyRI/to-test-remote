<div class="pana_onda_radio_mobile">
  <?php echo $redes_sociales_element;?>
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


  <div class="pana_onda_radio_mobile_info">
    <div class="control_btn" onclick="control_audio_from_radio_view()">
        <i class="material-icons play_arrow_mobile" >play_arrow</i>
    </div>
    <div class="radio_page_info_movil">
      <div class="radio_page_movil_al_aire"><small>AL AIRE</small> </div>
      <div class="radio_page_movil_nombre"><?php echo $bloque['nombre'] ?></div>
      <div class="radio_page_movil_horario"><?php echo $bloque['horaInicio'] . ' - ' . $bloque['horaFin'] ?></div>
    </div>
    <div class="radio_page_movil_locutor_container">
      <img src="<?php echo $bloque['fotoLocutor'] ?>" alt="">
    </div>
  </div>
  <div class="pana_onda_radio_mobile_body">
    <h2>RADIOS RECOMENDADAS</h2>
    <?php if ($radio_actual == 'ondacero') : ?>
      <div class="recomendadas_onda_cero">
        <?php foreach ($radios as $radio) : ?>
          <?php if (preg_match("/onda/i", $radio->nombre) > 0 && $radio->nombre != 'Onda Azul' && $radio->nombre != 'Onda Cero') : ?>
            <div class="onda_cero_card">
              <a href="<?php echo $radio->ruta ?>">
                <img src="<?php echo base_url('images') . '/logo_' . $radio->pagina . '.png' ?>" alt="">
              </a>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="recomendadas_onda_cero">
        <?php foreach (array_slice($radios, 6, 5) as $radio) : ?>
          <div class="onda_cero_card">
            <a href="<?php echo $radio->ruta ?>">
              <img src="<?php echo base_url('images') . '/logo_' . $radio->pagina . '.png' ?>" alt="">
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<style>
  .pana_onda_radio_mobile {
    width: 100%;
    height: 100vh;
    background-color: black;
  }
  .control_btn {
    position: absolute;
    bottom: -50px;
    right: 0;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .play_arrow_mobile {
    color: white;
    font-size: 80px;
  }

  .pana_onda_radio_mobile_info {
    width: 100%;
    height: 60%;
    background-color: black;
    background-image: <?php echo $page_background ?>;
    position: relative;
    padding-top: 60px;
    background-size: cover;
  }

  .radio_page_info_movil {
    position: absolute;
    font-family: 'Oswald', sans-serif;
    left: 5px;
    bottom: 5px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 25px;
    padding: 5px 15px;
    color: white;
    z-index: 11;
  }

  .radio_page_movil_locutor_container {
    width: 90%;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%,0);
    display: flex;
    align-items: flex-end;
  }

  .radio_page_movil_locutor_container>img {
    width: 100%;
    pointer-events: none;
  
  }

  .pana_onda_radio_mobile_body {
    width: 100%;
    height: 40%;
    background-color: black;
    font-family: 'Oswald', sans-serif;
    color: white;
    padding: 10px;
  }

  .recomendadas_onda_cero {
    width: 100%;
    height: 120px;
    display: flex;
    flex-wrap: nowrap;
    overflow: scroll;
  }

  .onda_cero_card {
    width: 100px;
    height: 100px;
    flex-shrink: 0;
    flex-grow: 0;
    margin: 10px;
  }

  .onda_cero_card>a {
    display: block;
    width: 100%;
    height: 100px;
    display: flex;
    align-items: center;
    border-radius: 10px;
    border: solid 1px white;

  }

  .onda_cero_card>a>img {
    width: 100%;
    border-radius: 10px;
  }
</style>
<script>
  const control_audio_from_radio_view = () => {
    let audio = document.querySelector('#audio')
    if(audio.paused) {
      audio.load()
    } else {
      audio.pause()
    }
  }
</script>