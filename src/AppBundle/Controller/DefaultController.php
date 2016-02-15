<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tweet;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $tweetStatuses = $em->getRepository('AppBundle:Tweet')->findBy(array(),array('id'=>'desc'));
        
        $form = $this->createFormBuilder()
                ->add('hashtag', 'text')
                ->add('search', 'submit')
                ->getForm();
        
        return $this->render('default/index.html.twig', array(
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
                    'form' => $form->createView(),
                    'tweets' => $tweetStatuses
        ));
    }
    
    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
        $twitter = $this->get('endroid.twitter');

        $em = $this->getDoctrine()->getManager();
        
        $tweetStatuses = array();
        
        $form = $this->createFormBuilder()
                ->add('hashtag', 'text')
                ->add('search', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();

            $response = $twitter->query("search/tweets", 'GET', 'json', 
                    array('q' => $data['hashtag']));

            $tweets = json_decode($response->getContent());

            foreach ($tweets->statuses as $key => $tweet) {

                $entity = new Tweet();
                $entity->setText($tweet->text);
                $entity->setCreatedAt(new \DateTime($tweet->created_at));
                $entity->setUserName($tweet->user->name);
                $entity->setScreenName($tweet->user->name);
                $entity->setProfileImg($tweet->user->profile_image_url);
                $entity->setRetweetCount($tweet->retweet_count);
                $entity->setFavouriteCount($tweet->favorite_count);
                $entity->setGeo($tweet->geo);
                $em->persist($entity);
            }
            $em->flush();
            $em->clear();
            $tweetStatuses = $tweets->statuses;
        }
        return $this->render('default/search.html.twig', array(
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
                    'form' => $form->createView(),
                    'tweets' => $tweetStatuses
        ));
    }

}
