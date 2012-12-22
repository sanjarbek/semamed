
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>Yii::t('text','New registration'),
    'type'=>'primary',
    'htmlOptions'=>array(
//        'data-toggle'=>'modal',
        'data-target'=>'#dialogModal',
        'onClick'=>"{addRegistration(); $('#dialogRegistration').dialog('open');}"

    ),
)); ?>

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
            'url'=>array('registration/create&pid='.$patient_id),
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
//                    $('div[aria-labelledby=\"ui-dialog-title-dialogRegistration\"] a.ui-dialog-titlebar-close.ui-corner-all[role=\"button\"]').live('click',function()
//                        { $('#dialogRegistration div.divForForm').html(''); });
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


<h3>Manage Registrations</h3>

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

<?php
$new_registration_link = CHtml::Ajax(
    array(
        'success' => "{addRegistration(); $('#dialogRegistration').dialog('open');}",
    )
); ?>

<?php $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'Manage Patients',
    'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstrap-widget-table class
// the table will be 0-padding to the box
    'headerButtons' => array(
        array(
            'class' => 'bootstrap.widgets.TbButtonGroup',
            'size'=>'small',
            'buttons'=>array(
                array(
                    'buttonType'=>'ajaxLink',
                    'label'=>'Registration',
                    'url'=>$new_registration_link,
                    'icon'=>'icon-music',
//                    'linkOptions'=>array(
//                        'onclick'=>$new_registration_link,
//                    ),
                ),
            ),
        ),
    ),
    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->_getGridViewRegistrationGrid(); ?>

<?php $this->endWidget();?>

