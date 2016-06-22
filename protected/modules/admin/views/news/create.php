<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'资讯列表'=>array('admin'),
	'创建',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">创建 资讯</h1>	
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'catelist'=>$catelist,
	)); ?>
</div>
