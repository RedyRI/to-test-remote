<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EPA FM</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/home.css">
    <script src="<?php echo base_url()  ?>/js/splide/dist/js/splide.min.js"></script>
    <link defer rel="stylesheet" href="<?php echo base_url()  ?>/js/splide/dist/css/splide.min.css">
    
</head>
<body>
    <h1> EPA FM</h1>
    <pre>
        <?php 
        echo('<pre>');
        print_r($radios);
        echo('</pre>');
        echo('<pre>');
        print_r($redes_sociales);
        echo('</pre>');
        ?>
    </pre>
    <section class="splide" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
            <ul class="splide__list">
                <div class="splide__slide ondacero">
                    <a href="/about">
                        <img class="radio_logo_home" src="https://www.ondacero.com.pe/images/ondaVip.png" alt="">
                    </a>
                </div>
                
                <div class="splide__slide">
                        <img class="radio_logo_home" src="https://www.ondacero.com.pe/images/ondaVip.png" alt="">
                </div>

                <div class="splide__slide">
                    <img class="radio_logo_home" src="https://www.ondacero.com.pe/images/ondaVip.png" alt="">
                </div>

                <div class="splide__slide">
                     <img class="radio_logo_home" src="https://www.ondacero.com.pe/images/ondaVip.png" alt="">
                 </div>

                 <div class="splide__slide">
                    <img class="radio_logo_home" src="https://www.ondacero.com.pe/images/ondaVip.png" alt="">
                </div>
                <div class="splide__slide">Slide 03</div>
                <div class="splide__slide">Slide 01</div>
                <div class="splide__slide">Slide 02</div>
                <div class="splide__slide">Slide 03</div>
                 <div class="splide__slide">Slide 01</div>
                <div class="splide__slide">Slide 02</div>
                <div class="splide__slide">Slide 03</div>
                <div class="splide__slide">Slide 03</div>
                <div class="splide__slide">Slide 03</div>
            </ul>
    </div>
    </section>
</body>
<script defer>
    // $( document ).ready(function() {
    // console.log( "ready!" );
    // $('.ondacero').click((e)=>{
    //             console.log(e.target);
    //         })    
    // });

    var splide = new Splide( '.splide', {
    type   : 'loop',
    drag   : 'free',
    perPage: 3,
    } );

    splide.mount();

        
</script>
</html>