<?php
/* @var $this NewscatController */
/* @var $model Newscat */

$this->breadcrumbs=array(
	'资讯分类'=>array('admin'),
	//$model->name=>array('view','id'=>$model->id),
	'更新：'.$model->name,
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新 资讯分类：<?php echo $model->name; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>
</div>