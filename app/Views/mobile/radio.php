<div class="radio_mobile">
  <?php
  $background = $radio_info->fondo != ''  ? 'url(' . base_url('images') . '/' . $radio_info->fondo . ')' : 'radial-gradient(' . $radio_info->color_uno . ' 0%, ' . $radio_info->color_uno . ' 50%, ' . $radio_info->color_dos  . ' 100%)';
  ?>
  <?php if ($radio_info->artistas != '') : ?>
    <div class="artistas_mobile_container">
      <img src="<?php echo base_url('images') . '/' . $radio_info->artistas ?>" alt="">
    </div>
  <?php else : ?>
    <div class="logo_mobile_container">
      <img src="<?php echo base_url('images') . '/logo_' . $radio_info->pagina . '.png' ?>" alt="">
    </div>
  <?php endif; ?>
</div>
<style>
  .radio_mobile {
    width: 100%;
    height: 100vh;
    background-image: <?php echo $background ?>;
    background-size: cover;
    padding-top: 70px;
    position: relative;
  }

  .artistas_mobile_container,
  .logo_mobile_container {
    width: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .logo_mobile_container>img {
    width: 100%;
  }

  .artistas_mobile_container>img {
    width: 100%;
  }
</style>