<?php

// Définition du chemin de ce fichier ; OBLIGATOIRE - doit représenter le chemin du fichier ; en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require. Indique le namespace de la class à utiliser. Symfony & composer réalisent le require automatiquement. 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CocktailsRepository;
use App\Repository\CategoriesRepository;

// Création de la classe ListController
class CocktailController extends AbstractController {
	
	// Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
    #[Route('/list-cocktails', name:"list-cocktails")] // Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée
    // Ajout d'une fonction nommée listCocktails (méthode) 
	public function listCocktails() { 

        $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        return $this->render('list-cocktails.html.twig', ['cocktails' => $cocktails]);
    }

    #[Route('/single-cocktail/{id}', name:"single-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function singleCocktail($id) { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée

    // #[Route('/single-cocktail', name:"single-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
    // public function singleCocktail(Request $request) { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée
        $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findOneByID($id);

        // $cocktailID = $request->query->get("id");
        // $singleCocktail = $cocktails[$id];

        return $this->render('single-cocktail.html.twig', ['cocktail' => $cocktails]);
    }

    #[Route('/three-cocktail', name:"three-cocktail")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function threeCocktail() { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée

        $cocktailsRepository = new CocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        $cocktailThree = array_slice($cocktails, 2, 1, true);

        return $this->render('three-cocktail.html.twig', ['cocktails' => $cocktailThree]);
    } 


    #[Route('/cocktail-category', name:"cocktail-category")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function categoryCocktail() { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée
        
        $categoriesRepository = new CategoriesRepository;
        $categories = $categoriesRepository->findAll();
        
        return $this->render('cocktail-category.html.twig', ['categories' => $categories]);
    }

    #[Route('/selected-category/{id}', name:"selected-category")] // Définition d'une route, soit le chemin d'accès (url) à "/list-cocktails"
	public function selectedCategory($id) { 	// Ajout d'une fonction nommée listCocktails (méthode). Quand un utilisateur demande l'url "/list-cocktails", la fonction est appelée
        
        $categoriesRepository = new CategoriesRepository;
        $categories = $categoriesRepository->findOneByID($id);
        // $cocktailID = $request->query->get("id");
        // $category = $categories[$id];
        
        return $this->render('selected-category.html.twig', ['category' => $categories]);
    }
}
?>