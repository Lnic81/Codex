<?php

namespace Database\Seeders;

use App\Models\Episodio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Episodi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episodio::create([
            "serieTv"=>"The Walking Dead",
            "titolo" =>"I giorni andati",
   
            "durata"=>60,
            "stagione"=>1,
            "episodio"=>1,
            "anno"=>2010,
            "trama"=>"L'agente di polizia Rick si risveglia dal coma e intraprende la ricerca della propria famiglia. Morgan e Duane cercano di insegnargli alcune basilari regole di sopravvivenza.",
            "fotoAnteprima"=>null,
            "trailer"=>null,
        ]);

        Episodio::create([
            "serieTv"=>"The Walking Dead",
            "titolo" =>"Una via d'uscita",
   
            "durata"=>60,
            "stagione"=>1,
            "episodio"=>2,
            "anno"=>2010,
            "trama"=>"Un gruppo di sopravvissuti resta intrappolato a causa di Rick. Questi intanto deve affrontare un nemico che si rivela essere molto più pericoloso degli zombie.",
            "fotoAnteprima"=>null,
            "trailer"=>null,
        ]);

        Episodio::create([
            "serieTv"=>"Chuck",
            "titolo" =>"Chuck vs I servizi segreti",
            "durata"=>60,
            "stagione"=>1,
            "episodio"=>1,
            "anno"=>2007,
            "trama"=>"Chuck Bartowski è il classico secchione nerd insicuro di sé, con serie difficoltà relazionali. Ma un giorno, in cui il suo ex migliore amico di università, agente della CIA, Bryce Larkin, gli invia prima di morire una mail.",
            "fotoAnteprima"=>null,
            "trailer"=>null,
        ]);

        Episodio::create([
            "serieTv"=>"Chuck",
            "titolo" =>"Chuck vs L'elicottero",
            "durata"=>60,
            "stagione"=>1,
            "episodio"=>2,
            "anno"=>2007,
            "trama"=>"La vita di Chuck si ritrova radicalmente cambiata: dalla postazione Nerd Herd del Buy More, al salvare il mondo e custodire i più importanti e pericolosi segreti del governo. La tensione cresce e deve decidere di chi fidarsi.",
            "fotoAnteprima"=>null,
            "trailer"=>null,
        ]);

        Episodio::create([
            "serieTv"=>"How I Met Your Mother",
            "titolo" =>"Una lunga storia",
            "durata"=>22,
            "stagione"=>1,
            "episodio"=>1,
            "anno"=>2008,
            "trama"=>"Quando il suo migliore amico Marshall si fidanza, Ted capisce che è giunto anche per lui il momento di trovare la sua anima gemella.",
            "fotoAnteprima"=>null,
            "trailer"=>null,
        ]);

        Episodio::create([
            "serieTv"=>"How I Met Your Mother",
            "titolo" =>"La giraffa viola",
            "durata"=>22,
            "stagione"=>1,
            "episodio"=>2,
            "anno"=>2008,
            "trama"=>"Dopo il disastro del loro primo incontro, Ted cerca disperatamente di ottenere un secondo appuntamento con Robin.",
            "fotoAnteprima"=>null,
            "trailer"=>null,
        ]);
    }
}