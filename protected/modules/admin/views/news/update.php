<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'资讯列表'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'更新：'.$model->title,
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 资讯：<?php echo $model->title; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'catelist'=>$catelist,
	)); ?>
</div>