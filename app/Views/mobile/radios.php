<div class="radios_mobile">

  <div class="radios_filter">
    <input type="text" placeholder="Buscar radio ..." onkeyup="filter_radios_mobile()" id="filter_name_mobile">
    <select name="ciudad" id="filter_ciudad_mobile" onchange="filter_radios_mobile()">
      <option value="">Todas</option>
      <?php foreach ($ciudades as $ciudad) : ?>
        <option value="<?php echo $ciudad->ciudad ?>"><?php echo ucfirst($ciudad->ciudad) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
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
      <div class="control_btn" onclick="control_audio_from_radio_view()">
        <i class="material-icons play_arrow_mobile" >play_arrow</i>
      </div>
    </div>
    <div class="radio_view_info_pana_onda">
      <div class="radio_view_info_pana_onda_info">
        <div class="info_al_aire">AL AIRE</div>
        <div class="info_programa"></div>
        <div class="info_horario"></div>
      </div>
      <div class="foto_locutor_container">
        <img class="foto_locutor_img" src="" alt="">
      </div>
      
            <div class="control_btn" onclick="control_audio_from_radio_view()">
            <i class="material-icons play_arrow_mobile" >play_arrow</i>
            </div>
    </div>
    <div class="radio_view_body">
      <h2>Radios Recomendadas</h2>
      <div class="radio_view_body_recomendadas">
      </div>
    </div>
  </div>
</div>

<style>
  .radios_filter {
    width: 100%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 25px;
    background-color: white;
  }

  .radios_filter>input,
  .radios_filter>select {
    border: none;
    outline: none;
    padding: 15px 10px;
    font-size: 1rem;
    background-color: transparent;
  }

  .cards_container {
    display: grid;
    justify-content: center;
    grid-template-columns: 30% 30% 30%;
    grid-template-rows: auto;
    gap: 2px;
    padding: 10px 0 70px 0;
  }

  .radios_mobile {
    width: 100%;
    min-height: 100vh;
    background-color: black;
    position: relative;
    color: white;
    padding-top: 70px;
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
    position: relative;
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
  .radio_view_info_pana_onda {
    width: 100%;
    height: 60%;
    background-color: black;
    position: relative;
    background-size: cover;

  }

  .foto_locutor_container {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%, 0);
    height: 90%;
  }

  .foto_locutor_container>img {
    height: 100%;
  }

  .radio_view_info_pana_onda_info {
    position: absolute;
    left: 5px;
    bottom: 5px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    color: white;
    font-family: 'Oswald', sans-serif;
    z-index: 11;
    padding: 10px 12px;
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

  .radio_view_info_logo {
    width: 80%;
  }
</style>
<script>
  const radio_view_info_pana_onda = $('.radio_view_info_pana_onda')
  const radio_view_info = $('.radio_view_info')
  const info_programa = $('.info_programa')
  const info_horario = $('.info_horario')
  const foto_locutor_img = $('.foto_locutor_img')

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
    console.log('got hereeee');
    let audio = document.getElementById('audio')
    console.log(audio);
    let now_playing_page = audio.getAttribute('data-now_playing').trim()
    if (now_playing_page != 'onda-cero' && now_playing_page != 'panamericana') {
      radio_view_info.show('fast')
      radio_view_info_pana_onda.hide('fast')
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
      radio_view_info.hide('fast')
      radio_view_info_pana_onda.show('fast')

      let radio = now_playing_page == 'onda-cero' ? 'onda-cero' : 'panamericana'
      $.ajax({
          url: `/get_program/${radio}`,
          method: 'GET',
          dataType: 'json',
          success: (data) => {
            // update_radio_info(data[0])
            console.log('*****************************');
            console.log(data);
            console.log('******************************');
            update_radio_pana_onda_info(data)
          },
          error: (e) => {
            console.log('error =-================================================');
            console.log(e);
          }
        }

      )
    }
  }

  const update_radio_pana_onda_info = (info) => {
    info_programa.text(info.nombre);
    info_horario.text(`${info.horaInicio} - ${info.horaFin}`)
    foto_locutor_img.attr('src', info.fotoLocutor)
    radio_view_info_pana_onda.css('background-image', `${info.page_background}`)
  }

  const update_radio_info = (info) => {
    console.log('------------------------------------------');
    console.log(info);
    console.log('------------------------------------------');
    let radio_view_info_logo = document.querySelector('.radio_view_info_logo')
    let radio_view_body = document.querySelector('.radio_view_body')

    if (info.fondo != "") {
      radio_view_info.css('background-image', `url('/images/${info.fondo}')`)
    } else {
      radio_view_info.css('background-image', `radial-gradient( ${info.color_uno} 0%, ${info.color_uno} 50%, ${info.color_dos} 100%)`)
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
  $(document).ready(() => {
    get_radio_info();
    get_recomended_radios();
  })

  const filter_radios_mobile = () => {
    let nombre = $('#filter_name_mobile')
    let ciudad = $('#filter_ciudad_mobile')
    console.log(`ciudad: ${ciudad.val()}, nombre: ${nombre.val() }`);
    console.log('input value changed');
    $('.radio_card').toArray().map(card=>{
      let name_re = new RegExp(nombre.val(), 'i')
      let city_re = new RegExp(ciudad.val(), 'i')
      let card_name = card.getAttribute('data-nombre') 
      let card_city = card.getAttribute('data-ciudad') 
      if(card_name.match(name_re) != null && card_city.match(city_re) != null) {
        card.style.display = 'block'
      } else {
        card.style.display = 'none'
      }
    })
  }

  const control_audio_from_radio_view = () => {
    let audio = document.querySelector('#audio')
    if(audio.paused) {
      audio.load()
    } else {
      audio.pause()
    }
  }
</script>