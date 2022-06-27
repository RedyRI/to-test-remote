<div class="header">
  <div class="header_left">
    <div class="logo_container">
      <a href="/">
        <img class="logo" src="<?php echo base_url() ?>/images/logoEPA.png" alt="">
      </a>
    </div>
  </div>
  <div class="header_right">
    <div class="search_container">
      <input type="text" placeholder="Buscar radio ...">
      <i class="material-icons search">search</i>
      <div class="radios_list">
        <?php foreach ($radios as $radio) : ?>
          <div class="list_item">
            <a href="<?php echo $radio->ruta ?>">
              <img class="list_item_logo" src="<?php echo base_url() ?>/images/<?php echo $radio->logo ?>" alt="">
              <?php echo ucfirst($radio->nombre) ?>
            </a>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;

  }

  .header {
    color: white;
    width: 100%;
    background-color: black;
    height: 60px;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    z-index: 12;
  }

  .logo {
    width: 50px;
    margin-left: 10%;
  }

  .header_left,
  .header_right {
    flex: 0.5;
  }

  .header_right {
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }

  .search_container {
    margin-right: 10%;
    display: flex;
    align-items: center;
    padding: 10px 12px;
    border-radius: 25px;
    background-color: white;
    position: relative;
  }

  .radios_list {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    height: 0px;
    display: none;
    transition: height 2s ease;
    overflow-x: hidden;
    overflow-y: scroll;
    background-color: rgba(0, 0, 0, 0.8);
  }

  .radios_list::-webkit-scrollbar {
    width: 8px;
    /* Tamaño del scroll en vertical */
    height: 8px;
    /* Tamaño del scroll en horizontal */
  }

  /* Ponemos un color de fondo y redondeamos las esquinas del thumb */
  .radios_list::-webkit-scrollbar-thumb {
    background: #c7da2c;
    border-radius: 4px;
  }

  /* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
  .radios_list::-webkit-scrollbar-thumb:hover {
    background: #c7da2c;
    box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
  }

  /* Cambiamos el fondo cuando esté en active */
  .radios_list::-webkit-scrollbar-thumb:active {
    background-color: green;
  }

  /* Ponemos un color de fondo y redondeamos las esquinas del track */
  .radios_list::-webkit-scrollbar-track {
    background: transparent;
    border-radius: 4px;
    border: solid black 1px;
  }

  /* Cambiamos el fondo cuando esté en active o hover */
  .radios_list::-webkit-scrollbar-track:hover,
  .radios_list::-webkit-scrollbar-track:active {
    background: #d4d4d4;
  }

  .radios_list.active {
    height: 200px;
    display: block;
  }

  .list_item {
    font-size: 16px;
    display: flex;
    align-items: center;
    padding: 5px 7px;
    font-family: 'Oswald', sans-serif;
    cursor: pointer;
  }

  .list_item>a {
    color: white;
    text-decoration: none;
    width: 100%;
    display: flex;
    align-items: center;
  }

  .list_item:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

  .list_item_logo {
    width: 35px;
    margin-right: 10px;
  }

  .material-icons.search {
    font-size: 25px;
    color: rgba(0, 0, 0, 0.4);
    cursor: pointer;
    margin: 0 auto;
  }

  .material-icons.search:hover {
    transform: scale(1.02);
  }

  .material-icons.search:active {
    transform: scale(0.98);
  }

  .search_container>input {
    border: none;
    outline: none;
    padding: 5px 7px;
    width: 0;
    overflow: hidden;
    display: none;
  }

  .search_container>input.active {
    width: auto;
    overflow: visible;
    display: block;
  }

  .search_container>select {
    border: none;
    outline: none;
    padding: 5px 7px;
  }
</style>
<script>
  let search_active = false
  let search_button = $('.material-icons.search')
  let search_input = $('.search_container > input')
  let search_list = $('.search_container > .radios_list')
  let list_items = document.querySelectorAll('.list_item')

  search_button.click((e) => {
    search_button.text(search_active ? 'search' : 'close')
    search_active = !search_active
    search_input.toggleClass('active')
    search_list.toggleClass('active')
  })

  $('.search_container > input').keyup(function(e) {
    console.log(this.value);

    let input_value = new RegExp(this.value, 'i')
    list_items.forEach(item => {
      let nombre = item.textContent.trim()
      if (nombre.match(input_value) != null) {
        item.style.display = 'block'
      } else {
        item.style.display = 'none'
      }
    })
  })
</script>