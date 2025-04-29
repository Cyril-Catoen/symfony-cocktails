<?php

// Définition du chemin de ce fichier ; OBLIGATOIRE - doit représenter le chemin du fichier ; en remplaçant le dossier "src" par "App"
namespace App\Controller;

// Remplace le require. Indique le namespace de la class à utiliser. Symfony & composer réalisent le require automatiquement. 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\cocktailsRepository;


// Création de la classe PageController
class PageController extends AbstractController {

	#[Route('/', name:"home")] // Définition d'une route, soit le chemin d'accès (url) à "/"
	public function home() { // Ajout d'une fonction nommée Home (méthode) // Quand un utilisateur demande l'url "/", la fonction est appelée

        $cocktailsRepository = new cocktailsRepository;
        $cocktails = $cocktailsRepository->findAll();

        $lastCocktails = array_slice($cocktails, -2, 2, true);

        return $this->render('home.html.twig', [
        'cocktails' => $lastCocktails
        ]);
    }
}
?>