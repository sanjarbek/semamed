<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanjar
 * Date: 10/17/12
 * Time: 4:33 AM
 * To change this template use File | Settings | File Templates.
 */

abstract class MasterModel extends CActiveRecord
{

    protected function beforeValidate()
    {
        if ($this->isNewRecord) // only if adding new record
        {
            if ($this->hasAttribute('created_at')) // if model have created_at field
                $this->created_at = new CDbExpression('NOW()'); // set created_at value
            if ($this->hasAttribute('created_user'))
                $this->created_user = Yii::app()->user->getId();
            if ($this->hasAttribute('user_id'))
                $this->user_id = Yii::app()->user->getId();
        }
        if ($this->hasAttribute('updated_at')) // if model have updated_at field
            $this->updated_at = new CDbExpression('NOW()'); // set updated_at value
        if ($this->hasAttribute('updated_user'))
            $this->updated_user = Yii::app()->user->getId();

        return parent::beforeValidate();
    }

}