<?php

namespace Database\Seeders;

use App\Models\SeriesTv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieTv extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeriesTv::create([
            "titolo" => "The Walking Dead",
            "durata" => 45.00,
            "stagioni" => 11,
            "episodi" => 177,
            "regista" => "Robert Kirkman",
            "categoria" => "Horror",
            "anno" => "2010",
            "trama" => "Rick Grimes è un vice sceriffo vittima di un incidente durante uno scontro a fuoco con dei fuorilegge: colpito alla schiena, va in coma, lasciando tra le lacrime la moglie Lori e il figlio Carl. Il risveglio, poco tempo dopo, è traumatico: l'ospedale è distrutto ed è pieno di cadaveri.",
            "fotoAnteprima" => null,
            "trailer" => null,
        ]);

        SeriesTv::create([
            "titolo" => "Chuck",
            "durata" => 42,
            "stagioni" => 5,
            "episodi" => 91,
            "regista" => "Josh Schwartz",
            "categoria" => "Azione",
            "anno" => 2007,
            "trama" => "Chuck Bartowski è un ragazzo di Burbank, in California, dove lavora come esperto di computer nel negozio di elettronica Buy More al NerdHerd, insieme al suo migliore amico Morgan Grimes. La serie racconta le vicende di Chuck, che riceve da un vecchio amico, un agente della CIA, una e-mail criptata che scarica inconsciamente nel suo cervello tutti i segreti del supercomputer neurale Intersect, costruito da CIA e NSA come database centralizzato",
            "fotoAnteprima" => null,
            "trailer" => null,
        ]);

        SeriesTv::create([
            "titolo" => "How i met your mother",
            "durata" => 20,
            "stagioni" => 9,
            "episodi" => 208,
            "regista" => "Pamela Fryman",
            "categoria" => "Sitcom",
            "anno" => 2005,
            "trama" => "Nell'anno 2030 Ted Mosby, un affermato architetto, inizia a raccontare ai suoi due figli gli eventi che, a partire da venticinque anni prima, lo hanno portato a conoscere quella che sarebbe diventata la sua futura moglie e loro madre.",
            "fotoAnteprima" => null,
            "trailer" => null,
        ]);
    }
}