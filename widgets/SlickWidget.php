<?php
namespace milano\widgets;

use milano\assets\OwlCarouselAsset;
use milano\assets\SlickAsset;
use yii\base\Widget;
use yii\helpers\Json;

class SlickWidget extends Widget
{

    /** Themes */
    const THEME_DEFAULT = 'slick-theme';

    /** @var bool Enable initialization of Slick Carousel on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSettings = [];

    /** @var string Target selector to apply Slick Carousel plugin */
    public $selector = '.slick-carousel';

    /** @var string Which theme from defaults should be registered */
    public $theme;

    public function init()
    {
        $bundle = SlickAsset::register($this->getView());

        if ($this->theme !== null) {
            $bundle->css[] = $this->theme . '.css';
        }

        $js = [];

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->selector) . ').slick(' . Json::encode($this->pluginSettings) . ');';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}
