<?php
namespace milano\assets;

class SortableAsset extends BaseAsset
{

    public $sourcePath = '@bower/html.sortable/dist';
    public $css = [
    ];
    public $js = [
        'html.sortable.min.js'
    ];
    public $publishOptions = [
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
