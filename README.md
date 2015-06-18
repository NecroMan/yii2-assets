Yii2 useful assets
==================
Useful assets (icons, js and css components) for Yii2 Framework.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist as-milano/yii2-assets "*"
```

or add

```
"as-milano/yii2-assets": "*"
```

to the require section of your `composer.json` file.

Usage
-----

### Assets

For any asset included just register it:

```php
\milano\assets\PrettyPhotoAsset::register($view);
```

or add it to `$depends` section of one of your base asset classes:

```php
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'milano\assets\FontAwesomeAsset',
        'milano\assets\PrettyLoaderAsset',
        'milano\assets\PrettyPhotoAsset'
    ];
}
```

### Helpers

* Icon helpers
    * [FontAwesome](http://fontawesome.io): `\milano\assets\FontAwesomeAsset`, `\milano\helpers\FA`
    * [WebHostingHub Glyphs](http://www.webhostinghub.com/glyphs/): `\milano\assets\WHHGAsset`, `\milano\helpers\WHHG`

First register or add to dependency corresponding asset.
Then add helper to use section of your view:

```php
use \milano\helpers\FA;
```

and use it:

```php
FA::icon('mars', [FA::SIZE_2X, FA::ROTATE_90]);
```

FontAwesome helper includes some useful icon setting you can pass in the second parameter.
Last parameter of `::icon` function in both helpers is additional classes for generated `<i>` tag.