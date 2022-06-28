<div class="redes_sociales">
  <div class="redes_sociales_links">

    <?php 
      foreach($redes_sociales as $redes_radio) {
        if($redes_radio->radio == $pagina) {
          $redes = $redes_radio;
        }
      }
      $rs = ['fb','insta', 'tiktok','twitter','youtube', 'web'];
    ?>
    <?php foreach($rs as $red) :?>
      <?php if ($redes -> $red) :?>
        <a href="<?php echo $redes -> $red?>" target="_blank">
          <img src="<?php echo base_url('images')?>/<?php echo $red ?>_logo.png" alt="">
        </a>
      <?php endif ;?>
    <?php endforeach;?>

  </div>
  <div class="download_btns <?php echo $is_mobile ? 'mobile' : '' ?>">
    <a href="https://play.google.com/store/apps/details?id=com.touch.apppandafm&hl=es-419" target="_blank">
      <img src="<?php echo base_url('images/google_play.png')?>" alt="">
    </a>
    <a href="https://apps.apple.com/us/app/epa-fm/id1617706817" target="_blank">
      <img src="<?php echo base_url('images/appstore_ios.png')?>" alt="">
    </a>
  </div>
</div>
<style>
  .redes_sociales {
    position: absolute;
    bottom: 50px;
    right: 0px;
    background-color: rgba(0, 0, 0, 0.1);
    padding: 10px;
    color: black;
    z-index: 100;
    border-radius: 25px;
  }
  .redes_sociales_links {
    display: flex;
    justify-content: center;

  }

  .download_btns > a  >img {
    width: 100px;
  }
  .download_btns.mobile {
    display: none;
  }
  .redes_sociales_links > a {
    display: block;
    width: 25px;
    margin: 0 5px;
  }
  .redes_sociales_links > a > img {
    width: 100%;
}
</style>