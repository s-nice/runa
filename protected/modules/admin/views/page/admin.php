<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'单页'=>array('admin'),
	'管理',
);

?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">单页管理</h1>
	<!--
	<div class="pull-right">
	<a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('create'); ?>">新增</a>
	
	</div>
	-->
</div>

<div class="col-lg-12">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		//'content',
		//'create_uid',
		'create_time',
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'headerHtmlOptions' => array('width'=>'10%'),
			'template' => ' {view} {update} ', // {delete}

			'buttons'=>array(
				'view'=>array(
					'label'=>'<span class="glyphicon glyphicon-eye-open"></span>',
					'imageUrl'=>NULL,
					'options'=>array( 'style'=>'cursor:pointer;' ), // HTML options for the button tag
					'click' => "function(){
						jQuery('#ultraModal-8').modal('show', {backdrop: 'static'});
						jQuery.ajax({
							url: $(this).attr('href'),
							success: function(response)
							{
								jQuery('#ultraModal-8 .modal-body').html(response);
							}
						});
						return false;
					}",
				),
				'update'=>array(
					'label'=>'<span class="glyphicon glyphicon-pencil"></span>',
					'imageUrl'=>NULL,
					'options'=>array( 'style'=>'cursor:pointer;' ), // HTML options for the button tag
				),
				'delete'=>array(
					'label'=>'<span class="glyphicon glyphicon-trash"></span>',
					'imageUrl'=>NULL,
					'options'=>array('style'=>'cursor:pointer;' ), // HTML options for the button tag
				),
			),
		),
	),
)); ?>

</div>
