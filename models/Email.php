<?php

class Email extends SistemaDiCOmunicazione {
    private $notificaDiConsegna;
    static  $colore_led = 'yellow';
    public  $allegato;

    public function __construct($_titolo, $_messaggio, $_mittente, $_destinatario, $_notificaDiConsegna,) {
        parent::__construct($_titolo, $_messaggio, $_mittente, $_destinatario);
        $this->notificaDiConsegna = $_notificaDiConsegna;
    }

    public function invio() {
        return 'email inviata';
    };
    public function inoltra() {
        return 'email inoltrata';
    };
    public function stampa() {
        return 'email stampata';
    };
}

?>