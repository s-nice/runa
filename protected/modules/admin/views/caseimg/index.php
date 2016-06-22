<?php
/* @var $this CaseimgController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Caseimgs',
);

$this->menu=array(
	array('label'=>'Create Caseimg', 'url'=>array('create')),
	array('label'=>'Manage Caseimg', 'url'=>array('admin')),
);
?>

<h1>Caseimgs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
