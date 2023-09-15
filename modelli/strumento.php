<?php
  // definizione del namespace per strumento
  namespace modelli\strumenti;

  // definizione della classe Strumento che rappresenta uno strumento musicale
  class Strumento {
    // proprieta' tipo rappresento la tipologia dello strumento
    public string $tipo;

    // usiamo il costruttore per creare nuova istanza dello Strumento passando nell'unico parametro la tipologia dello strumento
    public function __construct(string $tipo) {
      $this->tipo = $tipo;
    }
  }

?>