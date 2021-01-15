<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
  * Class PostController
  * @package App\Controller
  * @Route("/", name="post_public")
  */
class PostPublicController extends AbstractController
{

  /**
   * @param PostRepository $postRepository
   * @return JsonResponse
   * @Route("/posts", name="posts", methods={"GET"})
   */
  public function getPosts(PostRepository $postRepository){
    $data = $postRepository->findAll();
    return $this->response($data);
  }

  /**
   * Returns a JSON response
   *
   * @param array $data
   * @param $status
   * @param array $headers
   * @return JsonResponse
   */
  public function response($data, $status = 200, $headers = [])
  {
    return new JsonResponse($data, $status, $headers);
  }

}