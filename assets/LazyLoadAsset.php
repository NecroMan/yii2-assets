<?php
namespace milano\assets;

class LazyLoadAsset extends BaseAsset
{

    public $sourcePath = '@bower/jquery.lazyload';
    public $js = [
        'js/jquery.lazyload.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
