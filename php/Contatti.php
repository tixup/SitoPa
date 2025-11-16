<?php
// Configura qui l'indirizzo di destinazione
const CONTACT_TO = 'matteotognetti01@gmail.com';   // <-- cambia con la casella che preferisci (m.tognettiarch@gmail.com)

// Opzionale: mittente tecnico del tuo dominio (consigliato per deliverability)
const TECH_FROM = 'no-reply@tuo-dominio.it'; // mail deve esistere sul dominio (es. marco@architettotognetti.it)

/* 
NON POSSO PROVARE IL FUNZIONAMENTO DELLE MAIL NEL Localhost:8000
Opzione: MailHog/Mailpit che ascolta su localhost:1025 e Configura PHPMailer a usare SMTP host localhost porta 1025, senza auth/SSL; vedrai i messaggi nella UI
Altrimenti provare direttamente quando serve è up.
*/

$success = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanificazione
  $name    = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $email   = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
  $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $hp      = trim($_POST['website'] ?? ''); // honeypot

  // Validazione
  if ($hp !== '')            { $errors[] = 'Richiesta non valida.'; }
  if ($name === '')          { $errors[] = 'Il nome è obbligatorio.'; }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = 'Email non valida.'; }
  if ($subject === '')       { $subject = 'Richiesta dal sito'; }
  if ($message === '')       { $errors[] = 'Il messaggio è obbligatorio.'; }

  if (!$errors) {
    // Componi email testo semplice
    $body = "Nuovo messaggio dal sito:\n\n".
            "Nome: $name\n".
            "Email: $email\n".
            "Oggetto: $subject\n\n".
            "Messaggio:\n$message\n";

    // Intestazioni
    $from    = TECH_FROM ?: CONTACT_TO;
    $headers = [];
    $headers[] = "From: Sito <{$from}>";
    $headers[] = "Reply-To: {$name} <{$email}>";
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-Type: text/plain; charset=UTF-8";
    $headersStr = implode("\r\n", $headers);

    // Invio nativo (se il provider supporta mail())
    $ok = @mail(CONTACT_TO, 'Modulo contatti: '.$subject, $body, $headersStr);

    $success = $ok ? true : false;
    if (!$ok) { $errors[] = 'Invio non riuscito, riprova tra poco.'; }
  }
}
?>


<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contatti</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <?php include __DIR__ . '/Header.html'; ?>

    <main class="contact-page" role="main">
      <section class="contact-wrap" aria-label="Modulo contatti">
        <h1>Contatti</h1>

        <?php if ($success === true): ?>
          <div class="alert ok" role="status">Grazie, il messaggio è stato inviato correttamente.</div>
        <?php elseif ($success === false): ?>
          <div class="alert err" role="alert">Si è verificato un problema, verifica i campi e riprova.</div>
        <?php endif; ?>

        <?php if ($errors): ?>
          <ul class="alert err" role="alert">
            <?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <form class="form-minimal" method="post" novalidate>
          <!-- honeypot anti‑bot (nascosto agli utenti) -->
          <div class="hp" aria-hidden="true">
            <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
          </div>

          <label for="name">Il tuo nome</label>
          <input id="name" name="name" type="text" placeholder="Mario Rossi" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">

          <label for="email">La tua email</label>
          <input id="email" name="email" type="email" placeholder="nome@dominio.it" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

          <label for="subject">Oggetto</label>
          <input id="subject" name="subject" type="text" placeholder="Oggetto della richiesta" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">

          <label for="message">Il tuo messaggio</label>
          <textarea id="message" name="message" placeholder="Scrivi il tuo messaggio..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>

          <button type="submit" class="btn-primary">Invia</button>
        </form>
      </section>
    </main>

    <?php include __DIR__ . '/Footer.html'; ?>
  </body>
</html>

<script>
  if (new URLSearchParams(location.search).get('ok') === '1') {
    document.querySelector('.contact-form')?.reset();
  }
</script>
