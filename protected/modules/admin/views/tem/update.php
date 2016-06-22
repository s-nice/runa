<?php
/* @var $this TemController */
/* @var $model Tem */

$this->breadcrumbs=array(
	'模板管理'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 模板： <?php echo $model->title; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>
</div>