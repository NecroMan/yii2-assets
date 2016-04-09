<?php
namespace milano\assets;

use yii\web\AssetBundle;

class BaseAsset extends AssetBundle
{

    /**
     * Removes '.min' part of filename.
     *
     * @param string $path Original filename
     *
     * @return string
     */
    private function removeMin($path)
    {
        return str_replace('.min.', '.', $path);
    }

    public function registerAssetFiles($view)
    {
        // If we are in debug mode, replace minified versions of js and css files with full ones.
//        if (YII_DEBUG) {
//            $this->css = array_map([$this, 'removeMin'], $this->css);
//            $this->js = array_map([$this, 'removeMin'], $this->js);
//        }

        parent::registerAssetFiles($view);
    }

}
