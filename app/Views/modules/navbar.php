<div class="Navbar">
  <div class="hamburguer_button">
    <i class="material-icons menu">menu</i>
  </div>
  <ul>
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
      <a class="navbar_link" href="/about">  
        <i class="material-icons groups">groups</i>
        Nosotros</a>
    </li>
    <li>
      <a class="navbar_link" href="/about">  
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
  .material-icons.home,
  .material-icons.radio,
  .material-icons.menu,
  .material-icons.groups,
  .material-icons.headset{
    font-size: 30px;
    color: white;
    margin-right: 10px;
  }
  ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  ul > li {
    display: block;
  }
  a.navbar_link { 
    display: block;
    color:  white;
    font-size: 20px;
    text-decoration: none;
    width: 210px;
    padding: 10px 12px;
    font-family: 'Oswald', sans-serif;
    display: flex;
    align-items: center;
  }
 .hamburguer_button {
  padding: 10px 12px;
  cursor: pointer;
 }

 .hamburguer_button:hover {
  transform: scale(1.02);
 }

 .hamburguer_button:active {
  transform: scale(0.95);
 }


 a.navbar_link:hover {
  background-image: radial-gradient(black 0%,black 50%,rgba(119,129,55,1)100%);
 }
</style>
<script>
  let menu_active = false
  let menu_btn = $('.menu')
  let menu = $('.Navbar')
  menu_btn.click(e=>{
    menu_btn.text(menu_active ? 'menu' : 'close');
    menu_active ?  (menu.css('width','50px')) : menu.css('width','210px')
    menu_active = !menu_active
  })
</script>