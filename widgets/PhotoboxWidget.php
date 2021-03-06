<?php
namespace milano\widgets;

use milano\assets\PhotoboxAsset;
use yii\base\Widget;
use yii\helpers\Json;

class PhotoboxWidget extends Widget
{

    /** @var bool Enable initialization of prettyPhoto on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSettings = [
        'time' => 0
    ];

    /** @var string Target container of images */
    public $container = '#content';

    /** @var string Target selector to apply prettyPhoto plugin */
    public $selector = 'a[rel^="prettyPhoto"], a.lightbox, a.lightview';

    public function init()
    {
        PhotoboxAsset::register($this->getView());

        $js = [];

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->container) . ').photobox(' . Json::encode($this->selector) . ', ' .
                Json::encode($this->pluginSettings) . ');';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}