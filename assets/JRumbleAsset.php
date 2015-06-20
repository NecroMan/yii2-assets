<?php
namespace milano\assets;

class JRumbleAsset extends BaseAsset
{

    public $sourcePath = '@bower/jrumble';
    public $js = [
        'jquery.jrumble.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
