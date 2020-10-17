# Deploying application

## Requirements

=== "Linux"
    * Apache 2
    * PHP 7.4+
    * Node.js 12.18+
        * npm 6.14+

## Preparing environment

### Setting up virtual host in Apache

Configure a virtual host serving the `public/` directory, as such:

```bash
<VirtualHost *:80>
    ServerName [server-name]
    ServerAdmin [server-admin]
    DocumentRoot [project-public-path]
    
    # If necessary, run as different user. Install suexec first.
    #SuexecUserGroup [user] [group:www-data]

    <Directory [project-public-path]>
        Options Indexes FollowSymLinks
        AllowOverride All
        DirectoryIndex index.php
        Order allow,deny
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>
```

### Configuring environment variables

In our `.env.local` we'll add some variables for setting up MySQL-connections, etc.


#### Database connection

```conf
DATABASE_URL=mysql://[user]:[password]@[host]:[port]/[database]?serverVersion=8.0
```

#### JSON Web Token keys

```conf
JWT_SECRET_KEY=config/jwt/private.pem
JWT_PUBLIC_KEY=config/jwt/public.pem
JWT_PASSPHRASE=[passphrase]
```

### Setting trusted proxy addresses (Optional)

If running the application behind a load balancer or proxy, we need to change a few configuration options.

In the root of the project, either edit `.env` or `.env.local` (preferred), adding addresses that should be trusted as proxies.

```conf
TRUSTED_PROXIES=127.0.0.0/8,10.0.0.0/8,172.16.0.0/12,192.168.0.0/16
```

### Executing post-deployment script

I've provided a post-deployment script under `bin/` that takes care of

* installing Composer-dependencies;
* installing Node.js-dependencies and
* building front-end assets.