<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList($model,'pid',$catelist,array('class'=>'input-sm')); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>（建议尺寸：525x350）
		<?php echo $form->fileField($model,'img');
		if($model->img){
		?>
		<div style="margin-left: 100px">
		<img height="100" src="<?php echo $model->img; ?>" />
		</div>
		<?php }echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video'); ?>（最大200M）
		
		<?php echo $form->fileField($model,'video');
		if($model->video){
		?>
		<div style="margin-left: 100px">
		<?php echo $model->video; ?>
		</div>
		<?php } echo $form->error($model,'video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_rec'); ?>
		<?php echo $form->radioButtonList($model,'is_rec',array(1=>'是',0=>'否'),array('class'=>'')); ?>
		<?php echo $form->error($model,'is_rec'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'orderid'); ?>
		<?php echo $form->textField($model,'orderid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'orderid'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'is_show'); ?>
		<?php echo $form->radioButtonList($model,'is_show',array(1=>'是',0=>'否'),array('class'=>'')); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>

	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>