<?php

namespace BBIT\AsyncDispatcherBundle\Component\EventDispatcher;

class AsynchronousEventListener
{
    protected $dispatcher;

    public function __construct(AsynchronousEventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function onKernelTerminate()
    {
        $this->dispatcher->dispatchAsync();
    }
}
