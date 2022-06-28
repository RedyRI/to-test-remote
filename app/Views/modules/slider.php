<div>
  <?php
  $first_five_radios = array_slice($radios, 0, 5)
  ?>
</div>
<section class="splide <?php echo $is_mobile == true ? 'mobile' : '' ?>" aria-label="Splide Basic HTML Example">
  <div class="splide__track">
    <div class="splide__list">

      <?php foreach ($first_five_radios as $radio) : ?>
        <div class="splide__slide">
          <a class="slider_link" href="<?php echo $radio->ruta ?>">
            <img class="list_item_logo" src="<?php echo base_url() ?>/images/logo_<?php echo $radio->pagina ?>.png" alt="">
          </a>
        </div>
      <?php endforeach ?>
      <div class="splide__slide">
        <a class="slider_link ver_todas_btn" href="/radios">
          <span>
            VER <br> TODAS
          </span>
        </a>
      </div>
    </div>
  </div>
</section>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .splide {
    width: 500px;
    height: 100px;
    background-color: transparent;
    position: fixed;
    top: 70px;
    left: 50%;
    transform: translate(-50%, 0);
    z-index: 11;
  }

  .splide.mobile {
    display: none;
  }

  .splide__track {
    width: 400px;
    height: 100px;
    margin: 0 auto;
  }

  .splide__slide {
    width: 100px !important;
    height: 100px !important;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .splide__slide>a {
    display: block;
    width: 90px;
    height: 90px;
    padding: 0;
  }

  .splide__slide>a>img {
    width: 90px;
    border-radius: 10px;
  }

  .ver_todas_btn {
    text-decoration: none;
    font-family: 'Oswald', sans-serif;
    color: white;
    text-align: center;
    border: solid red 1px;
    border-radius: 10px;
  }

  .ver_todas_btn>span {
    line-height: 45px;
  }

  .splide__pagination__page {
    background-color: rgba(255, 255, 255, 0.5) !important;
    /* top: 20px; */
  }

  .splide__pagination__page.is-active {
    background-color: rgba(255, 255, 255, 0.9) !important;
  }

  .radio_logo_home {
    width: 95px;
    border-radius: 10px;
  }

  .radio_logo_home:hover {
    cursor: pointer;
    transform: scale(1.02);
  }

  .radio_logo_home:active {
    transform: scale(0.98);
  }

  .splide__arrow {
    background-color: transparent;
    width: 40px;
    height: 40px;
  }

  .splide__arrow--next>svg {
    fill: #007aff !important;
    font-size: 25px;
  }

  .splide__arrow--next {
    right: 20px !important;
  }

  .splide__arrow--prev {
    left: 20px !important;
  }

  .splide__arrow--prev>svg {
    fill: #007aff !important;
    font-size: 25px;
  }
</style>
<script defer>
  var splide = new Splide('.splide', {
    type: '',
    drag: '',
    perPage: 4,
  });

  splide.mount();
</script>