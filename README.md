# MicroTemplate

Lightweight PHP template system. Zero dependencies: download, add the script and it's ready to use (W.I.P.)

&copy; 2024 Alfonso Saavedra "Son Link"

Under MIT license

[Docs](https://son-link.github.io/MicroTemplate/)


## Install

You only need to download the file microtemplate.php, include it where you need it and import the class

```php
<?php
use MicroTemplate\Microtemplate;
require_once('microtemplate.php');
```

## How to use

### Create new instance
First we create a new instance of the MicroTemplate class.

```php
$mt = new MicroTemplate($path, $data=[])
```

The constructor accepts 2 parameters:

* **$path**: The path to the folder where the templates to use are located.

* **$data** (optional): An array with the data that will be needed at all times, for example, the URL where the CSS files are located.

### Render view

To render a view we will use the render method, which accepts 2 methods

* **$view**: The path to the view within the path defined in the constructor we are going to use, without the .php extension.

* **$data** (optional): an array with the data we are going to pass to the view. This data will be merged with the data passed in the constructor if it has been done.

#### Examples

##### View without data

```php
echo $mt->render('hello.php');
```

##### View with data

```php
echo $mt->render('hello.php', ['say' => 'Well, hello friends ;)']);
```

##### View inside subfolder

```php
echo $mt->render('includes/head', ['title' => 'My Web', 'assets' => 'https://myweb.io/assets']);
```

### Methods

#### escape:

Escapes HTML special caracteres such <, >, ' and " for prevent inject malicious code

##### inside code
```php
$html = $mt->escape('<a href="">This is a link</a>');
```
##### inside view
```php
<?= $this->escape('<a href="">This is a link</a>') ?>
```