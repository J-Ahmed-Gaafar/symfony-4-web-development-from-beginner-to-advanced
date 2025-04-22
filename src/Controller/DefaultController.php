<?php

namespace App\Controller;

use App\Services\GiftsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class DefaultController extends AbstractController
{

//    public function __construct(GiftsService $gifts)
//    {
//        $this->gifts = ['a', 'b', 'c', 'd'];
//    }

    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService  $gifts)
    {
//        $users = ['Adam', 'Robert', 'John', 'Susan'];

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        $this->addFlash(
            'warning',
            'Your changes were saved!'
        );

//        $cookie = new Cookie(
//            'my_cookie', // cookie name
//            'cookie_value', // cookie value
//            time() + (2 * 365 * 24 * 60 * 60) // Expires after 2 years
//        );
//
//        $res = new Response();
//        $res->headers->setCookie($cookie);
//        $res->send();

        $res = new Response();
        $res->headers->clearCookie('my_cookie');
        $res->send();

//        $gifts = ['flowers', 'car', 'piano', 'money'];
//        shuffle($gifts);

//        $entityManager = $this->getDoctrine()->getManager();

//        $user = new User;
//        $user->setName('Adam');
//        $user2 = new User;
//        $user2->setName('Robert');
//        $user3 = new User;
//        $user3->setName('John');
//        $user4 = new User;
//        $user4->setName('Susan');
//
//        $entityManager->persist($user);
//        $entityManager->persist($user2);
//        $entityManager->persist($user3);
//        $entityManager->persist($user4);
//
//        $entityManager->flush();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);

//        return $this->render('default/index.html.twig', [
//            'controller_name' => 'DefaultController',
//        ]);

//        return $this->json(['username' => 'john.doe']);

//        return new Response("Hello!");

//        return new Response("Hello! $name");

//        return $this->redirect('http://symfony.com');

//        return $this->redirectToRoute('default2');
    }

    /**
     * @Route("/default2/", name="default2")
     */
    public function index2()
    {
        return new Response('I am from default2 route');
    }

    /**
     * @Route("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */
    public function index3()
    {
        return new Response("Optional parameters in url and requirements for parameters");
    }

    /**
     * @Route(
     *     "/articles/{_locale}/{year}/{slug}/{category}",
     *     defaults={"category": "computers"},
     *     requirements={
     *     "_locale": "en|fr",
     *     "category": "computers|rtv",
     *     "year": "\d+",
     *     }
     * )
     */
    public function index4()
    {
        return new Response("An Advanced route example");
    }

    /**
     * @Route({
     *     "nl": "/over-ons",
     *     "en": "/about-us",
     * }, name="about_us")
     */
    public function index5()
    {
        return new Response("Translated routes");
    }
}
