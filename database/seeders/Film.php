<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Films;

class Film extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Films::create([
            "idFilm" => 1,
            "titolo" => "The Fast and the Furious: Tokyo Drift",
            "durata" => 86.4,
            "regista" => "Justin Lin",
            "categoria" => "azione",
            "anno" => 2006,
            "trama" => "Shaun Boswell è un ragazzo irrequieto al quale piace partecipare alle corse di auto clandestine. Finito nei guai con la giustizia, è costretto, per evitare la prigione, a raggiungere suo padre che è militare in servizio a Tokyo.",
            "fotoAnteprima" => null,
            "trailer" => null,
        ]);

        Films::create([
            "idFilm" => 2,
            "titolo" => "Il Signore degli Anelli: La Compagnia dell'Anello",
            "durata" => 154.8,
            "regista" => "Peter Jackson",
            "categoria" => "Avventura",
            "anno" => 2001,
            "trama" => "Un giovane hobbit e un variegato gruppo, composto da umani, un nano, un elfo e altri hobbit, partono per un delicata missione, guidati dal potente mago Gandalf. Devono distruggere un anello magico e sconfiggere così il malvagio Sauron.",
            "fotoAnteprima" => null,
            "trailer" => null,
        ]);

        Films::create([
            "idFilm" => 3,
            "titolo" => "Tre uomini e una gamba",
            "durata" => 84,
            "regista" => "Aldo, Giovanni, Giacomo e Massimo Venier",
            "categoria" => "Commedia",
            "anno" => 1997,
            "trama" => "Un viaggio in auto dal nord al sud del Paese, in occasione di un matrimonio, si trasforma in un'odissea epica per tre impiegati e una preziosa gamba di legno.",
            "fotoAnteprima" => null,
            "trailer" => null,
        ]);
    }
}