<?php

// Définition du chemin de ce fichier ; OBLIGATOIRE - doit représenter le chemin du fichier ; en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require. Indique le namespace de la class à utiliser. Symfony & composer réalisent le require automatiquement. 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Création de la classe ListController
class CocktailController extends AbstractController {
	
	// Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
    #[Route('/list-cocktails', name:"list-cocktails")] // Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée
    // Ajout d'une fonction nommée listCocktails (méthode) 
	public function listCocktails() { 

        $cocktails = [
            1 => [
                'id'            => 1,
                'nom'           => 'Mojito',
                'image'         => 'images/mojito.webp', // photo libre de droits
                'ingredients'   => [
                    '50 ml de rhum blanc',
                    '½ citron vert (en quartiers)',
                    '2 c.à.c. de sucre de canne',
                    '8 feuilles de menthe fraîche',
                    'Eau pétillante',
                    'Glace pilée'
                ],
                'date_creation' => '1942-01-01',
                'description'   => 'Classique cubain ultra-rafraîchissant mêlant menthe et citron vert.'
            ],
    
            2 => [
                'id'            => 2,
                'nom'           => 'Margarita',
                'image'         => 'images/margarita.jpg',
                'ingredients'   => [
                    '50 ml de tequila',
                    '25 ml de triple sec (Cointreau)',
                    '25 ml de jus de citron vert frais',
                    'Sel pour givrer le verre',
                    'Glace'
                ],
                'date_creation' => '1938-07-04',
                'description'   => 'Tequila, triple-sec et citron vert dans un verre givré de sel pour un équilibre acidulé-salé.'
            ],
    
            3 => [
                'id'            => 3,
                'nom'           => 'Old Fashioned',
                'image'         => 'images/old_fashioned.png',
                'ingredients'   => [
                    '60 ml de bourbon ou rye whisky',
                    '1 morceau de sucre',
                    '2 traits d’angostura bitters',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1880-05-15',
                'description'   => 'Icône des classiques : un whisky subtilement sucré et aromatisé aux bitters.'
            ],
    
            4 => [
                'id'            => 4,
                'nom'           => 'Piña Colada',
                'image'         => 'images/pina_colada.jpg',
                'ingredients'   => [
                    '60 ml de rhum blanc',
                    '90 ml de jus d’ananas',
                    '30 ml de crème de coco',
                    'Glaçons'
                ],
                'date_creation' => '1954-08-16',
                'description'   => 'Spécialité portoricaine crémeuse et fruitée à base d’ananas et de coco.'
            ],
    
            5 => [
                'id'            => 5,
                'nom'           => 'Negroni',
                'image'         => 'images/negroni.webp',
                'ingredients'   => [
                    '30 ml de gin',
                    '30 ml de vermouth rouge',
                    '30 ml de Campari',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1919-06-01',
                'description'   => 'Amertume élégante et notes d’agrumes pour ce grand classique italien.'
            ],
    ];
        return $this->render('list-cocktails.html.twig', ['cocktails' => $cocktails]);
    }

    #[Route('/single-cocktail', name:"single-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function singleCocktail() { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée

        $cocktails = [
            1 => [
                'id'            => 1,
                'nom'           => 'Mojito',
                'image'         => 'images/mojito.webp', // photo libre de droits
                'ingredients'   => [
                    '50 ml de rhum blanc',
                    '½ citron vert (en quartiers)',
                    '2 c.à.c. de sucre de canne',
                    '8 feuilles de menthe fraîche',
                    'Eau pétillante',
                    'Glace pilée'
                ],
                'date_creation' => '1942-01-01',
                'description'   => 'Classique cubain ultra-rafraîchissant mêlant menthe et citron vert.'
            ],

            2 => [
                'id'            => 2,
                'nom'           => 'Margarita',
                'image'         => 'images/margarita.jpg',
                'ingredients'   => [
                    '50 ml de tequila',
                    '25 ml de triple sec (Cointreau)',
                    '25 ml de jus de citron vert frais',
                    'Sel pour givrer le verre',
                    'Glace'
                ],
                'date_creation' => '1938-07-04',
                'description'   => 'Tequila, triple-sec et citron vert dans un verre givré de sel pour un équilibre acidulé-salé.'
            ],

            3 => [
                'id'            => 3,
                'nom'           => 'Old Fashioned',
                'image'         => 'images/old_fashioned.png',
                'ingredients'   => [
                    '60 ml de bourbon ou rye whisky',
                    '1 morceau de sucre',
                    '2 traits d’angostura bitters',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1880-05-15',
                'description'   => 'Icône des classiques : un whisky subtilement sucré et aromatisé aux bitters.'
            ],

            4 => [
                'id'            => 4,
                'nom'           => 'Piña Colada',
                'image'         => 'images/pina_colada.jpg',
                'ingredients'   => [
                    '60 ml de rhum blanc',
                    '90 ml de jus d’ananas',
                    '30 ml de crème de coco',
                    'Glaçons'
                ],
                'date_creation' => '1954-08-16',
                'description'   => 'Spécialité portoricaine crémeuse et fruitée à base d’ananas et de coco.'
            ],

            5 => [
                'id'            => 5,
                'nom'           => 'Negroni',
                'image'         => 'images/negroni.webp',
                'ingredients'   => [
                    '30 ml de gin',
                    '30 ml de vermouth rouge',
                    '30 ml de Campari',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1919-06-01',
                'description'   => 'Amertume élégante et notes d’agrumes pour ce grand classique italien.'
            ],
        ];

        $cocktailID = $_GET['id'];
        $singleCocktail = $cocktails[$cocktailID];

        return $this->render('single-cocktail.html.twig', ['cocktail' => $singleCocktail]);
    }

    #[Route('/three-cocktail', name:"three-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function threeCocktail() { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée

        $cocktails = [
            1 => [
                'id'            => 1,
                'nom'           => 'Mojito',
                'image'         => 'images/mojito.webp', // photo libre de droits
                'ingredients'   => [
                    '50 ml de rhum blanc',
                    '½ citron vert (en quartiers)',
                    '2 c.à.c. de sucre de canne',
                    '8 feuilles de menthe fraîche',
                    'Eau pétillante',
                    'Glace pilée'
                ],
                'date_creation' => '1942-01-01',
                'description'   => 'Classique cubain ultra-rafraîchissant mêlant menthe et citron vert.'
            ],

            2 => [
                'id'            => 2,
                'nom'           => 'Margarita',
                'image'         => 'images/margarita.jpg',
                'ingredients'   => [
                    '50 ml de tequila',
                    '25 ml de triple sec (Cointreau)',
                    '25 ml de jus de citron vert frais',
                    'Sel pour givrer le verre',
                    'Glace'
                ],
                'date_creation' => '1938-07-04',
                'description'   => 'Tequila, triple-sec et citron vert dans un verre givré de sel pour un équilibre acidulé-salé.'
            ],

            3 => [
                'id'            => 3,
                'nom'           => 'Old Fashioned',
                'image'         => 'images/old_fashioned.png',
                'ingredients'   => [
                    '60 ml de bourbon ou rye whisky',
                    '1 morceau de sucre',
                    '2 traits d’angostura bitters',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1880-05-15',
                'description'   => 'Icône des classiques : un whisky subtilement sucré et aromatisé aux bitters.'
            ],

            4 => [
                'id'            => 4,
                'nom'           => 'Piña Colada',
                'image'         => 'images/pina_colada.jpg',
                'ingredients'   => [
                    '60 ml de rhum blanc',
                    '90 ml de jus d’ananas',
                    '30 ml de crème de coco',
                    'Glaçons'
                ],
                'date_creation' => '1954-08-16',
                'description'   => 'Spécialité portoricaine crémeuse et fruitée à base d’ananas et de coco.'
            ],

            5 => [
                'id'            => 5,
                'nom'           => 'Negroni',
                'image'         => 'images/negroni.webp',
                'ingredients'   => [
                    '30 ml de gin',
                    '30 ml de vermouth rouge',
                    '30 ml de Campari',
                    'Zeste d’orange',
                    'Glaçon gros format'
                ],
                'date_creation' => '1919-06-01',
                'description'   => 'Amertume élégante et notes d’agrumes pour ce grand classique italien.'
            ],
        ];

        $cocktailThree = array_slice($cocktails, 2, 1, true);

        return $this->render('three-cocktail.html.twig', ['cocktails' => $cocktailThree]);
    } 

}
?>