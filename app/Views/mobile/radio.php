<div class="radio_mobile">
  <?php echo $redes_sociales_element;?>
  <?php
  $background = $radio_info->fondo != ''  ? 'url(' . base_url('images') . '/' . $radio_info->fondo . ')' : 'radial-gradient(' . $radio_info->color_uno . ' 0%, ' . $radio_info->color_uno . ' 50%, ' . $radio_info->color_dos  . ' 100%)';
  ?>
  <div class="radio_mobile_info">
    <div class="control_btn" onclick="control_audio_from_radio_view()">
        <i class="material-icons play_arrow_mobile" >play_arrow</i>
    </div>
    <?php if ($radio_info->artistas != '') : ?>
      <div class="artistas_mobile_container">
        <img src="<?php echo base_url('images') . '/' . $radio_info->artistas ?>" alt="">
      </div>
    <?php else : ?>
      <div class="logo_mobile_container">
        <img src="<?php echo base_url('images') . '/logo_' . $radio_info->pagina . '.png' ?>" alt="">
      </div>
    <?php endif; ?>
  </div>
  <div class="radio_view_body">
    <h2>Radios Recomendadas</h2>
    <div class="radio_view_body_recomendadas">
  </div>
</div>
</div>
<style>
  .radio_mobile {
    width: 100%;
    height: 100vh;
    position: relative;
    color: white;
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
    pointer-events: none;
  }
  
  .radio_mobile_info {
    width: 100%;
    height: 60%;
    padding-top: 70px;
    background-image: <?php echo $background ?>;
    background-size: cover;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .artistas_mobile_container,
  .logo_mobile_container {
    width: 80%;
  }

  .logo_mobile_container>img {
    width: 100%;
  }

  .artistas_mobile_container>img {
    width: 100%;
  }
  .artistas_mobile_container {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%,0);
  }
   .radio_view_body {
    padding: 10px;
    width: 100%;
    height: 40%;
    background-color: black;
    font-family: 'Oswald', sans-serif;
  }

  .radio_view_body_recomendadas {
    width: 90%;
    margin: 10px auto;
    height: 120px;
    display: flex;
    flex-wrap: nowrap;
    overflow-x: scroll;
  }

  .radio_view_body_recomendadas>.radio_recomendada {
    width: 100px;
    height: 100px;
    border: 1px solid white;
    border-radius: 10px;
    flex-grow: 0;
    flex-shrink: 0;
    margin: 0 5px;
  }

  .radio_recomendada>a {
    display: flex;
    align-items: center;
    width: 100%;
    height: 100%;
    background-color: black;
    border-radius: 10px;

  }

  .radio_recomendada>a>img {
    width: 100%;
    border-radius: 10px;
  }
</style>
<script>
  $(document).ready(()=>{
    const get_recomended_radios = () => {
    $.ajax({
      url: `/radios/get_random_programs`,
      method: 'GET',
      dataType: 'json',
      success: (data) => {
        update_recomended_radios(data)
      },
      error: (e) => {
        console.log(e);
      }
    })
  }

  const update_recomended_radios = (radios) => {
    let radio_view_body_recomendadas = $('.radio_view_body_recomendadas')
    radio_view_body_recomendadas.empty();
    console.log(radios.length);
    radios.forEach(radio => {
      let div = document.createElement('div')
      div.classList.add('radio_recomendada')
      let a = document.createElement('a')
      a.href = radio.ruta
      let img = document.createElement('img')
      img.src = `/images/logo_${radio.pagina}.png`

      a.appendChild(img)
      div.appendChild(a)

      radio_view_body_recomendadas.append(div)
    })
  }

    get_recomended_radios();


  })
  const control_audio_from_radio_view = () => {
    let audio = document.querySelector('#audio')
    if(audio.paused) {
      audio.load()
    } else {
      audio.pause()
    }
  }
</script>