<?php
/* @var $this JobController */
/* @var $model Job */

$this->breadcrumbs=array(
	'招聘列表'=>array('admin'),
	//$model->id=>array('view','id'=>$model->id),
	'更新：'.$model->position,
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 招聘：<?php echo $model->position; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>
</div>