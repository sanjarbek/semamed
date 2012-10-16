<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->doctor_id),array('view','id'=>$data->doctor_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_fullname')); ?>:</b>
	<?php echo CHtml::encode($data->doctor_fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_phone')); ?>:</b>
	<?php echo CHtml::encode($data->doctor_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_hospital')); ?>:</b>
	<?php echo CHtml::encode($data->doctor_hospital); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor_enable')); ?>:</b>
	<?php echo CHtml::encode($data->doctor_enable); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('created_at')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->created_at); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('updated_at')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->updated_at); ?>
<!--	<br />-->

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_user')); ?>:</b>
	<?php echo CHtml::encode($data->updated_user); ?>
	<br />

	*/ ?>

</div>