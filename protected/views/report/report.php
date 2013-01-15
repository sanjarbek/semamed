<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sanzhar
 * Date: 1/4/13
 * Time: 9:56 AM
 * To change this template use File | Settings | File Templates.
 */

$this->pageTitle=Yii::app()->name . ' - '.Yii::t('title', 'Reports');

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>array(
        Yii::t('title', 'Reports'),
    ),
));
?>

<div class='span3'>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Filter'),
    'headerIcon' => 'icon-search',
    'htmlOptions'=>array(
//        'class'=>'pull-left span4',
    ),
));?>

<div class="search-form">
<?php $this->renderPartial('_report_filter',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->endWidget(); ?>

</div>
<div class='span8'>
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => Yii::t('title', 'Result'),
    'headerIcon' => 'icon-filter',
));?>

<?php
echo CHtml::image(Yii::app()->request->baseUrl .'images/logo.png', 'Semamed', array(
    'data-original' => 'original',
));
?>
    <article>
        <h3>Just text</h3>
        <p>The above table of codes may seem overwhelming first time you are trying to figure
            out how to write some header or footer. Luckily, there is an easier way. Let Microsoft
            Office Excel do the work for you. For example, create in Microsoft Office Excel an xlsx
            file where you insert the header and footer as desired using the programs own interface.
            Save file as test.xlsx. Now, take that file and read off the values using PHPExcel as follows:</p>
    </article>
<?php $this->endWidget(); ?>
</div>

