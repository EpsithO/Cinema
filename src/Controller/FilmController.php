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
        $filmsSerialized = $serializer->serialize($films, 'json', ['groups' => 'list_films']);
        return new Response($filmsSerialized, 200, [
            'content-type' => 'application/json'
        ]);
    }

    #[Route('/films/{id}', name:'api_film_show')]
    public function show(FilmRepository $filmRepository, SerializerInterface $serializer, int $id): Response{
        $film = $filmRepository->findFilmWithSeancesSorted($id);
        $filmSerialized = $serializer->serialize($film, 'json', ['groups' => 'show_film']);
        return new Response($filmSerialized, 200, [
            'content-type' => 'application/json'
        ]);
    }
}
