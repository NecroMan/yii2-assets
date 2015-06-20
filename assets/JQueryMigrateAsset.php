<?php
namespace milano\assets;

class JQueryMigrateAsset extends BaseAsset
{

    public $sourcePath = '@bower/jquery-migrate';
    public $js = [
        'jquery-migrate.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
