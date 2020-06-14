# php_oop_curd

A simple PHP Class for using with MySQL create, read, update and delete functions. 

* To Run this example directly in PHP server
  * php -S localhost:<port_number>
  * Page entry point -: localhost:<port_number>/app

**Config**<br />
You will need to change some variable values in the Database class

```php
private $servername = "<your_db_url>";
private $db_name = "<your_db_name>";
private $username = "<your_username>";
private $password = "<your_db_name>";
```
```php

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `priority_id` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

```

```php
CREATE TABLE `priorities` (
  `id` int NOT NULL,
  `priority` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

//samlple priority
INSERT INTO `priorities` (`id`, `priority`) VALUES (NULL, 'Low'), (NULL, 'Medium'), (NULL, 'High') 
```
