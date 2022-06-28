<main class="radios">
  <h2>EPA FM</h2>
  <div class="radios_filter_container">
    <input type="text" placeholder="Buscar radio ..." onkeyup="filter_radios_cards()" id="filter_name">
    <select name="ciudad" id="ciudad" onchange="filter_radios_cards()">
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
          <div class="radio_card_logo">
            <img src="<?php echo  base_url() . '/images/logo_' . $radio->pagina . '.png' ?> " alt="">
            <div class="radio_card_play">
              <i data-nombre="<?= $radio->nombre ?>" data-pagina="<?= $radio->pagina ?>" data-stream="<?= $radio->stream ?>" onclick="handle_click_radio_card(this)" class="material-icons play_arrow radio_card_icon">play_arrow</i>
            </div>
            <div class="radio_card_visit">
              <div class="radio_card_visit_btn">
                <a href="<?php echo $radio->ruta ?>">VISITAR</a>
              </div>
            </div>
          </div>
          <div class="radio_card_name">
            <span> <?php echo $radio->nombre ?></span>
          </div>
          <div class="radio_card_description">
            <span> <?php echo $radio->pagina ?></span>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <?php echo $footer_content ?>
</main>
<style>
  .radios {
    padding-top: 150px;
    width: 100%;
    min-height: 100vh;
    background-color: black;
    color: white;
    font-family: 'Oswald', sans-serif;
    padding: 100px 0 50px 0;
    text-align: center;
    background-image: linear-gradient(to bottom, black 0%, black 30%, rgba(119, 129, 55, 1)100%);
  }

  .cards_container {
    display: grid;
    justify-content: center;
    grid-template-columns: 250px 250px 250px;
    grid-template-rows: auto;
    gap: 25px;
  }

  .radio_card {
    text-align: center;
  }

  .radio_card_body {
    width: 220px;
    margin: 1px solid white;
  }

  .radio_card_logo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 250px;
    height: 250px;
    position: relative;
    background-color: black;
    border-radius: 10px;
  }

  .radio_card_play {
    position: absolute;
    width: 100%;
    height: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    top: 0;
    left: 0;
    display: none;
    align-items: center;
    justify-content: center;
  }

  .radio_card_visit {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
  }

  .radio_card_visit>.radio_card_visit_btn>a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 15px 17px;
    border-radius: 10px;
    background-image: radial-gradient(black 0%, black 50%, rgba(119, 129, 55, 1)100%);
  }

  .radio_card_logo:hover>.radio_card_play,
  .radio_card_logo:hover>.radio_card_visit {
    display: flex;
  }

  .radio_card_play>.radio_card_icon {
    font-size: 80px;
    color: white;
    cursor: pointer;
  }

  .radio_card_play>.radio_card_icon:hover,
  .radio_card_visit>.radio_card_visit_btn>a:hover {
    transform: scale(1.1);
  }

  .radio_card_play>.radio_card_icon:active,
  .radio_card_visit>.radio_card_visit_btn>a:active {
    transform: scale(0.95);
  }


  .radio_card_logo>img {
    width: 80%;
    border-radius: 10px;
  }

  .radios_filter_container {
    padding: 10px 12px;
    border-radius: 25px;
    background-color: white;
    color: black;
    margin: 20px auto;
    width: 350px;
    display: flex;
    align-items: center;
    font-family: 'Oswald', sans-serif;
  }

  .radios_filter_container>input {
    flex: 0.6;
    border: none;
    outline: none;
    font-family: 'Oswald', sans-serif;
  }

  .radios_filter_container>select {
    flex: 0.4;
    border: none;
    outline: none;
    font-family: 'Oswald', sans-serif;
  }

  .radios_filter_container>select>option {
    padding: 15px 17px;
    color: black;
    background-color: white;
    font-family: 'Oswald', sans-serif;
  }

  .radios_filter_container>select>option:hover {
    background-origin: red;
  }
</style>
<script>
  let interval
  let filter_name = $('#filter_name')
  let filter_city = $('#ciudad')
  let radio_name = $('.radio_playing')
  const handle_click_radio_card = (info) => {
    console.log(radio_name);
    let nombre = info.getAttribute('data-nombre')
    let pagina = info.getAttribute('data-pagina')
    let stream = info.getAttribute('data-stream')
    radio_name.text(nombre)
    clearInterval(interval)
    audio.src = stream
    audio.setAttribute('data-now_playing', pagina)
    audio.setAttribute('data-now_playing_name', nombre)
  }

  const filter_radios_cards = () => {
    let cards = [...document.querySelectorAll('.radio_card')]
    let nombre = filter_name.val()
    let ciudad = filter_city.val()
    let filtered = []
    cards.map((card) => {
      if (card.getAttribute('data-nombre').match(new RegExp(nombre, 'i')) != null && card.getAttribute('data-ciudad').match(new RegExp(ciudad, 'i')) != null) {
        filtered.push(card)
        card.style.display = 'block'
      } else {
        card.style.display = 'none'
      }
    })
  }
</script>