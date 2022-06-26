<main class="radios">

  <div class="cards_container">
    <?php foreach ($radios as $radio) : ?>
      <div class="radio_card">
        <div class="radio_card_body">
          <div class="radio_card_logo">
            <img src="<?php echo  base_url() . '/images/' . $radio->logo ?>" alt="">
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

</main>
<style>
  .radios {
    padding-top: 150px;
    width: 100%;
    min-height: 100vh;
    background-color: black;
    color: white;
    font-family: 'Oswald', sans-serif;
  }

  .cards_container {
    display: grid;
    justify-content: center;
    border: solid red 1px;
    grid-template-columns: 250px 250px 250px;
    grid-template-rows: auto;
    gap: 25px;
  }

  .radio_card {
    border: solid green 1px;
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
    border: solid red 1px;
    position: relative;
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
    width: 100%;
    border-radius: 10px;
  }
</style>
<script>
  let interval
  let radio_name = $('.radio_playing')
  const handle_click_radio_card = (info) => {
    console.log(radio_name);
    let nombre = info.getAttribute('data-nombre')
    let pagina = info.getAttribute('data-pagina')
    let stream = info.getAttribute('data-stream')
    radio_name.text(nombre)
    clearInterval(interval)
    audio.src = stream
  }
</script>