<?php
/* @var $this JobController */
/* @var $model Job */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php if( Yii::app()->user->hasFlash('success')): ?>
	<div class="info"><?php echo Yii::app()->user->getFlash('success'); ?></div>
<?php endif; ?>

<?php //这是一段在显示后定时消失的JQ代码,已集成至Yii中.
	Yii::app()->clientScript->registerScript(
		'myHideEffect',
		'$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
		CClientScript::POS_READY
	);
?>
<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php
		$this->widget('ext.kindeditor.KindEditor', array(
			'model' => $model,
			'attribute' => 'content',
			)
		);
		?>
		<?php echo $form->labelEx($model,'content',array('class'=>'fl')); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>20, 'cols'=>100),array('class'=>'fl')); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orderid'); ?>
		<?php echo $form->textField($model,'orderid',array('size'=>10,'maxlength'=>10)); ?>（排序从小到大排列，排序越大越靠后）
		<?php echo $form->error($model,'orderid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_show'); ?>
		<?php echo $form->radioButtonList($model,'is_show',array(1=>'是',2=>'否'),array('class'=>'')); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>

	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>