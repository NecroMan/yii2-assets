<?php
namespace milano\widgets;

use milano\assets\PrettyPhotoAsset;
use yii\base\Widget;
use yii\helpers\Json;

class PrettyPhotoWidget extends Widget
{

    /** Available themes */
    const THEME_DARK_ROUNDED = 'dark_rounded';
    const THEME_DARK_SQUARE = 'dark_square';
    const THEME_DEFAULT = 'default';
    const THEME_FACEBOOK = 'facebook';
    const THEME_LIGHT_ROUNDED = 'light_rounded';
    const THEME_LIGHT_SQUARE = 'light_square';

    /** @var bool Enable initialization of prettyPhoto on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSetting = [
        'social_tools' => ''
    ];

    /** @var string Target selector to apply prettyPhoto plugin */
    public $selector = 'a[rel^="prettyPhoto"], a.lightbox, a.lightview';

    public function init()
    {
        PrettyPhotoAsset::register($this->getView());

        $js = [];

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->selector) . ').prettyPhoto(' . Json::encode($this->pluginSetting) . ');';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}