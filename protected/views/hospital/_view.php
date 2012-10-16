<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospital_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->hospital_id),array('view','id'=>$data->hospital_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospital_name')); ?>:</b>
	<?php echo CHtml::encode($data->hospital_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospital_phone')); ?>:</b>
	<?php echo CHtml::encode($data->hospital_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hospital_enable')); ?>:</b>
	<?php echo CHtml::encode($data->hospital_enable); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('created_at')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->created_at); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('updated_at')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->updated_at); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('created_user')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->created_user); ?>
<!--	<br />-->

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_user')); ?>:</b>
	<?php echo CHtml::encode($data->updated_user); ?>
	<br />

	*/ ?>

</div>