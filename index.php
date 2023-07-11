<?php

require __DIR__.'/models/SistemaDiCOmunicazione.php';
require __DIR__.'/models/Email.php';
require __DIR__.'/models/Messaggio.php';
require __DIR__.'/models/NotificaPush.php';
require __DIR__.'/models/Allegato.php';

$email = new Email('ciao', 'come stai?','mario', 'luigi', true);
$email->allegato = new Allegato ('pdf', 500);

$comunicazioni = [
    $email,
    new Email('bollette', 'devi pagare 50 euro', 'enel', 'antonio', true),
    new Messaggio('titolo', 'che ore sono?', 'fabio', 'marco', true, true),
    new Messaggio('Carlo', 'a che ora ci troviamo?', 'Carlo', 'Io', false, false),
    new NotificaPush('Just Eat', 'Il tuo ordine è pronto', 'Just Eat', 'Me', true, 'fas fa-utensils'),
    new NotificaPush('Amazon', 'Il tuo pacco è stato spedito', 'Amazon', 'Me', false, 'fas fa-box-open'),
]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema di Comunicazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="bg-primary">
        <h1 class="text-center py-4">Sistema Di Comunicazione</h1>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <?php foreach($comunicazioni as $comunicazione) { ?>
                    <div class="col-4 my-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- email -->
                                <?php if (get_class($comunicazione) === 'Email') { ?>
                                    <h3><?php echo $comunicazione->getTitle() ?></h3>
                                    <p>da: <?php echo $comunicazione->getSender() ?></p>
                                    <p>a: <?php echo $comunicazione->getRecipient() ?></p>
                                    <p>Messaggio: <?php echo $comunicazione->getMessage() ?></p>
                                    <?php if ($comunicazione->allegato) { ?>
                                        <p>Allegato.<?php echo $comunicazione->allegato->formato ?></p>
                                    <?php } ?>
                                    <?php if ($comunicazione->getNotification()) { ?>
                                        <i class='fas fa-check'></i> <span><?php echo $comunicazione::$suoneria ?></span>
                                    <?php } ?>
                                <?php } ?>
                                <!-- messaggio -->
                                <?php if (get_class($comunicazione) === 'Messaggio') { ?>
                                    <h3><?php echo $comunicazione->getTitle() ?></h3>
                                    <p>da: <?php echo $comunicazione->getSender() ?></p>
                                    <p>a: <?php echo $comunicazione->getRecipient() ?></p>
                                    <p>Messaggio: <?php echo $comunicazione->getMessage() ?></p>
                                    <?php if ($comunicazione->getReadingNotification()) { ?>
                                        <p><i class='fas fa-check'></i> <span>Notifica Lettura</span></p>
                                    <?php } else { ?>
                                        <p><i class='fas fa-x'></i> <span>Notifica Lettura</span></p>
                                    <?php } ?>
                                    <?php if ($comunicazione->getAnswerAcceptance()) { ?>
                                        <p><i class='fas fa-check'></i> <span>Accettazione risposta</span></p>
                                    <?php } else { ?>
                                        <p><i class='fas fa-x'></i> <span>Accettazione risposta</span></p>
                                    <?php } ?>
                                <?php } ?>
                                <!-- notifica push -->
                                <?php if (get_class($comunicazione) === 'NotificaPush') { ?>
                                    <h3><?php echo $comunicazione->getTitle() ?></h3>
                                    <p>da: <?php echo $comunicazione->getSender() ?></p>
                                    <p>a: <?php echo $comunicazione->getRecipient() ?></p>
                                    <p>Messaggio: <?php echo $comunicazione->getMessage() ?></p>
                                    <?php if ($comunicazione->getVisibility()) { ?>
                                        <p><i class='fas fa-check'></i> <span>Visibile</span></p>
                                    <?php } else { ?>
                                        <p><i class='fas fa-x'></i> <span>Visibile</span></p>
                                    <?php } ?>
                                    <p><i class='<?php echo $comunicazione->getIcon() ?>'></i></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
</body>
</html>