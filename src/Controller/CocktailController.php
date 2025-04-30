<?php

// Définition du chemin de ce fichier ; OBLIGATOIRE - doit représenter le chemin du fichier ; en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require. Indique le namespace de la class à utiliser. Symfony & composer réalisent le require automatiquement. 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CocktailsRepository;
use App\Repository\CategoriesRepository;
use App\Entity\Cocktail;

// Création de la classe ListController
class CocktailController extends AbstractController {
	
	// Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
    #[Route('/list-cocktails', name:"list-cocktails")] // Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée
    // Ajout d'une fonction nommée listCocktails (méthode) 
	public function listCocktails(CocktailsRepository $cocktailsRepository) { 	// On utilise l'autowire de Symfony pour récupérer les objets dans le Repository concerné avec une variable donnée correspondant à notre tableau de données

        // $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        return $this->render('list-cocktails.html.twig', ['cocktails' => $cocktails]);
    }

    #[Route('/single-cocktail/{id}', name:"single-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function singleCocktail($id, CocktailsRepository $cocktailsRepository) { 	// On insère en paramètre l'id et le couple repository/variable à extraire du repository pour récupérer l'objet souhaité

    // #[Route('/single-cocktail', name:"single-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
    // public function singleCocktail(Request $request) { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée
        // $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findOneByID($id);

        // $cocktailID = $request->query->get("id");
        // $singleCocktail = $cocktails[$id];

        return $this->render('single-cocktail.html.twig', ['cocktail' => $cocktails]);
    }

    #[Route('/three-cocktail', name:"three-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function threeCocktail(CocktailsRepository $cocktailsRepository) { 	// On utilise l'autowire de Symfony pour récupérer les objets dans le Repository concerné avec une variable donnée correspondant à notre tableau de données

        // $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        $cocktailThree = array_slice($cocktails, 2, 1, true);

        return $this->render('three-cocktail.html.twig', ['cocktails' => $cocktailThree]);
    } 

    #[Route('/create-cocktail', name: "create-cocktail")]
	public function createCocktail(Request $request) {

        if($request->isMethod('POST')){

            $name = $request->request->get('name');
            $ingredients = $request->request->get('ingredients');
            $description = $request->request->get('description');
            $image = $request->request->get('image');
            $createdAt = $request->request->get('creation_date');

            $cocktail = new Cocktail($name, $ingredients, $description, $image, $createdAt);

            dd($cocktail);
        }
        
        return $this->render('create-cocktail.html.twig');
    }


    #[Route('/cocktail-category', name:"cocktail-category")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function categoryCocktail(CategoriesRepository $categoriesRepository) { 	// On utilise l'autowire de Symfony pour récupérer les objets dans le Repository concerné avec une variable donnée correspondant à notre tableau de données
        
        // $categoriesRepository = new CategoriesRepository;
        $categories = $categoriesRepository->findAll();
        
        return $this->render('cocktail-category.html.twig', ['categories' => $categories]);
    }

    #[Route('/selected-category/{id}', name:"selected-category")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function selectedCategory($id, CategoriesRepository $categoriesRepository) { 	// On insère en paramètre l'id et le couple repository/variable à extraire du repository pour récupérer l'objet souhaité
        
        // $categoriesRepository = new CategoriesRepository;
        $categories = $categoriesRepository->findOneByID($id);
        // $cocktailID = $request->query->get("id");
        // $category = $categories[$id];
        
        return $this->render('selected-category.html.twig', ['category' => $categories]);
    }
}
?>