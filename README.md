Export for view
===============
Export for view - source pure html

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist rmd/yii2-export "*"
```

or add

```
"rmd/yii2-export": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php 
$rmdExportType = $request->get('rmdExportType');
  \rmd\export\AutoloadExample::begin(["exportType"=>$rmdExportType]); ?>
tag's 
<?php \rmd\export\AutoloadExample::end(); ?>
```