<?php
/**
 * Created by IntelliJ IDEA.
 * User: whitea
 * Date: 07/11/2016
 * Time: 11:01
 */

namespace FirebaseChat\Tests\FirebaseChat\Helper;

use FirebaseChat\Helper\FirebaseRealtimeDb;

class FirebaseRealtimeDbTest extends \PHPUnit_Framework_TestCase
{
  /**
   * @var Firebase\FirebaseStub
   **/
  private $firbaseClient;

  protected function __construct()
  {
    $testAppUrl = "PUT INFO HERE FOR TEST APP";
    $testAppAuthSecret = "PUT INFO HERE FOR TEST APP";
    $databaseBasePath = "/chat-test";

    $this->firbaseClient = new FirebaseRealtimeDb($testAppUrl, $testAppAuthSecret, $databaseBasePath, true);
  }
}
