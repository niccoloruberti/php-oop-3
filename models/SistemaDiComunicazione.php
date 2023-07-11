<?php class SistemaDiComunicazione {
    private $titolo;
    private $messaggio;
    private $mittente;
    private $destinatario;
    static  $suoneria = 'DRINNN';

    public function __construct($_titolo, $_messaggio, $_mittente, $_destinatario) {
        $this->titolo = $_titolo;
        $this->messaggio = $_messaggio;
        $this->mittente = $_mittente;
        $this->destinatario = $_destinatario;
    };

    public function invio() {
        return 'invio effetuato';
    }
}

?>