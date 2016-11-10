<?php
/**
 * Created by IntelliJ IDEA.
 * User: ajvwhite
 * Date: 05/11/2016
 * Time: 22:04
 */

namespace FirebaseChat\Controller;

use FirebaseChat\Helper\FirebaseRealtimeDb;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\Get("/messages")
     */
    public function getMessages(Request $request)
    {
        $firebaseService = $this->get('firebase_chat.fbrealtimedb');

        $messages = $firebaseService->getMessagesSinceLogin();
        $view = $this->view($messages, Response::HTTP_OK);
        if ($messages === null) {
            return $this->view("cannot find message", Response::HTTP_NOT_FOUND);
        }
        return $view;
    }

    /**
     * @Rest\Post("/messages/{username}")
     */
    public function postMessageAction(Request $request)
    {
        $firebaseService = $this->get('firebase_chat.fbrealtimedb');

        $username = $request->get('username');
        $content = $request->request->get('content');
        $escaped_content = htmlspecialchars($content);
        $trimmed_content = trim($escaped_content);

        $message = $firebaseService->writeMessage($username,$trimmed_content);
        $view = $this->view($message, Response::HTTP_INTERNAL_SERVER_ERROR);
        return $view;
    }
}
