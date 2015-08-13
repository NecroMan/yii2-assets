<?php
namespace milano\assets;

class SlickAsset extends BaseAsset
{

    public $sourcePath = '@bower/slick-carousel/slick';
    public $css = [
        'slick.css'
    ];
    public $js = [
        'slick.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
