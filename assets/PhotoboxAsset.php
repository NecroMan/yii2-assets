<?php
namespace milano\assets;

class PhotoboxAsset extends BaseAsset
{

    public $sourcePath = '@bower/photobox';
    public $css = [
        'photobox/photobox.css'
    ];
    public $js = [
        'photobox/jquery.photobox.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
    public $publishOptions = [
        'only' => [
            'images/*',
            'photobox/*'
        ]
    ];

}
