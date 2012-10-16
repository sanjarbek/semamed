<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->reg_id),array('view','id'=>$data->reg_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_patient')); ?>:</b>
	<?php echo CHtml::encode($data->reg_patient); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_mrtscan')); ?>:</b>
	<?php echo CHtml::encode($data->reg_mrtscan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_discont')); ?>:</b>
	<?php echo CHtml::encode($data->reg_discont); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_price')); ?>:</b>
	<?php echo CHtml::encode($data->reg_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_report_status')); ?>:</b>
	<?php echo CHtml::encode($data->reg_report_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_report_text')); ?>:</b>
	<?php echo CHtml::encode($data->reg_report_text); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_user')); ?>:</b>
	<?php echo CHtml::encode($data->created_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_user')); ?>:</b>
	<?php echo CHtml::encode($data->updated_user); ?>
	<br />

	*/ ?>

</div>