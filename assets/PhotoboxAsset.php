<?php
namespace milano\assets;

class PhotoboxAsset extends BaseAsset
{

    public $sourcePath = '@vendor/as-milano/yii2-assets/assets/src/photobox';
    public $css = [
        'photobox/photobox.css'
    ];
    public $js = [
        'photobox/jquery.photobox.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
