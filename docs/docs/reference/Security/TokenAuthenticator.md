# App\Security\TokenAuthenticator  



## Implements:
Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface, Symfony\Component\Security\Guard\AuthenticatorInterface

## Extend:

Symfony\Component\Security\Guard\AbstractGuardAuthenticator

## Methods

| Name | Description |
|------|-------------|
|[__construct](#tokenauthenticator__construct)||

## Inherited methods

| Name | Description |
|------|-------------|
|checkCredentials|Returns true if the credentials are valid.|
|createAuthenticatedToken|Shortcut to create a PostAuthenticationGuardToken for you, if you don't really
care about which authenticated token you're using.|
|getCredentials|Get the authentication credentials from the request and return them
as any type (e.g. an associate array).|
|getUser|Return a UserInterface object based on the credentials.|
|onAuthenticationFailure|Called when authentication executed, but failed (e.g. wrong username password).|
|onAuthenticationSuccess|Called when authentication executed and was successful!|
|start|Returns a response that directs the user to authenticate.|
|supports|Does the authenticator support the given Request?|
|supportsRememberMe|Does this method support remember me cookies?|



### TokenAuthenticator::__construct  

**Description**

```php
 __construct (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />

