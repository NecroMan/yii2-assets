<?php
namespace milano\widgets;

use milano\assets\SuperfishAsset;
use yii\base\Widget;
use yii\helpers\Json;

// TODO: Extend Menu widget
class SuperfishWidget extends Widget
{

    /** Menu types */
    const TYPE_HORIZONTAL = 1;
    const TYPE_VERTICAL = 2;
    const TYPE_NAVBAR = 3;

    /** @var bool Enable initialization of Superfish on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSetting = [];

    /** @var string Target selector to apply Superfish plugin */
    public $selector = 'ul.sf-menu';

    /** @var int Menu type */
    public $menuType = self::TYPE_HORIZONTAL;

    /** @var bool Use Supersubs plugin */
    public $useSupersubs = false;

    /** @var array Additional Supersubs options */
    public $supersubsSetting = [];

    public function init()
    {
        $js = [];

        $bundle = $this->getView()->getAssetManager()->getBundle(SuperfishAsset::className());

        switch ($this->menuType) {
            case self::TYPE_VERTICAL:
                $bundle->css[] = 'css/superfish-vertical.css';
                break;

            case self::TYPE_NAVBAR:
                $bundle->css[] = 'css/superfish-navbar.css';
                break;
        }

        if ($this->useSupersubs) {
            $bundle->js[] = 'js/supersubs.js';

            $js[] = '$(' . Json::encode($this->selector) . ').supersubs(' . Json::encode($this->supersubsSetting) . ');';
        }

        if ($this->autoInit) {
            $js[] = '$(' . Json::encode($this->selector) . ').superfish(' . Json::encode($this->pluginSetting) . ');';
        }

        SuperfishAsset::register($this->getView());
        $this->getView()->registerJs(implode(' ', $js));
    }

}