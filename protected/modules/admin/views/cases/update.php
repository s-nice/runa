<?php
/* @var $this CasesController */
/* @var $model Cases */

$this->breadcrumbs=array(
	'作品'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'更新',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 作品：<?php echo $model->name; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'catelist'=>$catelist,
	'caselist'=>$caselist,
)); ?>
</div>