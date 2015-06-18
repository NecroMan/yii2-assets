<?php
namespace milano\assets;

class PrettyPhotoAsset extends BaseAsset
{

    public $sourcePath = '@vendor/as-milano/yii2-assets/assets/src/prettyPhoto';
    public $css = [
        'css/prettyPhoto.min.css'
    ];
    public $js = [
        'js/jquery.prettyPhoto.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
