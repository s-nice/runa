<?php
/* @var $this ReservationController */
/* @var $model Reservation */

$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->name,
);
?>

<h3 class="title">查看 预约：<?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		//'gender',
		array('name'=>'gender','value'=>$model->gender==1?"男":"女",),
		'phone',
		'province',
		'city',
		array('name'=>'source','value'=>$model->source==1?"PC端":"移动端",),
		'create_time',
	),
)); ?>
