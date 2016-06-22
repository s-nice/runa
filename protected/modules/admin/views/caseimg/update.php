<?php
/* @var $this CaseimgController */
/* @var $model Caseimg */

$this->breadcrumbs=array(
	'Caseimgs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新  Caseimg <?php echo $model->id; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo Yii::app()->controller->createUrl('admin'); ?>">返回</a>
</div>

<div class="col-lg-12">
<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>
</div>