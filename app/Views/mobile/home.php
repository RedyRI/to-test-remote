<main class="home_mobile">
  <div class="slide_mobile">
  <?php foreach($first_radios as $radio) :?> 
    <div class="slide_mobile_item">
      <a href="<?php echo $radio->ruta ?>">
        <img src="<?php echo base_url('images') .'/'. $radio->logo ?>" alt="">
      </a>
    </div> 
    <?php endforeach;?>  
    <div class="slide_mobile_item ver_todas">
      <a href="/radios">
        ver <br> todas
      </a>
    </div>
</div>
  <div class="home_mobile_logo">
    <img src="<?php echo base_url('images/logoEPA.png')?>" alt="">
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
  .slide_mobile_item  > a > img {
    width: 100%;
    border-radius: 10px;
  }
  .ver_todas {
    font-family: 'Oswald', sans-serif;
    text-align: center;
  }
  .ver_todas > a {
    text-decoration: none;
    color: white;
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    background-image: radial-gradient(circle,rgba(0,0,0,1)0%,#384518 100%);
    border-radius: 10px;
  }

</style>