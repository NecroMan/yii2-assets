Yii2 useful assets
==================
Useful assets (icons, js and css components) for Yii2 Framework.

Includes:
* Icons
    * [FontAwesome](http://fontawesome.io): `assets\FontAwesomeAsset`, `helpers\FA`
    * [WebHostingHub Glyphs](http://www.webhostinghub.com/glyphs/): `assets\WHHGAsset`, `helpers\WHHG`
* Scripts
    * [jQuery Migrate](http://blog.jquery.com/2013/05/08/jquery-migrate-1-2-1-released/): `assets\JQueryMigrateAsset`
    * [LazyLoad](http://www.appelsiini.net/projects/lazyload): `assets\LazyLoadAsset`, `widgets\LazyLoadWidget`
    * [prettyLoader](http://www.no-margin-for-errors.com/projects/prettyloader/): `assets\PrettyLoaderAsset`, `widgets\PrettyLoaderWidget`
    * [prettyPhoto](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/): `assets\PrettyPhotoAsset`, `widgets\PrettyPhotoWidget`
    * [Superfish](http://users.tpg.com.au/j_birch/plugins/superfish/): `assets\SuperfishAsset`, `widgets\SuperfishWidget`
    * [jCarousel](http://sorgalla.com/jcarousel/): `assets\JCarouselAsset`, `widgets\JCarouselWidget`
    * [jRumble](http://jackrugile.com/jrumble/): `assets\JRumbleAsset`

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
\milano\widgets\PrettyLoaderWidget::widget([
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

        \milano\widgets\PrettyLoaderWidget::widget();
        \milano\widgets\PrettyPhotoWidget::widget();

        return $asset;
    }
}
```

Remember: you can pass additional settings in `::widget` function.

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

#### jCarousel

Add CSS to your project

```css
/*
This is the visible area of you carousel.
Set a width here to define how much items are visible.
The width can be either fixed in px or flexible in %.
Position must be relative!
*/
.jcarousel {
    position: relative;
    overflow: hidden;
}

/*
This is the container of the carousel items.
You must ensure that the position is relative or absolute and
that the width is big enough to contain all items.
*/
.jcarousel ul {
    width: 20000em;
    position: relative;

    /* Optional, required in this case since it's a <ul> element */
    list-style: none;
    margin: 0;
    padding: 0;
}

/*
These are the item elements. jCarousel works best, if the items
have a fixed width and height (but it's not required).
*/
.jcarousel li {
    /* Required only for block elements like <li>'s */
    float: left;
}
```

By default widget initialize only core component. To add and configure plugins use property

```php
/** @var array Plugins with options */
public $plugins = [
    self::PLUGIN_AUTOSCROLL => [
        'enable' => false,
        'init' => false
    ],
    self::PLUGIN_CONTROL => [
        'enable' => false,
        'init' => false,
        'prevSelector' => '',
        'nextSelector' => '',
        'settings' => []
    ],
    self::PLUGIN_PAGINATION => [
        'enable' => false,
        'init' => false,
        'selector' => '',
        'settings' => []
    ],
    self::PLUGIN_SCROLLINTOVIEW => [
        'enabled' => false
    ]
];
```

`enable` just register corresponding file while `init` automatically initialize it with current jCarousel object.
Control plugin initialize Prev and Next buttons, so use in `['settings']['target']` only integer value. It automatically will be converted to `-=` and `+=` values respectively. Default target value is 1. 

### Helpers

#### Icon helpers

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