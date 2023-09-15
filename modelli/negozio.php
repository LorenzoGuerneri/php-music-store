<?php
    // definizione del namespace per negozio
    namespace modelli\negozio;

    // definizione della classe Negozio che rappresenta il negozio
    class Negozio {
        const nome = "MusicInstruments";    // costante per salvare il nome del negozio
        private array $vendite;             // array (collezione/lista) per registrae le vendite
                                            // ogni singolo elemento e' lo Strumento venduto
        private int $numeroClienti;         // proprieta' per registrare le visite di clienti all'interno di Negozio

        // costruttore inizializza una lista vuote per le vendite e mette a 0 il numero clienti
        public function __construct() {
            $this->vendite = [];
            $this->numeroClienti = 0;
        }

        // funzione per registrare l'ingresso del singolo cliente
        public function registraIngressoCliente() {
            $this->numeroClienti++;
        }

        // funzione per registrare una nuova vendita
        public function registraVendita($strumento) { 
            $this->vendite[] = $strumento;  // inserimento nell'array di vendita, in coda, la vendita di un nuovo strumento
        }

        // funzione per stampare il resocontro di vendite
        public function resoconto() {
            // usiamo array_reduce per raggruppare array di vendite per proprieta' tipo di oggetto Strumento
            $raggruppatoPerTipo = array_reduce($this->vendite, function ($result, $strumento) {
                $tipo = $strumento->tipo;
                if (!isset($result[$tipo])) {   // se il tipo non e' ancore presente nel ragruppamento, lo aggiungiamo
                    $result[$tipo] = [];
                }
                $result[$tipo][] = $strumento;  // per ogni tipo aggiungiamo in coda lo strumento venduto
                return $result;
            }, []);

            echo "<h2>Resoconto fine giornata</h2>";
            echo "<p>Oggi sono entrati $this->numeroClienti clienti.<br>";
            echo "Sono stati venduti ".count($this->vendite)." strumenti.<br>";
            echo "Di cui:<br>";
            echo "<ul>";
            foreach ($raggruppatoPerTipo as $tipo => $strumenti) {  // iteriamo il raggruppamento per stampare per ogni tipo strumento la quantita' di vendite
                                                                    // ogni elemento di $raggruppatoPerTipo e' la coppia (TIPO, Array di strumenti)
                echo "<li>$tipo: ".count($strumenti)."</li>";       // usiamo la funzione PHP count() per recuperare la lunghezza dell'array di strumenti venduti
            }
            echo "</ul>";
            echo "</p>";
        }

    }
    
?>
