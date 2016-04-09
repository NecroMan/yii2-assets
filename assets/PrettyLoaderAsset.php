<?php
namespace milano\assets;

class PrettyLoaderAsset extends BaseAsset
{

    // TODO: Заменить на jQuery blockUI

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
