<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'News-form',
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
	
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->dropDownList($model,'pid',$catelist,array('class'=>'input-sm')); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>
	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'brief',array('class'=>'vl')); ?>
		<?php echo $form->textArea($model,'brief',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'brief'); ?>
	</div>
	-->
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
		<?php echo $form->labelEx($model,'is_show'); ?>
		<?php echo $form->radioButtonList($model,'is_show',array(1=>'是',0=>'否'),array('class'=>'')); ?>
		<?php echo $form->error($model,'is_show'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'news_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'language' => 'zh_cn',
			'model' => $model,
			'attribute' => 'news_date',
			'options' => array(
				'showAnim' => 'fold',
				'showOn' => 'both',
				'dateFormat' => 'yy-mm-dd',
				'changeYear' => true,
				'changeMonth' => true,
			),
			'htmlOptions' => array(
				//'style' => 'height:20px;',
				//'value' => date('Y-m-d'),
			),
		));
		?>
		<?php echo $form->error($model,'news_date'); ?>
	</div>
	
	<button type="submit" class="btn btn-primary ml100">提交</button>

<?php $this->endWidget(); ?>

</div>