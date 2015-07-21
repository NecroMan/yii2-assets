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

}
