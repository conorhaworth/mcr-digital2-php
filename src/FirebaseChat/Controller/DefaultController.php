<?php
/**
 * Created by IntelliJ IDEA.
 * User: ajvwhite
 * Date: 05/11/2016
 * Time: 22:04
 */

namespace FirebaseChat\Controller;

use FirebaseChat\Helper\FirebaseRealtimeDb;
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
        /** @var FirebaseRealtimeDb $firebaseService */
        $firebaseService = $this->get('firebase_chat.fbrealtimedb');

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }
}
