<?php
require 'login.php';
 
class LoginTests extends PHPUnit_Framework_TestCase
{
    private $login;
 
    protected function setUp()
    {
        $this->login = new Login();
    }
 
    protected function tearDown()
    {
        $this->login = NULL;
    }
 
    public function testCredentials()
    {
        $result = $this->login->getConnection();
        $this->assertEquals($expected, $result);
    }
 
}
?>
