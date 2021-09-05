<?php

use Illuminate\Database\Seeder;
use App\Centre;
use Carbon\Carbon;

class CentreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $centres = [
        ['libelle' => 'El hoceima','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Le secteur du tourisme à Al Hoceïma continue d’attirer les attentions. Après s’être attaqués au Grand Al Hoceïma, les projets sont maintenant focalisés sur l’arrière-pays qui jouit d’une grande richesse et d’immenses potentialités, surtout en matière de balnéaire.'],
        ['libelle' => 'Agadir','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Le secteur touristique se porte bien dans la destination Agadir qui a reçu, durant les sept premiers mois de l’année en cours, 613.891 visiteurs. Soit +14,35% par rapport à 2017. Les nuitées explosent aussi avec 2.872.356 enregistrées dans les hôtels classés de la ville contre +2,5% l’année écoulée'],
        ['libelle' => 'Essaidia','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Inaugurée le 19 juin 2009, la première station du plan Azur, Mediterrania Saïdia, a mis dix ans pour tirer une leçon de ses erreurs et atteindre enfin une taille litière critique pouvant lui assurer un véritable décollage économique. '],
        ['libelle' => 'Martil','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Cette ville touristique est un avant goût de l’Espagne, une ambiance chaleureuse et sympathique règne dans ce petit coin du Maroc. Beaucoup de touristes Marocains viennent en famille séjourner pour des vacances en camping, location ou hôtels pour des prix très raisonnable! Sur la côte méditerranéenne du Maroc. '],
        ['libelle' => 'Assila','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'De nombreux murs de maisons de la médina d’Asilah sont décorés d’oeuvres de street art. J’y consacrerai d’ailleurs un prochain billet sur ce blog afin de vous partager les photos de ces oeuvres de street art que j’ai pu prendre lors de mon séjour à Asilah.'],
        ['libelle' => 'Bouarfa','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Du sang nouveau pour Bouarfa. Cette petite ville de l’Oriental, chef-lieu de la province de Figuig, bénéficie désormais d’une nouvelle connexion aérienne directe avec Casablanca. La RAM Express vient en effet de lancer un vol domestique entre les deux villes. '],
        ['libelle' => 'Tanger','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Tanger, destination touristique en croissance. L’une de ses réussites est d’avoir su diversifier sa clientèle et ses niches de développement. Le créneau qui se développe le mieux est celui du tourisme d’affaires qui a réussi à prendre le dessus sur celui de loisirs.'],
        ['libelle' => 'Marakesh','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Petit à petit, la morosité dans le secteur du tourisme s’installe et les annulations ou les reports se font à la pelle avec un impact évident sur les trésoreries. Les professionnels s’y attendaient, mais gardent espoir: C’est une crise comme une autre et nous saurons la dépasser.'],
        ['libelle' => 'Dakhla','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Au bord de l’Atlantique, la ville de Dakhla est située sur une presqu’île de 40 km de long qui forme la baie de Rio de Oro. Véritable havre de paix entre lagune et océan, Dakhla se trouve à environ 400km de la frontière mauritanienne, aux portes du sud du Sahara Marocain.'],
        ['libelle' => 'Essaouira','created_at'=> Carbon::now(),'updated_at'=> Carbon::now(), 'description'=> 'Un bon score pour Essaouira durant le premier semestre de 2018. La ville des alizés s’en sort très bien sur le plan touristique et connaît une hausse de 23% en termes d’arrivées et de 17% en termes de nuitées.'],
    ];
    Centre::insert($centres);
    }
}
