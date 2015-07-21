<?php
namespace milano\assets;

class BootstrapNotifyAsset extends BaseAsset
{

    public $sourcePath = '@bower/remarkable-bootstrap-notify';
    public $js = [
        'bootstrap-notify.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'as-milano\assets\AnimateCssAsset'
    ];

}
