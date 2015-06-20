<?php
namespace milano\widgets;

use milano\assets\JCarouselAsset;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\JsExpression;

// TODO: Extend Menu widget
class JCarouselWidget extends Widget
{

    /** Available plugins */
    const PLUGIN_AUTOSCROLL = 'autoscroll';
    const PLUGIN_CONTROL = 'control';
    const PLUGIN_PAGINATION = 'pagination';
    const PLUGIN_SCROLLINTOVIEW = 'scrollintoview';

    /** @var bool Enable initialization of jCarousel on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSetting = [];

    /** @var string Target selector to apply jCarousel plugin */
    public $selector = '.jcarousel';

    /** @var array Plugins with options */
    public $plugins = [
        self::PLUGIN_AUTOSCROLL => [
            'enable' => false,
            'init' => false
        ],
        self::PLUGIN_CONTROL => [
            'enable' => false,
            'init' => false,
            'prevSelector' => '',
            'nextSelector' => '',
            'settings' => []
        ],
        self::PLUGIN_PAGINATION => [
            'enable' => false,
            'init' => false,
            'selector' => '',
            'settings' => []
        ],
        self::PLUGIN_SCROLLINTOVIEW => [
            'enabled' => false
        ]
    ];

    public function init()
    {
        $js = [];

        $bundle = $this->getView()->getAssetManager()->getBundle(JCarouselAsset::className());

        foreach ($this->plugins as $plugin => $options) {
            if (!empty($options['enable'])) {
                $bundle->js[] = 'jquery.jcarousel-' . $plugin . '.min.js';
            }
        }

        if ($this->autoInit) {
            $id = 'carousel_' . $this->getId();

            $js[] = 'var ' . $id . ' = $(' . Json::encode($this->selector) . ').jcarousel(' . Json::encode($this->pluginSetting) . ');';

            foreach ($this->plugins as $plugin => $options) {
                switch ($plugin) {
                    case self::PLUGIN_AUTOSCROLL:
                        if (!empty($options['enable']) && !empty($options['init'])) {
                            $js[] = '$(' . Json::encode($this->selector) . ').jcarouselAutoscroll(' . Json::encode($options['settings']) . ');';
                        }

                        break;

                    case self::PLUGIN_CONTROL:
                        if (!empty($options['enable']) && !empty($options['init'])) {
                            if (empty($options['settings']['carousel'])) {
                                $options['settings']['carousel'] = new JsExpression($id);
                            }

                            if (!empty($this->plugins[self::PLUGIN_SCROLLINTOVIEW]['enable']) && empty($options['settings']['method'])) {
                                $options['settings']['method'] = 'scrollIntoView';
                            }

                            if (empty($options['settings']['target'])) {
                                $options['settings']['target'] = 1;
                            }

                            $js[] = '$(' . Json::encode($options['prevSelector']) . ').jcarouselControl(' .
                                Json::encode(array_merge($options['settings'],
                                    ['target' => '-=' . (int) $options['settings']['target']])) . ');';

                            $js[] = '$(' . Json::encode($options['nextSelector']) . ').jcarouselControl(' .
                                Json::encode(array_merge($options['settings'],
                                    ['target' => '+=' . (int) $options['settings']['target']])) . ');';
                        }

                        break;

                    case self::PLUGIN_PAGINATION:
                        if (!empty($options['enable']) && !empty($options['init'])) {
                            if (empty($options['settings']['carousel'])) {
                                $options['settings']['carousel'] = new JsExpression($id);
                            }

                            $js[] = '$(' . Json::encode($options['selector']) . ').jcarouselPagination(' . Json::encode($options['settings']) . ');';
                        }

                        break;
                }
            }
        }

        JCarouselAsset::register($this->getView());
        $this->getView()->registerJs(implode(' ', $js));
    }

}