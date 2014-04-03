<?php

namespace BBIT\AsyncDispatcherBundle\Tests\Component;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class AsynchronousEventDispatcherListenerTest extends WebTestCase
{
    public function setUp() {
	$this->client = static::createClient();
	$this->container = $this->client->getContainer();
    }

    public function testServiceLoaded()
    {
       $this->assertEquals(get_class($this->container->get('bbit_async_dispatcher.listener.terminate')), 'BBIT\AsyncDispatcherBundle\Component\EventDispatcher\AsynchronousEventListener');
    }
}
