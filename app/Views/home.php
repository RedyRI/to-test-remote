<main class="home">
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