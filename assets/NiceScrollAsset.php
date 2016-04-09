<?php
namespace milano\assets;

class NiceScrollAsset extends BaseAsset
{

    public $sourcePath = '@bower/jquery.nicescroll/dist';
    public $js = [
        'jquery.nicescroll.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
