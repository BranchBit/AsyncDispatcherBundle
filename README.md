AsyncDispatcherBundle
=====================


### Step 1: Download BBITAsyncDispatcherBundle using composer

Add BBITAsyncDispatcherBundle in your composer.json:

```js
{
    "require": {
        "bbit/async-dispatcher-bundle": "dev-master",
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
