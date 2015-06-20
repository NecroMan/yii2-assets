<?php
namespace milano\assets;

class JCarouselAsset extends BaseAsset
{

    public $sourcePath = '@bower/jcarousel/dist';
    public $js = [
        'jquery.jcarousel-core.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
