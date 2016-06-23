<?php
/* @var $this NewsController */
/* @var $model News */
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
		<?php echo $form->label($model,'pid'); ?>：
		<?php echo $form->dropDownList($model,'pid',$catelist,array('class'=>'input-sm')); ?>
	</div>
	
	<div class="rowSearch">
		<?php echo $form->label($model,'title'); ?>：
		<?php echo $form->textField($model,'title',array('size'=>20,'maxlength'=>150)); ?>
	</div>
	
	<div class="rowSearch">
		<?php echo $form->label($model,'is_show'); ?>：
		<?php echo $form->dropDownList($model,'is_show',array('1'=>'是','0'=>'否'),array('class'=>'input-sm')); ?>
	</div>

<div class="scbtn">
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>