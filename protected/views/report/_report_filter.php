<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanzhar
 * Date: 1/4/13
 * Time: 9:54 AM
 * To change this template use File | Settings | File Templates.
 */

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'post',
//    'type'=>'inline',
)); ?>

    <?php echo $form->dropDownListRow($model,'hospital',
    CHtml::listData(Hospital::model()->findAll(), 'hospital_id', 'hospital_name'), array(
        'class'=>'span12    ',
    )); ?>

    <?php echo $form->dropDownListRow($model,'doctor',
    CHtml::listData(Doctor::model()->findAll(), 'doctor_id', 'doctor_fullname'), array(
        'class'=>'span12',
    )); ?>


    <?php echo $form->dateRangeRow($model, 'range_date',
    array(
//        'hint'=>'Click inside! An even a date range field!.',
        'prepend'=>'<i class="icon-calendar"></i>',
        'class'=>'span10',
        'options' => array(
            'callback'=>'js:function(start, end){console.log(start.toString("MMMM d, yyyy") + " - " + end.toString("MMMM d, yyyy"));}',
            'format'=>'yyyy.MM.dd',
            'ranges'=>array(
                'Today'=>array('today', 'today'),
                'Yesterday'=>array('yesterday', 'yesterday'),
                'Last 7 Days'=>array('js: Date.today().add({ days: -6 })', 'today'),
                'Last 30 Days'=>array('js: Date.today().add({ days: -29 })', 'today'),
                'This Month'=>array(
                    'js: Date.today().moveToFirstDayOfMonth()',
                    'js: Date.today().moveToLastDayOfMonth()'
                ),
                'Last Month'=>array(
                    'js: Date.today().moveToFirstDayOfMonth().add({ months: -1 })',
                    'js: Date.today().moveToFirstDayOfMonth().add({ days: -1 })'
                ),
            ),
        ),
    )); ?>

	<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'Report',
    )); ?>
    </div>

<?php $this->endWidget(); ?>
