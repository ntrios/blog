# Blog Test
Following the proposed test, this repository aims to create an MVP of a blog based on the tutorial described on the official website of the [`CakePHP 2.x`](https://book.cakephp.org/2/en/tutorials-and-examples/blog/blog.html) framework.

## Table of Contents

- [Database](#database)
- [Built With](#built-with)
- [Getting Started](#getting-started)
- [Endpoints](#endpoints)
- [Testing](#testing)

## Database
Based on these instructions, I built: ![`eer diagram`](.github/blog-database.png)

## Built With
- PHP 7.4.9
- MySql 5.7.30

## Getting Started
### Git
You can also clone the repository using git: `https://github.com/ntrios/blog.git`

### Install dependencies
Now in a terminal, inside the project folder install the dependencies: `php composer.phar install`

### Configure database
Make a copy of `/app/Config/database.php.default` in the same directory, but name it `database.php`.

You must create a database and replace the values in the `$default` array with those that apply to your setup.

```php
	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'port' => 'port_number',
		'login' => 'user',
		'password' => 'password',
		'database' => 'database_name',
		'prefix' => '',
	);
```
### Create tables
```sql
CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    body TEXT NOT NULL,
    likes INT NOT NULL DEFAULT 0,
    is_published TINYINT NOT NULL DEFAULT 0,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
```
```sql
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(254) NOT NULL,
    email VARCHAR(200) UNIQUE,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
```
```sql
CREATE TABLE comments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    post_id INT UNSIGNED,
    body TEXT NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

ALTER TABLE `comments` ADD CONSTRAINT `fk_comments_users` FOREIGN KEY ( `user_id` ) REFERENCES `users` ( `id` ) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `comments` ADD CONSTRAINT `fk_comments_posts` FOREIGN KEY ( `post_id` ) REFERENCES `posts` ( `id` ) ON DELETE SET NULL ON UPDATE CASCADE;
```
### Populating database
```sql
INSERT INTO posts (id, title, body, created)
    VALUES (1, 'First Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NOW());
INSERT INTO posts (id, title, body, created)
    VALUES (2, 'Second Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NOW());
INSERT INTO posts (id, title, body, created)
    VALUES (3, 'Third Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NOW());
```

```sql
INSERT INTO users (id, name, email, created)
    VALUES (1, 'User 1', 'user1@email.com', NOW());
INSERT INTO users (id, name, email, created)
    VALUES (2, 'User 2', 'user2@email.com', NOW());
INSERT INTO users (id, name, email, created)
    VALUES (3, 'User 3', 'user3@email.com', NOW());
```

```sql
INSERT INTO comments (id, user_id, post_id, body, created)
	VALUES (1, 1, 1, 'Comment 1.', NOW());
INSERT INTO comments (id, user_id, post_id, body, created)
	VALUES (2, 2, 1, 'Comment 2.', NOW());
INSERT INTO comments (id, user_id, post_id, body, created)
	VALUES (3, 1, 1, 'Comment 3.', NOW());
INSERT INTO comments (id, user_id, post_id, body, created)
	VALUES (4, 3, 3, 'Comment 4.', NOW());
INSERT INTO comments (id, user_id, post_id, body, created)
	VALUES (5, 2, 3, 'Comment 5.', NOW());
```

## Endpoints
After you have done all of the above, and started the application, you will be able to visit the following endpoints:
- ```/posts/```
- ```/posts/add```
- ```/posts/edit/{post_id}```
- ```/posts/view/{post_id}```
- ```/users/```
- ```/users/add```
- ```/users/edit/{post_id}```
- ```/users/view/{post_id}```

## Testing
I also prepared a simple unit test with PHPUnit. Just testing if the application will not allow the creation of a post if any mandatory field is empty.

If you ran the dependency installation, PHPUnit is probably installed, otherwise run the following command:

```php
php composer.phar require --dev phpunit/phpunit:"4.* || 5.*" --update-with-dependencie
```

You must create a new database and replace the values in the `$test` array in `/app/Config/database.php` with those that apply to your setup.

```php
public $test = array(
	'datasource' => 'Database/Mysql',
	'persistent' => false,
	'host' => 'localhost',
	'login' => 'user',
	'password' => 'password',
	'database' => 'test_database_name',
	'prefix' => '',
	//'encoding' => 'utf8',
);
```

To view the test, visit: `{application_link}/test.php`
