<div class="radios_mobile">
  <div class="cards_container">
    <?php foreach ($radios as $radio) : ?>
      <div class="radio_card" data-nombre="<?= $radio->nombre ?>" data-ciudad="<?= $radio->ciudad ?>">
        <div class="radio_card_body">
          <div class="radio_card_logo" onclick="handle_click_radio_card(this)" data-nombre="<?= $radio->nombre ?>" data-pagina="<?= $radio->pagina ?>" data-stream="<?= $radio->stream ?>">
            <img src="<?php echo  base_url() . '/images/logo_' . $radio->pagina . '.png' ?>" alt="">
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>


  <div class="radios_page_view">
    <div class="radio_view_info">
      <img class="radio_view_info_logo" src="" alt="">
    </div>
    <div class="radio_view_body">
      <h2>Radios Recomendadas</h2>
      <div class="radio_view_body_recomendadas">
        <div class="radio_recomendada"></div>
        <div class="radio_recomendada"></div>
        <div class="radio_recomendada"></div>
        <div class="radio_recomendada"></div>
        <div class="radio_recomendada"></div>
      </div>
    </div>
  </div>
</div>

<style>
  .cards_container {
    display: grid;
    justify-content: center;
    grid-template-columns: 30% 30% 30%;
    grid-template-rows: auto;
    gap: 2px;
    padding: 70px 0;
  }

  .radios_mobile {
    width: 100%;
    min-height: 100vh;
    background-color: black;
    position: relative;
    color: white;
  }

  .radio_card {
    text-align: center;
  }

  .radio_card_body {
    width: 100%;
    border: 1px solid white;
    border-radius: 10px;
  }

  .radio_card_logo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 30vw;
    position: relative;
    background-color: black;
    border-radius: 10px;
  }

  .radio_card_logo>img {
    width: 100%;
    border-radius: 10px;
  }


  .radios_page_view {
    width: 100vw;
    height: calc(100vh - 106px);
    overflow-x: hidden;
    background-color: green;
    position: fixed;
    top: 110%;
    left: 0;
  }

  .radio_view_info {
    width: 100%;
    height: 60%;
    background-color: black;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-repeat: no-repeat;
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
    margin: 0 auto;
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

  .radio_view_info_logo {
    width: 80%;
  }
</style>
<script>
  const handle_click_radio_card = (info) => {
    console.log(info);
    let radio_name = $('.radio_playing')
    let nombre = info.getAttribute('data-nombre')
    let pagina = info.getAttribute('data-pagina')
    let stream = info.getAttribute('data-stream')
    radio_name.text(nombre)
    console.log(radio_name.text());
    audio.src = stream
    audio.setAttribute('data-now_playing', pagina)
    audio.setAttribute('data-now_playing_name', nombre)
    get_radio_info()
    get_recomended_radios()
  }

  const get_radio_info = () => {
    let audio = document.getElementById('audio')
    let now_playing_page = audio.getAttribute('data-now_playing').trim()
    if (now_playing_page != 'onda-cero' && now_playing_page != 'panamericana') {
      console.log('peticion iniciada para obtener datos de radio', now_playing_page);
      $.ajax({
        url: `/radios/get_program/${now_playing_page}`,
        method: 'GET',
        dataType: 'json',
        success: (data) => {
          update_radio_info(data[0])
          console.log('*****************************');
          console.log(data[0]);
          console.log('******************************');
        },
        error: (e) => {
          console.log('error =-================================================');
          console.log(e);
        }
      })
    } else {

    }
  }

  const update_radio_info = (info) => {
    console.log('------------------------------------------');
    console.log(info);
    console.log('------------------------------------------');
    let radio_view_info = document.querySelector('.radio_view_info')
    let radio_view_info_logo = document.querySelector('.radio_view_info_logo')
    let radio_view_body = document.querySelector('.radio_view_body')

    if (info.fondo != "") {
      radio_view_info.style.backgroundImage = `url('/images/${info.fondo}')`
    } else {
      radio_view_info.style.backgroundImage = `radial-gradient( ${info.color_uno} 0%, ${info.color_uno} 50%, ${info.color_dos} 100%)`
    }


    if (info.artistas != null) {
      radio_view_info_logo.src = `/images/${info.artistas}`
    } else {
      console.log('se llego aqui');
      radio_view_info_logo.src = `/images/logo_${info.pagina}.png`
    }
  }

  const get_recomended_radios = () => {
    $.ajax({
      url: `/radios/get_random_programs`,
      method: 'GET',
      dataType: 'json',
      success: (data) => {
        update_recomended_radios(data[0])
      },
      error: (e) => {
        console.log(e);
      }
    })
  }

  const update_recomended_radios = (radios) => {
    console.log(radios);
  }
</script>