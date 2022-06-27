const update_metadata = function () {
  let page = audio.getAttribute("data-now_playing");
  let page_name = audio.getAttribute("data-now_playing_name");
  let playbar_cover = $(".playbar_cover");
  let song_name = $(".song_name");
  let port;
  let titulo;
  let not_stats_src = false;

  const setSongCover = (titulo) => {
    let cover =
      "https://www.radio1160.com.pe/images/cancion/artista/logo_generico_2.png";
    if (titulo) {
      $.ajax({
        url:
          "https://itunes.apple.com/search?term=" +
          titulo +
          "&limit=1&entity=musicArtist,musicTrack,song",
        dataType: "jsonp",
        success: function (json_results) {
          if (json_results.resultCount != 0) {
            cover = json_results.results[0].artworkUrl100;
            console.log("cover setted");
          } else {
            console.log("no cover available");
          }
        },
        error: (e) => {
          console.log(
            "ha ocurrido un eror a lquere obtenerr cover de esta cancion"
          );
        },
        complete: (e) => {
          playbar_cover.attr("src", cover);
        },
      });
    } else {
      playbar_cover.attr("src", `/images/logo_${page}.png`);
    }
  };

  switch (page) {
    case "onda-cero":
      port = 8011;
      break;
    case "panamericana":
      port = 8000;
      break;
    case "la-nube":
      port = 8025;
      break;
    case "cumbia-mix":
      port = 8017;
      break;
    case "once-sesenta":
      port = 8021;
      break;
    case "la-vaca":
      port = 8007;
      break;
    case "onda-cero-vip":
      port = 8039;
      break;
    case "onda-cero-feeling":
      port = 8035;
      break;
    case "onda-cero-leyendas":
      port = 8033;
      break;
    default:
      not_stats_src = true;
      break;
  }

  // "http://streaming.gometri.com:" + port + "/stats?sid=1&json=1" --> for develpoment (local)
  // "https://streaming.gometri.com/stream/" + port + "/stats?sid=1&json=1" --> for produccion (deployed)
  if (!not_stats_src) {
    try {
      $.ajax({
        url: "http://streaming.gometri.com:" + port + "/stats?sid=1&json=1",
        dataType: "jsonp",
        timeout: 2000,
        success: function (data) {
          titulo = data.songtitle;
          song_name.text(titulo);
          setSongCover(titulo);
        },
        error: (e) => {
          console.log(
            "the has been a server error and no se pudo obtener titulo de cancion"
          );
        },
      });
    } catch (e) {
      console.log("an error has occurred while getting the title of the song");
    }
    // return titulo;
  } else {
    console.log("not stats source");
    song_name.text(page_name);
    setSongCover(titulo);
  }
};

const startMetadataUpdate = () => {
  setInterval(() => {
    update_metadata();
  }, 6000);
};

(() => {
  let song_name = $(".song_name");
  let page_name = audio.getAttribute("data-now_playing_name");
  song_name.text(page_name);
  startMetadataUpdate();
})();
