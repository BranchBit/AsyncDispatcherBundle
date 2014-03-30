<?php
 
namespace BBIT\AsyncDispatcherBundle\Component\EventDispatcher;
 
use Symfony\Component\HttpKernel\Event\PostResponseEvent;
 
class AsynchronousEventListener
{
	protected $dispatcher;
	 
	public function __construct(AsynchronousEventDispatcher $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}
	 
	public function onKernelTerminate(PostResponseEvent $event)
	{
		$this->dispatcher->dispatchAsync();
	}
}