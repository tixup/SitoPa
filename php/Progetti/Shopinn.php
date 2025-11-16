<?php /* /php/Shopinn.php */ ?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPIN BRUGNATO 5TERRE</title>

    <style>
      :root{
        --page-max: 1300px;      /* larghezza contenuto centrale */
        --page-pad: 16px;        /* bordo laterale */
        --gap: 80px;             /* gap verticale principale */
        --muted:#6b6b6b;
        --line:#e6e6e6;
      }

      .proj{
        padding-block: 56px;     /* respiro uguale sopra/sotto */
      }
      .proj-wrap{
        width:100%;
        max-width: var(--page-max);
        margin-inline:auto;
        padding-inline: var(--page-pad);
      }

      /* back link */
      .proj-back{
        display:inline-flex; align-items:center; gap:8px;
        color: var(--muted); text-decoration:none; font-weight:600;
        margin-bottom: 10px;
      }
      .proj-back:hover{ opacity:.8 }

      /* titolo grande in stampatello */
      .proj-title{
        margin: 0 0 12px 0;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing:.02em;
        line-height:1.1;
        font-size: clamp(2rem, 4.2vw, 3.2rem);
      }

      /* hero flessibile (immagine larga) */
      .proj-hero{
        margin: 12px 0 8px 0;
      }
      .proj-hero img{
        width:100%; height:auto; display:block; border-radius: 0;
      }

      /* meta progetto */
      .proj-meta{
        display:grid; grid-template-columns: repeat(4,1fr);
        gap: 18px; padding: 18px 0 8px; border-bottom:1px solid var(--line);
        margin-bottom: var(--gap);
      }
      .meta-item{ font-size: clamp(0.98rem, 1.4vw, 1.05rem) }
      .meta-item b{ font-weight:800 }
      .meta-item span{ color:var(--muted) }

      /* blocchi alternati immagine+testo */
      .proj-block{
        display:grid; grid-template-columns: 1.1fr 0.9fr;
        gap: 28px; align-items: start; margin-bottom: var(--gap);
      }
      .proj-block.is-right{ grid-template-columns: 0.9fr 1.1fr; }
      .proj-figure{ margin:0 }
      .proj-figure img{ width:100%; height:auto; display:block; border-radius: 6px }
      .proj-cap{ margin-top:8px; color:var(--muted); font-size:.95rem }

      .proj-text{
        font-size: clamp(1.15rem, 1.9vw, 1.20rem);   /* testo */
        line-height: 1.75;
      }
      .proj-text p{ margin: 0 0 12px }

      /* quote o nota ampia */
      .proj-note{
        margin: 8px 0 var(--gap);
        padding: 12px 0 0;
        border-top: 1px solid var(--line);
        color: var(--muted);
        font-size: clamp(1rem, 1.6vw, 1.08rem);
      }

      /* --- blocco duo: testo + 2 immagini affiancate + testo --- */
    .proj-duo{ 
        margin-bottom: var(--gap); 
    }

    .proj-duo .duo-intro,
    .proj-duo .duo-outro{
        font-size: clamp(1.15rem, 1.9vw, 1.20rem);
        line-height: 1.75;
        margin-top: 80px;
        margin-bottom: 80px;
    }

    .img-pair{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;                   /* spazio bianco tra le due immagini */
        margin: 6px 0 14px;          /* stacco sopra/sotto il pair */
    }

    .img-pair .proj-figure{
        margin: 0;
    }

    .img-pair .proj-figure img{
        width: 100%;
        height: auto;
        display: block;
        border-radius: 6px;          /* armonizzato ai blocchi sopra */
    }

    .img-pair .proj-cap{
        margin-top: 8px;
    }

    /* responsivo: impila le due immagini */
    @media (max-width: 900px){
        .img-pair{ grid-template-columns: 1fr; }
    }


      /* responsive */
      @media (max-width: 980px){
        .proj-meta{ grid-template-columns: 1fr 1fr }
        .proj-block,
        .proj-block.is-right{ 
            grid-template-columns: 1fr; }
      }
      @media (max-width: 640px){
        .proj-meta{ grid-template-columns: 1fr }
      }
    </style>
  </head>

  <body>
    <?php include __DIR__ . '/../Header.html'; ?>

    <main class="proj" role="main">
      <div class="proj-wrap">

        <!-- capire se inserire sta roba -->
        <a class="proj-back" href="/php/Progetti.php" aria-label="Torna a Progetti">
          ← Torna a Progetti
        </a>

        <h1 class="proj-title">Shopinn Brugnato 5Terre</h1>

        <figure class="proj-hero">
          <!-- Sostituisci con la tua hero -->
          <img src="/../../img/Shopinn/a-1110x373.jpg" alt="Vista principale del progetto Shopinn Brugnato 5Terre">
        </figure>

        <section class="proj-meta" aria-label="Informazioni progetto">
          <div class="meta-item"><b>Year:</b> <span>2025</span></div>
          <div class="meta-item"><b>Location:</b> <span>Brugnato (SP)</span></div>
          <div class="meta-item"><b>Typology:</b> <span>Commercial & Public Space</span></div>
          <div class="meta-item"><b>Client:</b> <span>Shopinn Brugnato 5Terre</span></div>
        </section>

        <!-- Blocco 1: immagine a sinistra, testo a destra -->
        <section class="proj-block">
          <figure class="proj-figure">
            <img src="/../../img/Shopinn/Home_B&W.jpg" alt="Vista esterna del complesso">
            <figcaption class="proj-cap">Vista esterna dal piazzale d’ingresso.</figcaption>
          </figure>
          <div class="proj-text">
            <p>Il progetto riorganizza i flussi e gli spazi aperti per costruire una sequenza di luoghi riconoscibili, migliorando accessibilità e comfort lungo l’intero fronte commerciale.</p>
            <p>L’intervento lavora su materiali, luce e vegetazione per generare un paesaggio unitario capace di accogliere eventi e soste diffuse.</p>
            <p> La nuova pavimentazione unificante e l’attenta selezione di specie arboree definiscono un’identità chiara, trasformando un semplice percorso in un’esperienza quotidiana piacevole e condivisa.</p>
          </div>
        </section>

        <!-- Blocco 2: testo a sinistra, immagine a destra -->
        <section class="proj-block is-right">
          <div class="proj-text">
            <p>Gli elementi di arredo disegnano soglie e punti di orientamento, mentre le nuove pavimentazioni connotano gli ambiti senza interrompere la continuità degli attraversamenti.</p>
            <p>Le facciate e le coperture vengono trattate per garantire durabilità e facilità di manutenzione, con una palette cromatica coerente al contesto.</p>
            <p>Questi elementi, modulari e riconoscibili, permettono alla piazza di adattarsi naturalmente al mercato mattutino, alla pausa pomeridiana e agli eventi serali, garantendo sempre sicurezza e vitalità.</p>
          </div>
          <figure class="proj-figure">
            <img src="/../../img/Shopinn/15-554x377.jpg" alt="Schema distributivo e materiali">
            <figcaption class="proj-cap">Schema distributivo e palette materica.</figcaption>
          </figure>
        </section>

        <!-- Blocco 3: immagine a sinistra, testo a destra 
        <section class="proj-block">
          <figure class="proj-figure">
            <img src="/../../img/Shopinn/1-744x422.jpg" alt="Piantina del layout">
            <figcaption class="proj-cap">Layout funzionale e percorsi principali.</figcaption>
          </figure>
          <div class="proj-text">
            <p>La nuova illuminazione valorizza i percorsi e rende leggibili gli accessi nelle ore serali, riducendo l’inquinamento luminoso con apparecchi a ottiche schermate.</p>
          </div>
        </section>

        -->

        <!-- Blocco 4: doppia immagine o disegno 
        <section class="proj-block is-right">
          <div class="proj-text">
            <p>Il paesaggio vegetale agisce come infrastruttura climatica e percettiva, con specie resilienti e di facile gestione che definiscono ombre e filtri visivi.</p>
            <p>La modularità degli arredi consente riconfigurazioni per eventi stagionali o allestimenti temporanei.</p>
          </div>
          <figure class="proj-figure">
            <img src="/../../img/Shopinn/14-554x370.jpg" alt="Dettaglio arredi e aree di sosta">
            <figcaption class="proj-cap">Dettaglio delle aree di sosta e degli arredi modulari.</figcaption>
          </figure>
        </section>

        -->

        <!-- Blocco 3-4: testo breve + due immagini affiancate + testo -->
        <section class="proj-duo" aria-label="Approfondimento planimetrie">
        <!-- testo introduttivo (3/4 righe) -->
        <div class="duo-intro">
            <p>La struttura è organizzata per nuclei funzionali che semplificano gli attraversamenti e rendono flessibile l’uso degli spazi nelle diverse ore della giornata.<br>
            Le connessioni pedonali vengono chiarite da una sequenza di varchi e soglie attrezzate che integrano sedute, verde e illuminazione.
            L'uso di legno per le panche e la ghiaia per le aiuole contrasta con la continuità della pavimentazione principale, creando texture tattili e visive.
            Di notte, un sistema di illuminazione scenografico e funzionale esalta i volumi e garantisce l'orientamento, disegnando un ambiente accogliente e dinamico.</p>
        </div>

        <!-- due immagini affiancate -->
        <div class="img-pair">
            <figure class="proj-figure">
            <img src="/../../img/Shopinn/1-744x422.jpg" alt="Pianta piano terra Shopinn">
            <figcaption class="proj-cap">Pianta piano terra: percorsi e aree di sosta.</figcaption>
            </figure>

            <figure class="proj-figure">
            <img src="/../../img/Shopinn/14-554x370.jpg" alt="Pianta piano primo Shopinn">
            <figcaption class="proj-cap">Pianta piano primo: affacci e connessioni verticali.</figcaption>
            </figure>
        </div>

        <!-- testo conclusivo sotto le due immagini -->
        <div class="duo-outro">
            <p> La vegetazione non è solo decorazione, ma un vero e proprio componente spaziale che definisce ambiti e regola il microclima.
                Siepi basse delimitano le zone di rispetto, mentre alberature a medio fusto creano fasce d'ombra e protezione senza ostacolare la visuale.
                Questa stratificazione del verde contribuisce al benessere degli utenti, rendendo lo spazio un polmone sociale e ambientale integrato nel tessuto urbano.</p>
        </div>
        </section>


      </div>
    </main>

    <?php include __DIR__ . '/../Footer.html'; ?>
  </body>
</html>
