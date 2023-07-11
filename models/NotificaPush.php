<?php

class NotificaPush extends SistemaDiComunicazione {
    private $visibile;
    private $icona;
    static  $colore_led = 'white';

    public function __construct($_titolo, $_messaggio, $_mittente, $_destinatario, $_visibile, $_icona) {
        parent::__construct($_titolo, $_messaggio, $_mittente, $_destinatario);
        $this->visibile = $_visibile;
        $this->icona = $_icona;
    }

    public function invio() {
        return 'notifica inviata';
    };
    public function click() {
        return 'apro il messaggio';
    };
}

?>