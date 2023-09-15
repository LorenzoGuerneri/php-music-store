<?php
  // definizione del namespace per cliente
  namespace modelli\cliente;

  // importiamo altri namespace usati in questo file
  use modelli\negozio\Negozio;
  use modelli\strumenti\Strumento;

  // definizione interfaccia per il cliente con la funzione saluta()
  interface ICliente { 
    public function saluta();
  }

  // definizione della classe che rappresenta la presenza del Cliente in un Negozio, e la sua implementazione dell'interfaccia ICliente (I sta per Interface, cioe' interfaccia)
  class Cliente implements ICliente {

    protected string $nome; // priprieta' che rappresenta il Nome del Cliente
    protected Negozio $negozio; // proprieta' che rappresenta il Negozio in cui e' entrato il Cliente
    protected array $strumenti; // proprieta' che rappresenta gli strumenti acquistati dal Cliente presso il Negozio

    // costruttore usato per creare nuova istanza del Cliente
    public function __construct(string $nome, Negozio $negozio) {
      $this->nome = $nome;
      $this->negozio = $negozio;
      $this->strumenti = [];  // inizialmente array di strumenti acquistati e' vuoto
    }

    // funzione per gestire l'acquisto del nuovo strumento musicale
    public function acquista(Strumento $strumento) {
      $this->strumenti[] = $strumento;  // inserimento in cosa di strumenti lo strumento acquistato
      $this->negozio->registraVendita($strumento);  // registrazione vendita presso il negozio
      echo "Grazie per aver acquistato il nostro prodotto<br><br>";
    }

    // funzione per stampare il messaggio quando il cliente non effettua nessun acquisto
    public function nonAcquista() {
      echo "Grazie e Arrivederci Sig./Sig.ra <b>$this->nome</b>. Torni presto a trovarci!<br><br>";
    }

    // funzione per registrare l'ingresso in Negozio e la stampa di benvenuto
    public function saluta() {
      $negozio = $this->negozio::nome;
      $this->negozio->registraIngressoCliente();  // registrazione ingresso
      echo "Benvenuto nel nostro negozio $negozio, Sig./Sig.ra <b>$this->nome</b>. Provi pure tutti gli strumenti che le interessano<br>";
    }
  }

?>