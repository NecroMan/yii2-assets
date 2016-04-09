<?php
namespace milano\widgets;

use milano\assets\LazyLoadAsset;
use milano\assets\NiceScrollAsset;
use yii\base\Widget;
use yii\helpers\Json;

class NiceScrollWidget extends Widget
{

    /** @var bool Enable initialization of jQuery.NiceScroll on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSettings = [];

    /** @var string Target selector to apply jQuery.NiceScroll plugin */
    public $selector = '.nicescroll';

    public function init()
    {
        NiceScrollAsset::register($this->getView());

        $js = [];

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->selector) . ').niceScroll(' . Json::encode($this->pluginSettings) . ');';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}
