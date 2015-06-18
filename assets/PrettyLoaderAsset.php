<?php
namespace milano\assets;

// TODO: Add initialization script
class PrettyLoaderAsset extends \milano\assets\BaseAsset
{

    public $sourcePath = '@vendor/as-milano/yii2-assets/assets/src/prettyLoader';
    public $css = [
        'css/prettyLoader.min.css'
    ];
    public $js = [
        'js/jquery.prettyLoader.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
