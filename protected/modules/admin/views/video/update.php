<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'视频'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'更新',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 视频：<?php echo $model->name; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'catelist'=>$catelist,
)); ?>
</div>