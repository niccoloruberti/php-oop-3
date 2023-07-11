<?php

class Messaggio extends SistemaDiComunicazione {
    private $notificaLettura;
    private $accettazioneRisposta;
    static  $colore_led = 'green';

    public function __construct($_titolo, $_messaggio, $_mittente, $_destinatario, $_notificaLettura, $_accettazioneRisposta) {
        parent::__construct($_titolo, $_messaggio, $_mittente, $_destinatario);
        $this->notificaLettura = $_notificaLettura;
        $this->accettazioneRisposta = $_accettazioneRisposta;
    }

    public function invio() {
        return 'messaggio inviato';
    };
    public function risposta() {
        return 'messaggio di risposta';
    };
}

?>