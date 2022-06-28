<main class="home">
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
  <div class="logo_container">
    <img src="<?php echo base_url('images/logoEPA.png') ?>" alt="">
  </div>
</main>
<style>
  main.home {
    background-color: black;
    width: 100%;
    height: 100vh;
    background-image: radial-gradient(circle, rgba(5, 89, 0, .75)0%, rgba(0, 0, 0, 1)50%);
    position: relative;
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
  .logo_container {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50vh;
  }

  .logo_container>img {
    width: 100%;
  }
</style>