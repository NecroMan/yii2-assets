<?php
namespace milano\assets;

class AnimateCssAsset extends BaseAsset
{

    public $sourcePath = '@bower/animate.css';
    public $css = [
        'animate.min.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
    public $publishOptions = [
        'except' => [
            'source/*',
        ]
    ];

    public function publish($am)
    {
        parent::publish($am);

        $path = $am->publish('@vendor/as-milano/yii2-assets/assets/src/animateCss');
        $this->js[] = $path . '/js/jquery.animatecss.min.js';
    }

}
