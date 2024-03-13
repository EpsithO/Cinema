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
class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film')]
    public function index(SerializerInterface $serializer, EntityManager $entityManager, FilmRepository $filmRepository, \Symfony\Component\HttpFoundation\Request $request): JsonResponse
    {

        $films = new Film();
        $films = $filmRepository->findFilmAffiche($films);
        $postsJson = $serializer->serialize($films, 'json', ['groups' => 'show_posts']);
        return new Response($postsJson, Response::HTTP_OK, ["content-type" => "application/json"]);


    }
}
