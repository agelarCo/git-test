<?php
namespace App\Controller;
use App\Entity\Post;
use App\Entity\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class HomeController extends BaseController
{
    public function index(Request $request, Response $response, array $args = []): Response
    {
        $this->logger->info("Home1 page action dispatched");
    $t=$request->getAttribute('hello');
    var_dump($t);
    $session=$request->getAttribute('session');
    $session->offsetSet('test',55);
    dump($session);
        return $this->render($request, $response, 'index.twig');
    }

    public function showGood(Request $request, Response $response, array $args = []): Response
    {

        return $this->render($request, $response, 'index.twig');
    }

    public function showUser(Request $request, Response $response, array $args = []){
        $user = $this->em->find('App\Entity\User',intval($args['id']));
        $posts= $user->getPosts();
        $posts=$posts->toArray();
        return $this->render($request,$response,'usersposts.twig',['posts'=>$posts]);

    }
    
    public function createPost(Request $request, Response $response, array $args = []){
        $user = $this->em->find('App\Entity\User',1);

        $newPost= new Post();
        $newPost->setContent('this is content')
                ->setSlug('what is slag?')
                ->setTitle('this is title')
                ->setUrl('jhsgfjhg')
                ->setUser($user);

        $this->em->persist($user);
        $this->em->persist($newPost);
            $this->em->flush();
        return $response;
    }

    public function viewPost(Request $request, Response $response, array $args = []): Response
    {
        $this->logger->info("View post using Doctrine with Slim 4");

        try {
            $post = $this->em->find('App\Entity\Post', intval($args['id']));

            if ($post==NULL){
                throw new \Exception(404);
            }
        } catch (\Exception $e) {
            throw new \Slim\Exception\HttpNotFoundException($request, $e->getMessage());
        }
        $session=$request->getAttribute('session');

        dump($session);
        return $this->render($request, $response, 'post.twig', ['post' => $post]);
    }
}
