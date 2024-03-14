<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


/**
 * @method getDoctrine()
 */
#[Route('/api')]
class FilmController extends AbstractController
{
    #[Route('/films', name: 'api_films', methods: ['GET'])]
    public function index(FilmRepository $repository, SerializerInterface $serializer): Response
    {
        $films = $repository->findAll();
        $filmsSerialized = $serializer->serialize($films, 'json', ['groups' => 'film_affiche']);
        // affichage des films avec twig tempaltes/film/index.html.twig
        return new Response($filmsSerialized, 200, [
            'content-type' => 'application/json',

            $this->render('film/index.html.twig', [
                'controller_name' => 'FilmController',
                'films' => $films
            ])
        ]);
    }

    #[Route('/films/{id}', name:'api_film_show')]
    public function show(FilmRepository $filmRepository, SerializerInterface $serializer, int $id): Response{
        $film = $filmRepository->findFilmAffiche($id);
        $filmSerialized = $serializer->serialize($film, 'json', ['groups' => 'film_detail']);
        return new Response($filmSerialized, 200, [
            'content-type' => 'application/json'
        ]);
    }
}
