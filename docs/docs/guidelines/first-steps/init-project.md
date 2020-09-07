# Initiera projektet

## Förkrav

=== "Linux"
    * [Git](https://git-scm.com/download/linux)
    * PHP 7.4 eller senare
    * [Node.js](https://nodejs.org/en/download/) 10.22 eller senare
    * [Symfony](https://symfony.com/download)
=== "Windows"
    * IIS, [XAMPP](https://www.apachefriends.org/index.html) eller WampServer
    * [Git](https://git-scm.com/download/win)
    * PHP 7.4 eller senare
    * [Node.js](https://nodejs.org/en/download/) 10.22 eller senare
    * [Symfony](https://symfony.com/download)

## Klona repo:t från GitHub

```bash
git clone https://github.com/alexvnilsson-edu/biograf_app.git biograf_app
```

## Installera projekt-beroenden

```bash
cd biograf_app/

# Installera beroenden för Symfony-applikationen.
symfony composer install

# Installera beroenden för front-end-applikationen (Webpack Encore + React).
npm install
```