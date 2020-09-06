# App\Kernel  



## Implements:
Symfony\Component\HttpKernel\HttpKernelInterface, Symfony\Component\HttpKernel\TerminableInterface, Symfony\Component\HttpKernel\RebootableInterface, Symfony\Component\HttpKernel\KernelInterface

## Extend:

Symfony\Component\HttpKernel\Kernel

## Methods

| Name | Description |
|------|-------------|
|[loadRoutes](#kernelloadroutes)||

## Inherited methods

| Name | Description |
|------|-------------|
| [__clone](https://secure.php.net/manual/en/symfony\component\httpkernel\kernel.__clone.php) | - |
| [__construct](https://secure.php.net/manual/en/symfony\component\httpkernel\kernel.__construct.php) | - |
| [__sleep](https://secure.php.net/manual/en/symfony\component\httpkernel\kernel.__sleep.php) | - |
| [__wakeup](https://secure.php.net/manual/en/symfony\component\httpkernel\kernel.__wakeup.php) | - |
|boot|{@inheritdoc}|
|getAnnotatedClassesToCompile|Gets the patterns defining the classes to parse and cache for annotations.|
|getBundle|{@inheritdoc}|
|getBundles|{@inheritdoc}|
|getCacheDir|{@inheritdoc}|
|getCharset|{@inheritdoc}|
|getContainer|{@inheritdoc}|
|getEnvironment|{@inheritdoc}|
|getLogDir|{@inheritdoc}|
|getProjectDir|Gets the application root dir (path of the project's composer file).|
|getStartTime|{@inheritdoc}|
|handle|{@inheritdoc}|
|isDebug|{@inheritdoc}|
|locateResource|{@inheritdoc}|
|reboot|{@inheritdoc}|
|registerBundles|Returns an array of bundles to register.|
|registerContainerConfiguration|Loads the container configuration.|
| [setAnnotatedClassCache](https://secure.php.net/manual/en/symfony\component\httpkernel\kernel.setannotatedclasscache.php) | - |
|shutdown|{@inheritdoc}|
|stripComments|Removes comments from a PHP source string.|
|terminate|{@inheritdoc}|



### Kernel::loadRoutes  

**Description**

```php
 loadRoutes (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />

