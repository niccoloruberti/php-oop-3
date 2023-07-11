<?php

class Allegato {
    public $formato;
    public $dimensioni;

    public function __construct($_formato, $_dimensioni) {
        $this->formato = $_formato;
        $this->dimensioni = $_dimensioni;
    }
}

?>