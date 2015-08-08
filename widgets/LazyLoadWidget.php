<?php
namespace milano\widgets;

use milano\assets\LazyLoadAsset;
use yii\base\Widget;
use yii\helpers\Json;

class LazyLoadWidget extends Widget
{

    /** @var bool Enable initialization of LazyLoad on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSettings = [
        'effect' => 'fadeIn'
    ];

    /** @var string Target selector to apply LazyLoad plugin */
    public $selector = 'img.lazy';

    public function init()
    {
        LazyLoadAsset::register($this->getView());

        $js = [];

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->selector) . ').lazyload(' . Json::encode($this->pluginSettings) . ');';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}
