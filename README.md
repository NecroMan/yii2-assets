Yii2 useful assets
==================
Useful assets (icons, js and css components) for Yii2 Framework.

**OPTIMIZED FOR OWN PROJECTS!**

Includes:
* Icons
    * [FontAwesome](http://fontawesome.io): `assets\FontAwesomeAsset`, `helpers\FA`
    * [WebHostingHub Glyphs](http://www.webhostinghub.com/glyphs/): `assets\WHHGAsset`, `helpers\WHHG`
* Scripts
    * [jQuery Migrate](http://blog.jquery.com/2013/05/08/jquery-migrate-1-2-1-released/): `assets\JQueryMigrateAsset`
    * [LazyLoad](http://www.appelsiini.net/projects/lazyload): `assets\LazyLoadAsset`, `widgets\LazyLoadWidget`
    * [prettyLoader](http://www.no-margin-for-errors.com/projects/prettyloader/): `assets\PrettyLoaderAsset`, `widgets\PrettyLoaderWidget`
    * [Owl Carousel](http://www.owlcarousel.owlgraphic.com/): `assets\OwlCarouselAsset`, `widgets\OwlCarouselWidget`
    * [Photobox](http://dropthebit.com/demos/photobox/): `assets\PhotoboxAsset`, `widgets\PhotoboxWidget`
    * [Bootstrap Notify](http://bootstrap-growl.remabledesigns.com/): `assets\BootstrapNotifyAsset`, depends on `assets\AnimateCssAsset`
    * [Animate.css](http://daneden.github.io/animate.css/)  + jQuery addon [AnimateCSS](https://github.com/craigmdennis/animateCSS): `assets\AnimateCssAsset`
    * [Owl Carousel](http://www.owlcarousel.owlgraphic.com/): `assets\OwlCarouselAsset`
    * [Slick](http://kenwheeler.github.io/slick/): `assets\SlickAsset`
    * [jQuery.NiceScroll](http://nicescroll.areaaperta.com): `widgets\NiceScrollWidget`
    * [jQuery.mmenu](http://mmenu.frebsite.nl): `widgets\MmenuWidget`
    * [HTML5 Sortable](http://lukasoppermann.github.io/html5sortable/examples/index.html): `assets\SortableAsset`

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

or attach it to another asset in `AssetBundle::register` method

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

Remember: you can pass additional settings in `*::widget` function.

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

#### Owl Carousel

Wrap carousel items in container with class `owl-carousel`.

#### LazyLoad

If you register AnimateCss Asset you can use it's animation effects to show loaded images:

```php
LazyLoadWidget::widget([
    'selector' => 'img[data-original]',
    'pluginSettings' => [
        'effect' => 'lazyAnimate',
        'effect_speed' => 'zoomIn' // Choose effect you want
    ]
]);
```

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
