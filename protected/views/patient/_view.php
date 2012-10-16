<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->patient_id),array('view','id'=>$data->patient_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_fullname')); ?>:</b>
	<?php echo CHtml::encode($data->patient_fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_phone')); ?>:</b>
	<?php echo CHtml::encode($data->patient_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_birthday')); ?>:</b>
	<?php echo CHtml::encode($data->patient_birthday); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_doctor')); ?>:</b>
	<?php echo CHtml::encode($data->patient_doctor); ?>
	<br />
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('created_at')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->created_at); ?>
<!--	<br />-->
<!---->
<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('updated_at')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->updated_at); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_user')); ?>:</b>
	<?php echo CHtml::encode($data->updated_user); ?>
	<br />

	*/ ?>

</div>