<?php 
  // importazione file PHP contenenti codice PHP usato in questo file
  include "modelli/negozio.php";
  include "modelli/cliente.php";
  include "modelli/strumento.php";

  // importazione namespace contenenti le classi usati in questo file
  use modelli\cliente\Cliente;
  use modelli\negozio\Negozio;
  use modelli\strumenti\Strumento;

  // creazione nuova istanza (oggetto) del Negozio
  $negozio = new Negozio();

  // creazione nuova istanza (oggetto) del Cliente
  $cliente = new Cliente("Mario", $negozio);
  $cliente->saluta();                         // invocazione funzione di saluto
  $cliente->acquista(new Strumento("Basso")); // per ogni acquisto creo nuovo oggetto Strumento

  $cliente = new Cliente("Luigi", $negozio);
  $cliente->saluta();
  $cliente->acquista(new Strumento("Batteria"));
  $cliente->acquista(new Strumento("Batteria"));

  $cliente = new Cliente("Bowser", $negozio);
  $cliente->saluta();
  $cliente->nonAcquista();                    // invocazione funzione quando il cliente non esegue nessun acquisto

  $cliente = new Cliente("Peach", $negozio);
  $cliente->saluta();
  $cliente->nonAcquista();

  $cliente = new Cliente("Wario", $negozio);
  $cliente->saluta();
  $cliente->acquista(new Strumento("Chitarra"));
  $cliente->acquista(new Strumento("Chitarra"));

  $cliente = new Cliente("Toad", $negozio);
  $cliente->saluta();
  $cliente->acquista(new Strumento("Piano"));

  $cliente = new Cliente("Donkey Kong", $negozio);
  $cliente->saluta();
  $cliente->nonAcquista();

  $negozio->resoconto();                    // invocazione funzione di stampa resoconto

?>