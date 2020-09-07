# Migration av databasmodell

## Förkrav

=== "Linux/Windows"
    * MySQL Server[^1]


[^1]: Föredrar MySQL Server-version 8.0 över 5.6, men kompatibilitet finns vid behov. 

## Tillämpa databasmodell

Med kod-först-modeller blir första tillämpningen av datastrukturen till en riktig databas snabb och enkel.

!!! warning ""
    Innan du kör nedannämda kommandon behöver du säkerställa att variabeln **DATABASE_URL** är tilldelad en fungerande anslutningssträng.

    Läs mer om [Environment Variables i Symfony](https://symfony.com/doc/current/cloud/cookbooks/env.html).

```bash
# .env.local
DATABASE_URL=mysql://[anv.]:[lösen.]@[värd]/[db]?serverVersion=[version]
```

```bash
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```