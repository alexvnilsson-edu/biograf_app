# symfony <b>composer</b>

Symfony levereras med [Composer](https://getcomposer.org/) som vi kan köra med `symfony composer ...`, men du kan också använda Composer som vanligt om så önskas.

## install

!!! note ""
    The install command reads the **composer.lock** file from the current directory, processes it, and downloads and installs all the libraries and dependencies outlined in that. If the file does not exist it will look for **composer.json** and do the same.

```bash linenums="0"
symfony composer install [alternativ]
```

Detta kommando körs för att installera samtliga beroenden för projektet, exempelvis efter att projektet klonats[^1] till den lokala miljön.

[^1]: I sammanhanget betyder *kloning* att projektets kodbas har skapats i den lokala miljön **utan** installerade beroenden. 