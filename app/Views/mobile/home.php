<main class="home_mobile">
  <div class="slide_mobile">
    <?php foreach ($first_radios as $radio) : ?>
      <div class="slide_mobile_item">
        <a href="<?php echo $radio->ruta ?>">
          <img src="<?php echo base_url('images') . '/logo_' . $radio->pagina . '.png' ?> " alt="">
        </a>
      </div>
    <?php endforeach; ?>
    <div class="slide_mobile_item ver_todas">
      <a href="/radios">
        ver <br> todas
      </a>
    </div>
  </div>

  <div class="redes_container">
    <div class="redes_home">
      <a href="/" target="_blank">
        <img src="<?php echo base_url('images')?>/web_logo.png" alt="">
      </a>
      <a href="https://www.facebook.com/EpaFm" target="_blank">
        <img src="<?php echo base_url('images')?>/fb_logo.png" alt="">
      </a>
    </div>
    <div class="download_btns">
      <a href="https://play.google.com/store/apps/details?id=com.touch.apppandafm&hl=es-419" target="_blank">
        <img src="<?php echo base_url('images/google_play.png')?>" alt="">
      </a>
      <a href="https://apps.apple.com/us/app/epa-fm/id1617706817" target="_blank">
        <img src="<?php echo base_url('images/appstore_ios.png')?>" alt="">
      </a>
    </div>
  </div>

  <div class="home_mobile_logo">
    <img src="<?php echo base_url('images/logoEPA.png') ?>" alt="">
  </div>
</main>
<style>
  .home_mobile {
    width: 100%;
    height: 100vh;
    background-image: radial-gradient(circle, rgba(5, 89, 0, .75)0%, rgba(0, 0, 0, 1)50%);
    position: relative;
    padding-top: 70px;
  }

  .redes_container {
    position: absolute;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
  }
  .redes_home {
    display: flex;
    justify-content: center;
  }
  .redes_home > a > img{
    width: 25px;
    margin: 0px 5px;
  }
  .download_btns > a > img {
    width: 100px;
  }
  .home_mobile_logo {
    width: 80%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .home_mobile_logo>img {
    width: 100%;
  }

  .slide_mobile {
    width: 90%;
    height: 110px;
    margin: 0px auto;
    overflow-y: scroll;
    display: flex;
  }

  .slide_mobile_item {
    width: 90px;
    height: 90px;
    border: white solid 1px;
    border-radius: 10px;
    display: inline-block;
    flex-grow: 0;
    flex-shrink: 0;
    margin: 5px;
  }

  .slide_mobile_item>a>img {
    width: 100%;
    border-radius: 10px;
  }

  .ver_todas {
    font-family: 'Oswald', sans-serif;
    text-align: center;
  }

  .ver_todas>a {
    text-decoration: none;
    color: white;
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    background-image: radial-gradient(circle, rgba(0, 0, 0, 1)0%, #384518 100%);
    border-radius: 10px;
  }
</style>