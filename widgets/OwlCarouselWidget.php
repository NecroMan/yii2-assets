<?php
namespace milano\widgets;

use milano\assets\OwlCarouselAsset;
use yii\base\Widget;
use yii\helpers\Json;

class OwlCarouselWidget extends Widget
{

    /** Themes */
    const THEME_DEFAULT = 'default';
    const THEME_GREEN = 'green';

    /** @var bool Enable initialization of Owl Carousel on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSettings = [
        'nav' => true
    ];

    /** @var string Target selector to apply Owl Carousel plugin */
    public $selector = '.owl-carousel';

    /** @var string Which theme from defaults should be registered */
    public $theme;

    public function init()
    {
        $bundle = OwlCarouselAsset::register($this->getView());

        if ($this->theme !== null) {
            $bundle->css[] = 'assets/owl.theme.' . $this->theme . '.min.css';
        }

        $js = [];

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->selector) . ').owlCarousel(' . Json::encode($this->pluginSettings) . ');';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}
