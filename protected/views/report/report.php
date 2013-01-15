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
        'htmlOptions'=>array(
            'class'=>'bootstrap-widget-table',
        ),
    ));?>

    <?php
        $this->renderPartial('_manager_gridview', array(
            'model'=>$model
        ));
    ?>
    <?php $this->endWidget(); ?>
</div>

