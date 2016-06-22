<?php
/* @var $this ProController */
/* @var $model Pro */

$this->breadcrumbs=array(
	'产品'=>array('admin'),
	$model->name,
	'更新',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 产品：<?php echo $model->name; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>
</div>