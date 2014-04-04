AsyncDispatcherBundle
=====================

[![Build Status](https://travis-ci.org/whitewhidow/AsyncDispatcherBundle.svg?branch=master)](https://travis-ci.org/whitewhidow/AsyncDispatcherBundle)
[![Latest Stable Version](https://poser.pugx.org/bbit/async-dispatcher-bundle/v/stable.png)](https://packagist.org/packages/bbit/async-dispatcher-bundle)
[![Total Downloads](https://poser.pugx.org/bbit/async-dispatcher-bundle/downloads.png)](https://packagist.org/packages/bbit/async-dispatcher-bundle)

AsyncDispatcherBundle is a simple bundle wich provides you with an async event dispatcher, wich will store events untill kernel.terminate, and then fire them using the regular event dispatcher.


### Step 1: Download BBITAsyncDispatcherBundle using composer

Add BBITAsyncDispatcherBundle in your composer.json:

```js
{
    "require": {
        "bbit/async-dispatcher-bundle": "2.0.0",
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update bbit/async-dispatcher-bundle
```

Composer will install the bundle to your project's `vendor/BBIT` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new BBIT\AsyncDispatcherBundle\BBITAsyncDispatcherBundle(),
    );
}
```


### Usage:

``` php
$dispatcher = $this->container->get('bbit_async_dispatcher.dispatcher'); // get dispatcher service
$dispatcher->addAsyncEvent('name_of_the.event', new CustomEvent($entity));
```
