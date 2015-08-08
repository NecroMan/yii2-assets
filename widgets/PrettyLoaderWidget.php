<?php
namespace milano\widgets;

use milano\assets\PrettyLoaderAsset;
use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;

class PrettyLoaderWidget extends Widget
{

    /** @var bool Enable initialization of prettyLoader on page ready */
    public $autoInit = true;

    /** @var array Additional plugin options */
    public $pluginSettings = [];

    /** @var bool Block page content when Ajax calls. Shows transparent <div> and progress indicator. */
    public $blockContent = true;

    /** @var string Redirect user to login page when Ajax call return 403 error */
    public $redirectOn403 = '/user/login';

    /** @var string Show message to user when Ajax call returns non 403 error. This is a JavaScript code. You can access
     * event and jqXHR variables of $.ajaxError callback */
    public $executeOnError = 'alert("К сожалению, во время обработки запроса произошла ошибка. Повторите еще раз.\n" +
            "В случае повторной неудачи, свяжитесь, пожалуйста, с администратором сайта.");';

    public function init()
    {
        $asset = PrettyLoaderAsset::register($this->getView());

        $js = $ajaxStart = $ajaxStop = $ajaxError = $css = [];

        if (empty($this->pluginSettings['loader'])) {
            $this->pluginSettings['loader'] = $asset->baseUrl . '/images/prettyLoader/ajax-loader.gif';
        }

        if ($this->autoInit) {
            $js[] = '$.prettyLoader(' . Json::encode($this->pluginSettings) . ');';
        }

        if ($this->blockContent) {
            $ajaxStart[] = '$("#loaderBackground").show(); $("#loaderIcon").fadeIn();';
            $ajaxStop[] = '$("#loaderBackground").hide(); $("#loaderIcon").fadeOut();';
        }

        if ($this->redirectOn403) {
            $ajaxError[] = 'if (jqXHR.status == 403) { window.location.href = ' . Json::encode(Url::toRoute($this->redirectOn403)) . '; }';
        }

        if ($this->executeOnError) {
            $ajaxError[] = 'if (jqXHR.status != 403) { ' . new JsExpression($this->executeOnError) . ' }';
        }

        if ($this->blockContent || $this->redirectOn403 || $this->executeOnError) {
            $js[] = '$(document).ajaxStart(function () { ' . implode(' ',
                    $ajaxStart) . ' }).ajaxStop(function () { ' . implode(' ',
                    $ajaxStop) . ' }).ajaxError(function (event, jqXHR) { ' . implode(' ', $ajaxError) . ' });';
        }

        $this->getView()->registerJs(implode(' ', $js));
    }

}
