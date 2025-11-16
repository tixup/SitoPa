<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>

  <style>
  /* container dell'immagine: diventa il “campo” del collage */
  .home-hero-media{ position: relative; overflow: hidden; }

  /* layer sopra l'immagine che conterrà le miniature */
  .collage-layer{
    position:absolute; inset:0; pointer-events:none; 
    z-index:2; /* sopra alla foto, sotto a eventuali overlay futuri */
  }

  /* ogni miniatura del collage */
  .collage-tile{
    position:absolute; 
    width: clamp(12%, 16vw, 24%); /* dimensione base, poi JS può sovrascrivere */
    border-radius: 6px;
    box-shadow: 0 8px 26px rgba(0,0,0,.15);
    opacity: 0; transform: scale(.96);
    transition: opacity .45s ease, transform .45s ease;
  }
  .collage-tile.show{ opacity:1; transform: scale(1); }

  @media (max-width: 980px){
    .collage-tile{ width: clamp(18%, 28vw, 36%); }
  }
</style>


  <body>
    <?php include __DIR__ . '/Header.html'; ?>

    <main class="home" role="main">
      <section class="home-hero" aria-label="Introduzione">
        <div class="home-wrap">
          <figure class="home-hero-media">
            <img src="../img/Shopinn/Home_B&W.jpg" alt="Shoppin Brugnato 5Terre" loading="eager" decoding="async">
            <div class="collage-layer" aria-hidden="true"></div>
          </figure>

          <div class="home-hero-text" aria-label="Testo introduttivo">
            <p>
              Partendo dalla ricerca<br>
              delle atmosfere<br>
              di un luogo o spazio,<br>
              con la storia<br>
              e la materia<br>
              di cui sono composti,<br>
              progettiamo il desiderio<br>
              dell’abitare,<br>
              e di insediare<br>
              le attività dell’uomo,<br>
              valorizzando così l’identità<br>
              e la cultura del territorio.
            </p>
          </div>
        </div>
      </section>
    </main>

    <?php include __DIR__ . '/Footer.html'; ?>


   <script>
(function(){
  const STEP_MS   = 3000;     // ogni 3s
  const MAX_TILES = 20;       // massimo tentativi per run

  const layer = document.querySelector('.collage-layer');
  const base  = document.querySelector('.home-hero-media img');
  if(!layer || !base) return;

  // Elenco immagini (ordinale)
  const IMAGES = [
    '../img/Shopinn/13-744x533.jpg','../img/Castello/old.jpg',
    '../img/Shopinn/15-554x377.jpg','../img/Mulino/dopo-6-744x494.jpg',
    '../img/Castello/alto.jpg','../img/Mulino/prima-4-640x480.jpg',
    '../img/New/-29a1879-744x496.jpg','../img/Villa Gemma/dopo-1-744x518.jpg',
    '../img/Robe/jan-08.jpg-copia-1202x1498.jpeg', '../img/Mulino/dsc-102-744x1120.jpg',
    '../img/New/-29a1859-1124x1685.jpg'
  ];

  // Fisher–Yates per mescolare senza bias
  function shuffle(a){
    const arr = a.slice();
    for(let i=arr.length-1;i>0;i--){
      const j = Math.floor(Math.random()*(i+1));
      [arr[i],arr[j]] = [arr[j],arr[i]];
    }
    return arr;
  }

  let queue = [];
  const rand = (a,b)=> Math.random()*(b-a)+a;

  function nextSrc(){
    if(queue.length === 0) queue = shuffle(IMAGES); // nuova sequenza senza ripetizioni
    return queue.shift();
  }

  function placeOne(i){
    const el = new Image();
    el.className = 'collage-tile';
    el.src = nextSrc();
    el.decoding = 'async';
    el.loading = 'eager';

    el.onload = () => {
      const cw = layer.clientWidth, ch = layer.clientHeight;

      // SCALING PIÙ GRANDE
      const w = Math.round(rand(cw*0.24, cw*0.38)); 
      const ratio = el.naturalHeight && el.naturalWidth ? (el.naturalHeight/el.naturalWidth) : 0.75;
      const h = Math.round(w * ratio);

      // posizionamento entro i bordi
      const maxL = Math.max(0, cw - w);
      const maxT = Math.max(0, ch - h);

      el.style.width = w + 'px';
      el.style.height = h + 'px';
      el.style.left = Math.round(rand(0, maxL)) + 'px';
      el.style.top  = Math.round(rand(0, maxT)) + 'px';
      el.style.zIndex = 10 + i;

      layer.appendChild(el);
      requestAnimationFrame(()=> el.classList.add('show'));
    };
  }

  let timer=null, i=0;

  function clearLayer(){
    layer.querySelectorAll('.collage-tile').forEach(n=>n.remove());
  }

  function start(){
    clearInterval(timer);
    clearLayer();
    queue = shuffle(IMAGES);                  // nuova sequenza
    i = 0;
    const RUN_TILES = Math.min(MAX_TILES, IMAGES.length); // no repeat nel run
    timer = setInterval(()=>{
      placeOne(i++);
      if(i >= RUN_TILES){
        clearInterval(timer);
        setTimeout(start, STEP_MS);          // attende ultimo step e riparte
      }
    }, STEP_MS);
  }

  document.addEventListener('visibilitychange', ()=>{
    if(document.hidden){ clearInterval(timer); }
    else { start(); }
  });

  start();
})();
</script>


  </body>
</html>
