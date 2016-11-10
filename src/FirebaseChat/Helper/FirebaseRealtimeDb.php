<?php
/**
 * Created by IntelliJ IDEA.
 * User: whitea
 * Date: 07/11/2016
 * Time: 09:17
 */

namespace FirebaseChat\Helper;


use Firebase\FirebaseLib;
use Firebase\FirebaseStub;

class FirebaseRealtimeDb
{
    /**
     * The firebase Lib instance
     *
     * @var FirebaseLib|FirebaseStub
     */
    protected $firebaseClient;

    /**
     * Database base path
     *
     * @var string
     */
    protected $databaseBasePath;

    /**
     * FireBaseRealtimeDb constructor.
     *
     * @param string  $appUrl           The firebase application base URL
     * @param string  $authToken        The API auth token to use in REST API calls
     * @param string  $databaseBasePath The base database path for the application
     * @param boolean $stubbed          Whether or not to stub the responses (for tests)
     */
    public function __construct($appUrl, $authToken, $databaseBasePath, $stubbed = false)
    {
        if (!$stubbed) {
            $this->firebaseClient = new FirebaseLib($appUrl, $authToken);
        } else {
            $this->firebaseClient = new FirebaseStub($appUrl, $authToken);
        }
        $this->databaseBasePath = $databaseBasePath;
    }

    public function getMessagesSinceLogin()
    {
        $response = $this->firebaseClient->get($this->databaseBasePath . '/messages');

        if(!is_null($response)) {
            return json_decode($response, true);
        }
    }

    public function writeMessage($username, $content)
    {
        $fileExtensions = '/^.*\.(jpg|jpeg|png|gif)$/i';

        $timestamp = new \DateTime();

        if((!is_null($content) && !is_null($username) && ($content != ""))) {
            if(preg_match($fileExtensions, $content)){
                $content = '<img src="' . $content . '" class="img-max-height">';
            }

            $response = $this->firebaseClient->push($this->databaseBasePath . '/messages/', array("content" => $content,
                "timestamp" => $timestamp->format('Y-m-d\TH:i:s'),
                "username" => $username
            ));
        }


    }
}
