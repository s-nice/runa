<?php
/* @var $this CasesController */
/* @var $model Cases */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowSearch">
		<?php echo $form->label($model,'id'); ?>：
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'name'); ?>：
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50)); ?>
	</div>
<!--
	<div class="rowSearch">
		<?php echo $form->label($model,'tid'); ?>：
		<?php echo $form->textField($model,'tid',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'is_rec'); ?>：
		<?php echo $form->textField($model,'is_rec'); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'is_show'); ?>：
		<?php echo $form->textField($model,'is_show'); ?>
	</div>
-->
<div class="scbtn">
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>