<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Portfolio Progetti</title>
    <style>
    </style>
</head>
<body>
     <?php include __DIR__ . '/Header.html'; ?>
    
    <section class="work" aria-label="Progetti">
       <h1 class="pr_title">Progetti</h1>
        <div class="work__header">
            <nav class="work__filters" aria-label="Filtri progetti">
                <button type="button" class="is-active" data-filter="all" aria-pressed="true">all</button>
                <button type="button" data-filter="commercial" aria-pressed="false">commercial</button>
                <button type="button" data-filter="residential" aria-pressed="false">residential</button>
                <button type="button" data-filter="restoration" aria-pressed="false">restoration</button>
                <button type="button" data-filter="office" aria-pressed="false">office</button>
            </nav>
        </div>

        <div class="work__grid">
            <!-- Prima riga: due immagini grandi -->
            <a class="card card--large" href="/php//Progetti/Shopinn.php" data-tags="commercial,office">
                <figure class="card__figure">
                    <img src="../img/Shopinn/Home_B&W.jpg" alt="Shopinn Brugnato 5Terre">
                </figure>
                <div class="card__title">SHOPINN BRUGNATO 5TERRE</div>
            </a>
            
            <a class="card card--large" href="/progetti/metal-panic" data-tags="residential,restoration">
                <figure class="card__figure">
                    <img src="../img/Mulino/img-2101-554x416.jpg" alt="Mulino">
                </figure>
                <div class="card__title">MULINO</div>
            </a>

            <!-- Seconda riga: tre immagini più piccole -->
            <a class="card" href="/progetti/villa-patrizzi" data-tags="residential,restoration">
                <figure class="card__figure">
                    <img src="../img/Villa Gemma/dopo-1-744x518.jpg" alt="Villa Gemma">
                </figure>
                <div class="card__title">VILLA GEMMA</div>
            </a>
            
            <a class="card" href="/progetti/new" data-tags="residential">
                <figure class="card__figure">
                    <img src="../img/New/-29a1879-744x496.jpg" alt="New">
                </figure>
                <div class="card__title">NEW</div>
            </a>
            
            <a class="card" href="/progetti/spiga-26" data-tags="restoration">
                <figure class="card__figure">
                    <img src="../img/Castello/il-castello-di-varese-744x561.jpg" alt="Spiga 26">
                </figure>
                <div class="card__title">CASTLE 26</div>
            </a>

            <!-- Terza riga: due immagini grandi -->
            <a class="card card--large" href="/progetti/terra" data-tags="office">
                <figure class="card__figure">
                    <img src="../img/Robe/jan-08.jpg-copia-1202x1498.jpeg" alt="Terra">
                </figure>
                <div class="card__title">TERRA</div>
            </a>
            
            <a class="card card--large" href="/progetti/giardino-metabolico" data-tags="commercial">
                <figure class="card__figure">
                    <img src="../img/Shopinn/15-554x377.jpg" alt="Giardino Metabolico">
                </figure>
                <div class="card__title">GIARDINO METABOLICO</div>
            </a>
        </div>
    </section>

    <?php include __DIR__ . '/Footer.html'; ?>

    <script>
        const btns = document.querySelectorAll('.work__filters [data-filter]');
        const cards = document.querySelectorAll('.work__grid .card');

        function applyFilter(f) {
            btns.forEach(b => {
                const active = b.dataset.filter === f;
                b.classList.toggle('is-active', active);
                b.setAttribute('aria-pressed', active);
            });
            
            cards.forEach(c => {
                const tags = (c.dataset.tags || "").split(',').map(s => s.trim().toLowerCase());
                const show = (f === 'all') || tags.includes(f);
                c.style.display = show ? '' : 'none';
            });
        }

        btns.forEach(b => b.addEventListener('click', () => applyFilter(b.dataset.filter)));
        applyFilter('all'); // stato iniziale
    </script>
</body>



</html>