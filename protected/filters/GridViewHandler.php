<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanjar
 * Date: 10/24/12
 * Time: 12:29 AM
 * To change this template use File | Settings | File Templates.
 */
class GridViewHandler extends CFilter
{

    protected function preFilter($filterChain)
    {
        if (Yii::app()->request->getIsAjaxRequest() && isset($_GET["ajax"]) && !Yii::app()->request->getIsPostRequest())
        {
            $selectedTable = $_GET["ajax"];
            $method='_getGridView'.$selectedTable;
            if(method_exists($filterChain->controller,$method))
            {
//                Yii::log("I am from _getGridViewRegistrationGrid filter handler $method.",
//                    "info",
//                    "system.web.RegistrationController");
                $filterChain->controller->$method();
                Yii::app()->end();
            }
            else
            {
                throw new CHttpException(400,"CGridView handler function {$method} not defined in controller ".get_class($filterChain->controller));
            }
        }
        return true;
    }
}

?>
