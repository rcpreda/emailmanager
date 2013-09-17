<?php
//namespace libs\Entities;
include dirname(__DIR__) . DIRECTORY_SEPARATOR . '../../libs\Entities\Email.php';

class MailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Mail
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

        $this->object = new Mail;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
        
        
    }

    /**
     * @covers libs\Entities\Mail::setSubject
     * @todo   Implement testSetSubject().
     */
    public function testSetSubject()
    {
        // Remove the following lines when you implement this test.
       $this->assertTrue(TRUE);
    }

    /**
     * @covers libs\Entities\Mail::getSubject
     * @todo   Implement testGetSubject().
     */
    public function testGetSubject()
    {
        // Remove the following lines when you implement this test.
        $sbj = $this->object->getSubject();
        print($sbj);
        
        $this->assertTrue(TRUE);
    }
}
