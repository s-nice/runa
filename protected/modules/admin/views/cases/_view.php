<?php
/* @var $this CasesController */
/* @var $data Cases */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tid')); ?>:</b>
	<?php echo CHtml::encode($data->tid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_rec')); ?>:</b>
	<?php echo CHtml::encode($data->is_rec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orderid')); ?>:</b>
	<?php echo CHtml::encode($data->orderid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_show')); ?>:</b>
	<?php echo CHtml::encode($data->is_show); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_uid')); ?>:</b>
	<?php echo CHtml::encode($data->create_uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	*/ ?>

</div>