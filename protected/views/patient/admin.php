<?php
$this->breadcrumbs=array(
	'Patients'=>array('index'),
	'Manage',
);

//$this->menu=array(
//	array('label'=>'List Patient','url'=>array('index')),
//	array('label'=>'Create Patient','url'=>array('create')),
//);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('patient-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<!---->
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('text','New patient'),
    'type'=>'primary',
    'htmlOptions'=>array(
//        'data-toggle'=>'modal',
        'data-target'=>'#dialogModal',
        'onClick'=>"{addPatient(); $('#dialogPatient').dialog('open');}"

    ),
)); ?>

<!--//################################################-->

<?php //echo CHtml::link('Create patient', "",  // the link for open the dialog
//    array(
//        'style'=>'cursor: pointer; text-decoration: underline;',
//        'onclick'=>"{addPatient(); $('#dialogPatient').dialog('open');}"));?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogPatient',
    'options'=>array(
        'title'=>'Create patient',
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
    function addPatient()
    {
        <?php echo CHtml::ajax(array(
            'url'=>array('patient/create'),
            'data'=> "js:$(this).serialize()",
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
                if (data.status == 'failure')
                {
                    $('#dialogPatient div.divForForm').html(data.div);
                          // Here is the trick: on submit-> once again this function!
                    $('#dialogPatient div.divForForm form').submit(addPatient);
                    $('a.ui-dialog-titlebar-close.ui-corner-all[role=\"button\"]').bind('click',function()
                        { $('#dialogPatient div.divForForm').html(''); });
                }
                else
                {
                    $('#dialogPatient div.divForForm').html(data.div);
                    setTimeout(\"$('#dialogPatient').dialog('close') \",1000);
                    $.fn.yiiGridView.update('PatientGrid');
                }

            } ",
        ))?>;
        return false;
    }

</script>



<!--//##################################################3-->


<!--//#############################################################/-->

<!--<h3>Manage Patients</h3>-->

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


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'PatientGrid',
    'type'=>'condensed striped bordered',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        //this for the auto page number of cgridview
        array(
            'name'=>'No',
            'type'=>'raw',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            'filter'=>''//without filtering
        ),
        array(
            'name'=>'patient_id',
            'value'=>'CHtml::encode($data->patient_id)',
            'sortable'=>false,
            'htmlOptions'=>array(
                'width'=>'10px',
            ),
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_fullname',
            'sortable'=>false,
            'editable' => array(
                'url' => $this->createUrl('patient/editable'),
                'placement' => 'right',
                'inputclass' => 'span3',
            )
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_phone',
            'sortable'=>false,
//            'htmlOptions'=>array('style'=>'width: 100px'),
            'editable' => array(
                'url' => $this->createUrl('patient/editable'),
                'placement' => 'left',
                'inputclass' => 'span3',
            ),
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_birthday',
            'sortable'=>false,
            'editable' => array(
                'url' => $this->createUrl('patient/editable'),
                'type'=>'date',
                'format'=>'yyyy-mm-dd',
                'viewformat'  => 'dd.mm.yyyy',
            )
        ),
        array(
            'class' => 'bootstrap.widgets.TbEditableColumn',
            'name' => 'patient_doctor',
            'sortable'=>false,
            'editable' => array(
                'url' => $this->createUrl('patient/editable'),
                'type'=>'select',
                'source' => CHtml::listData(Doctor::model()->findAll(array('order'=>'doctor_fullname')),'doctor_id','doctor_fullname'),
            ),
            'filter'=>CHtml::listData(Doctor::model()->findAll(array('order'=>'doctor_fullname')),'doctor_id','doctor_fullname'),
        ),
        'created_at',

        /*
          'updated_at',
          'created_user',
          'updated_user',
          */
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>Yii::t('text','Action'),
            'template'=>'{view} {update} {delete}',
//            'buttons'=> array(
//                'update' => array
//                (
////                    'options'=>array('title'=>'Text shown as tooltip when user hovers image ...'),
//                    'url'=>'$this->grid->controller->createUrl("/patient/update",
//                        array("id"=>$data->patient_id))',
//                    'click'=>"function( e ){
//                        e.preventDefault();
//                        $( '#update-dialog' ).children( ':eq(0)' ).empty(); // Stop auto POST
//                        updateDialog( $( this ).attr( 'href' ) );
//                        $( '#update-dialog' )
//                          .dialog( { title: 'Update' } )
//                          .dialog( 'open' ); }",
//                ),
//            ),

        ),
    ),
)); ?>
