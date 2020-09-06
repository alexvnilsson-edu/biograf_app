# App\Security\LoginFormAuthenticator  



## Implements:
Symfony\Component\Security\Guard\AuthenticatorInterface, Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface

## Extend:

Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator

## Methods

| Name | Description |
|------|-------------|
|[__construct](#loginformauthenticator__construct)||

## Inherited methods

| Name | Description |
|------|-------------|
|checkCredentials|Returns true if the credentials are valid.|
|createAuthenticatedToken|Shortcut to create a PostAuthenticationGuardToken for you, if you don't really
care about which authenticated token you're using.|
|getCredentials|Get the authentication credentials from the request and return them
as any type (e.g. an associate array).|
|getUser|Return a UserInterface object based on the credentials.|
|onAuthenticationFailure|Override to change what happens after a bad username/password is submitted.|
|onAuthenticationSuccess|Called when authentication executed and was successful!|
|start|Override to control what happens when the user hits a secure page
but isn't logged in yet.|
|supports|Does the authenticator support the given Request?|
| [supportsRememberMe](https://secure.php.net/manual/en/symfony\component\security\guard\authenticator\abstractformloginauthenticator.supportsrememberme.php) | - |



### LoginFormAuthenticator::__construct  

**Description**

```php
 __construct (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />

