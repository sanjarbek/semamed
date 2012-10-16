<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mrtscan_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mrtscan_id),array('view','id'=>$data->mrtscan_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mrtscan_name')); ?>:</b>
	<?php echo CHtml::encode($data->mrtscan_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mrtscan_description')); ?>:</b>
	<?php echo CHtml::encode($data->mrtscan_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mrtscan_price')); ?>:</b>
	<?php echo CHtml::encode($data->mrtscan_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mrtscan_enable')); ?>:</b>
	<?php echo CHtml::encode($data->mrtscan_enable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
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