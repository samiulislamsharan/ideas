# Ideas - A Platform for Big Brains

## Introduction

This project is inspired by X (formerly Twitter). I wanted to make a light weight social media application that my friends can use as well as showcasing my skills making Laravel applications.

## Installation

To be able to run this project you need:

- [Composer](https://getcomposer.org/ "Visit Composer's website") version: 2.6.6 or later: [https://getcomposer.org/download](https://getcomposer.org/download)
- [PHP](https://www.php.net/ "Visit PHP's website") version 8.1 or later: [https://www.php.net/downloads.php](https://www.php.net/downloads.php) and
- [MySQL Server](https://dev.mysql.com/ "Visit MySQL Website"): [https://dev.mysql.com/downloads/mysql](https://dev.mysql.com/downloads/mysql)

To install project dependencies, open a terminal in the root directory of the project and execute the following command:

```bash
composer install
```

If you wanto keep all the packages updated then use:

```bash
composer update
```

Now start the development server for the project using:

```bash
php artisan serve
```

## Configuration

In the root directory (see Directory Structure below) of the project, you'll find `.env.example` file. Make a copy of it and paste it on the same directory then rename it to `.env`

This is our Environment Variables configuration file. Now we need to configure our database and smtp.

Configuring Database:

* Enter your SQL Server's username in `DB_USERNAME` and password in `DB_PASSWORD`
* Create a database named same as `DB_DATABASE`
* Note: Your SQL Server might run on a different port, in that case change the port number also!

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ideas
DB_USERNAME=root
DB_PASSWORD=
```

Configuring SMTP:

To test the mail functionality I'll suggest using [**Mailtrap**](https://mailtrap.io/ "Goto Mailtrap and get your smtp token"). Signup or Login to your Mailtrap account then Goto **Email Testing** > **Inboxes** > **Inbox Settings** (Gear icon in the left of search bar) > **SMTP Settings >** Select **Integrations** Dropdown > Select **Laravel 9.+** then copy the code and paste replacing the below section:

```
MAIL_MAILER=smtp
MAIL_HOST=null
MAIL_PORT=null
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

## Directory Structure

Here's the directory structure of the project with necessary files and folders:

```
ideas/
│
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Admin/
│   │   ├── Middleware/
│   │   └── Kernel.php
│   ├── Mail/
│   ├── Models/
│   │   ├── Comment.php
│   │   ├── Idea.php
│   │   └── User.php
│   └── Providers/
│
├── bootstrap/
│   ├── app.php
│   └── cache/
│
├── config/
│
├── database/
│   ├── factories/
│   │	├── CommentFactory.php
│   │	├── IdeaFactory.php
│   │	└── UserFactory.php
│   ├── migrations/
│   └── seeders/
│
├── lang/
│   ├── bn/
│   └── en/
│
├── public/
│   ├── css/
│   ├── js/
│   ├── index.php
│   └── .htaccess
│
├── resources/
│   ├── css/
│   ├── js/
│   ├── views/
│   │	├── admin/
│   │	│   ├── comments/
│   │	│   ├── ideas/
│   │	│   ├── shared/
│   │	│   └── users/
│   │	├── auth/
│   │	├── emails/
│   │	├── errors/
│   │	├── ideas/
│   │	│   └── shared/
│   │	├── shared/
│   │	└── users/
│   │        └── shared/
│   │
├── routes/
│   ├── auth.php
│   └── web.php
│
├── storage/
│   ├── app/
│   ├── framework/
│   ├── logs/
│   └── ...
│
├── tests/
│   ├── Feature/
│   ├── Unit/
│   └── TestCase.php
│
├── .env.example
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── README.md
└── ...

```

# Case Study

## Technology Stack

- ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
- ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
- ![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
- ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
- ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
- [Bootswatch](https://github.com/thomaspark/bootswatch) - A collection of open source themes for [![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)

## Why choose this stack?

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Challanges

TODO: To be documented

### Mitigations

TODO: To be documented

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Samiul Islam via [samiulislamsharan@gmail.com](mailto:samiulislamsharan@gmail.com). All security vulnerabilities will be promptly addressed.

## License

* The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
* The PHP programming language is open-sourced software licensed under the [PHP License](https://www.php.net/license/3.01.txt).
* The MySQL database is open-sourced software licensed under the [GNU General Public License](https://www.gnu.org/licenses/gpl-3.0.html).
* The HTML5 and CSS3 are open-sourced software licensed under the [W3C Software Notice and License](https://www.w3.org/Consortium/Legal/2002/copyright-software-20021231).
* The Bootswatch themes are open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
