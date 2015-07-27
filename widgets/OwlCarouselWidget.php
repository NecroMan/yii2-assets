<?php
namespace milano\widgets;

use milano\assets\OwlCarouselAsset;
use yii\base\Widget;
use yii\helpers\Json;

class OwlCarouselWidget extends Widget
{

    /** @var bool Enable initialization of Owl Carousel on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSetting = [
        'nav' => true
    ];

    /** @var string Target selector to apply Owl Carousel plugin */
    public $selector = '.owl-carousel';

    public function init()
    {
        OwlCarouselAsset::register($this->getView());

        $js = [];

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->selector) . ').owlCarousel(' . Json::encode($this->pluginSetting) . ');';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}