<?php
namespace milano\widgets;

use milano\assets\LazyLoadAsset;
use milano\assets\MmenuAsset;
use milano\assets\NiceScrollAsset;
use yii\base\Widget;
use yii\helpers\Json;

class MmenuWidget extends Widget
{

    /** @var bool Enable initialization of jQuery.mmenu on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginOptions = [
        'navbar' => [
            'title' => 'Меню'
        ]
    ];

    /** @var array Additional plugin configuration */
    public $pluginConfig = [
        'offCanvas' => [
            'pageSelector' => '.wrap'
        ]
    ];

    /** @var string Target button selector to toggle jQuery.mmenu show */
    public $toggleButtonSelector = '.navbar-toggle';

    /** @var string Target selector to transform to jQuery.mmenu */
    public $menuContainerSelector = '.header-menu';

    public function init()
    {
        MmenuAsset::register($this->getView());

        $js = [];

        if ($this->autoInit) {
            $button = Json::encode($this->toggleButtonSelector);
            $menu = Json::encode($this->menuContainerSelector);
            $options = Json::encode($this->pluginOptions);
            $config = Json::encode($this->pluginConfig);

            $js[] = <<<JS
var \$button = \$($button);

    if (\$button.is(':visible')) {
        var \$menu = \$($menu);

        \$menu.mmenu($options, $config);

        var API = \$menu.data("mmenu");

        \$button.click(function () {
            API.open();
            return false;
        });
    }
JS;
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}
