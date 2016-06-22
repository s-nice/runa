<?php
/* @var $this TemController */
/* @var $model Tem */
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
		<?php echo $form->label($model,'title'); ?>：
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>90)); ?>
	</div>
<!--
	<div class="rowSearch">
		<?php echo $form->label($model,'is_show'); ?>：
		<?php echo $form->textField($model,'is_show'); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'is_rec'); ?>：
		<?php echo $form->textField($model,'is_rec'); ?>
	</div>
-->

<div class="scbtn">
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>