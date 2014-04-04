<?php

namespace BBIT\AsyncDispatcherBundle\Tests\Component;

use BBIT\AsyncDispatcherBundle\Component\EventDispatcher\AsynchronousEventDispatcher;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AsynchronousEventDispatcherTest extends WebTestCase
{
    /**
     * @var \Symfony\Component\HttpKernel\Client
     */
    protected $client;

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function setUp()
    {
	    $this->client = static::createClient();
	    $this->container = $this->client->getContainer();
    }

    public function testServiceLoaded()
    {
       $this->assertEquals(get_class($this->container->get('bbit_async_dispatcher.dispatcher')), 'BBIT\AsyncDispatcherBundle\Component\EventDispatcher\AsynchronousEventDispatcher');
    }

    public function testListenerIsCalled()
    {
        /** @var AsynchronousEventDispatcher $dispatcher */
        $dispatcher = $this->container->get('bbit_async_dispatcher.dispatcher');

        $mockupEvent = new MockupEvent();

        $dispatcher->addAsyncEvent("test_event", $mockupEvent);
        $dispatcher->addListener("test_event", function($event, $name) use ($mockupEvent)
        {
            $this->assertTrue($event instanceof MockupEvent);
            $this->assertEquals($mockupEvent, $event);

            $this->assertEquals("test_event", $name);

            MockupListener::$called = true;
        });

        // this will trigger the 'kernel.terminate' event, also triggering your dispatchAsyncEvent()
        self::$kernel->terminate(new Request(), new Response());

        $this->assertTrue(MockupListener::$called);
    }
}

class MockupListener
{
    static public $called = false;
}

class MockupEvent extends Event
{
}