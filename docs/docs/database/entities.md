# Entiteter i databasen

## User

```php
<?php
// src/Entity/User.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

class User extends UserInterface {
    /**
     * @ORM\Column([kolumn-egenskaper])
     */
    private $[kolumn-namn];
}
```