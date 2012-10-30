<?php
//$this->breadcrumbs=array(
//	'Registrations'=>array('index'),
//	'Manage',
//);
//
//$this->menu=array(
//	array('label'=>'List Registration','url'=>array('index')),
//	array('label'=>'Create Registration','url'=>array('create')),
//);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('registration-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
//?>

<!---->
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('text','New registration'),
    'type'=>'primary',
    'htmlOptions'=>array(
//        'data-toggle'=>'modal',
        'data-target'=>'#dialogModal',
        'onClick'=>"{addRegistration(); $('#dialogRegistration').dialog('open');}"

    ),
)); ?>
<!--//################################################-->

<?php //echo CHtml::link('Create patient', "",  // the link for open the dialog
//    array(
//        'style'=>'cursor: pointer; text-decoration: underline;',
//        'onclick'=>"{addPatient(); $('#dialogPatient').dialog('open');}"));?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogRegistration',
    'options'=>array(
        'title'=>'New Registration',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
        'closeOnEscape'=>true,
    ),
));?>
<div class="divForForm"></div>

<?php $this->endWidget();?>

<script type="text/javascript">
    // here is the magic
    function addRegistration()
    {
        <?php echo CHtml::ajax(array(
            'url'=>array('registration/create'),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogRegistration div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    $('#dialogRegistration div.divForForm form').submit(addRegistration);
                    $('a.ui-dialog-titlebar-close.ui-corner-all[role=\"button\"]').bind('click',function()
                        { $('#dialogRegistration div.divForForm').html(''); });
                }
                else
                {
                    $('#dialogRegistration div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogRegistration').dialog('close') \",1000);
                    $.fn.yiiGridView.update('RegistrationGrid');
                }

            } ",
        ))?>;
        return false;
    }

</script>



<!--//##################################################3-->


<h1>Manage Registrations</h1>

<!--<p>-->
<!--You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>-->
<!--or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
<!--</p>-->
<!---->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'RegistrationGrid',
    'type'=>'striped bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'template' => "{items}\n{extendedSummary}",
	'columns'=>array(
        //this for the auto page number of cgridview
        array(
            'name'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'filter'=>''//without filtering
        ),
		'reg_id',
		'reg_patient',
		'reg_mrtscan',
        'reg_price',
        'reg_discont',
        'reg_total_price',
//		'reg_report_status',
		/*
		'reg_report_text',
		'created_at',
		'updated_at',
		'created_user',
		'updated_user',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
    'extendedSummary' => array(
        'title' => Yii::t('text','Total service price'),
        'columns' => array(
            'reg_total_price' => array('label'=>Yii::t('text','Total price'),
                'class'=>'TbSumOperation')
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
)); ?>
