<div onclick="hide_navbar(this)" class="Navbar <?php echo $is_mobile == true ? 'mobile' : '' ?>">
  <div class="hamburguer_button <?php echo $is_mobile == true ? 'mobile' : '' ?>">
    <i class="material-icons menu">menu</i>
  </div>
  <ul class="<?php echo $is_mobile == true ? 'mobile' : '' ?>" >
    <li>
      <a class="navbar_link" href="/">
        <i class="material-icons home">home</i>
        Inicio</a>
    </li>
    <li>
      <a class="navbar_link" href="/radios">
        <i class="material-icons radio">radio</i>
        Radios</a>
    </li>
    <li>
      <a class="navbar_link" href="/nosotros">
        <i class="material-icons groups">groups</i>
        Nosotros</a>
    </li>
    <li>
      <a class="navbar_link" href="/contacto">
        <i class="material-icons headset">headset_mic</i>
        Contacto</a>
    </li>
  </ul>
</div>
<style>
  .Navbar {
    width: 50px;
    height: calc(100vh - 60px);
    background-color: black;
    position: fixed;
    left: 0;
    top: 60px;
    background-color: rgba(255, 255, 255, 0.1);
    overflow: hidden;
    transition: width 0.3s ease;
    z-index: 10;
  }

  .Navbar.mobile {
    background-color: rgba(0, 0, 0, 0.8);
    width: 0;
    text-align: center;
  }

  .material-icons.home,
  .material-icons.radio,
  .material-icons.menu,
  .material-icons.groups,
  .material-icons.headset {
    font-size: 30px;
    color: white;
    margin-right: 10px;
  }

  ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  ul>li {
    display: block;
  }

  ul.mobile>li {
    display: flex;
    justify-content: center;
  }

  a.navbar_link {
    display: block;
    color: white;
    font-size: 20px;
    text-decoration: none;
    width: 210px;
    padding: 10px 12px;
    font-family: 'Oswald', sans-serif;
    display: flex;
    align-items: center;
  }
  ul.mobile>li>a{
    display: flex;
    justify-content: center;
    width: 100%;
  }
  .hamburguer_button {
    padding: 10px 12px;
    cursor: pointer;
  }
  .hamburguer_button.mobile {
    display: none;
  }

  .hamburguer_button:hover {
    transform: scale(1.02);
  }

  .hamburguer_button:active {
    transform: scale(0.95);
  }


  a.navbar_link:hover {
    background-image: radial-gradient(black 0%, black 50%, rgba(119, 129, 55, 1)100%);
  }
</style>
<script>
  let menu_active = false
  let menu_btn = $('.menu')
  let hamburguer_button = $('.hamburguer_button')
  let menu = $('.Navbar')
  hamburguer_button.click(e => {
    menu_btn.text(menu_active ? 'menu' : 'close');
    menu_active ? (menu.css('width', '50px')) : menu.css('width', '210px')
    menu_active = !menu_active
  })

  const hide_navbar = function(element) {
    if(element.classList.contains('Navbar') && element.classList.contains('mobile')) {
      let menu_btn_mobile = $('.menu.mobile')
      menu_btn_mobile.text('menu');
      menu.css('width', '0px')
      menu_active = !menu_active
      menu_mobile_active = !menu_mobile_active
    }

    // if(element.classList.contains('mobile') && element.classList.contains('Navbar')) {
    //   console.log('mobile navbar clicked');
    // }
  }
</script>