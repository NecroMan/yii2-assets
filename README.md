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
    ...
    
    public $depends = [
        ...
        'milano\assets\FontAwesomeAsset',
        'milano\assets\PrettyLoaderAsset',
        'milano\assets\PrettyPhotoAsset'
    ];
}
```

In this case you can handle published files in your own way. Or you can use included widgets.

#### Widgets

Run any widget in a view

```php
\milano\assets\PrettyLoaderWidget::widget([
    'blockContent' => false
]);
```

or attach it to another asset in `AssetBundle::register($view)` method

```php
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    ...
    
    public static function register($view)
    {
        $asset = parent::register($view);

        \milano\assets\PrettyLoaderWidget::widget();
        \milano\assets\PrettyPhotoWidget::widget();

        return $asset;
    }
}
```

Remember: you can pass additional settings in `widget($config = [])` function.

#### prettyLoader

Add CSS to your project

```css
#loaderBackground {
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 1999;
}

#loaderIcon {
    font-size: 60px;
    line-height: 60px;
    font-weight: bold;
    display: none;
    position: fixed;
    top: 20px;
    right: 10px;
    z-index: 2000;
    color: #EEE;
}
```

Add HTML to your layout

```html
<div id="loaderIcon"><i class="fa fa-spinner fa-spin"></i></div>
<div id="loaderBackground"></div>
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