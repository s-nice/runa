<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="content-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowSearch">
		<?php echo $form->label($model,'position'); ?>：
		<?php echo $form->textField($model,'position',array('size'=>20,'maxlength'=>60)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'name'); ?>：
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>30)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'phone'); ?>：
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'email'); ?>：
		<?php echo $form->textField($model,'email',array('size'=>20,'maxlength'=>60)); ?>
	</div>

	<div class="rowSearch">
		<?php echo $form->label($model,'create_time'); ?>：
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'language' => 'zh_cn',
			'model' => $model,
			'attribute' => 'create_time',
			'options' => array(
				'showAnim' => 'fold',
				'showOn' => 'both',
				'dateFormat' => 'yy-mm-dd',
				'changeYear' => true,
				'changeMonth' => true,
			),
			'htmlOptions' => array(
				'style' => 'height:26px;',
				//'value' => date('Y-m-d'),
			),
		));
		?>
	</div>

<div class="scbtn">
	<button type="submit" class="btn btn-primary">搜索</button>
</div>
<?php $this->endWidget(); ?>

</div>