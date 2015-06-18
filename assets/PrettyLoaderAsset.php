<?php
namespace milano\assets;

class PrettyLoaderAsset extends BaseAsset
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
