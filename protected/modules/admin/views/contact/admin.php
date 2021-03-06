<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'联系客户',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">联系客户</h1>
	<div class="pull-right">
	<?php echo CHtml::link('搜索','#',array('class'=>'btn btn-primary search-button')); ?>
	</div>
</div>

<div class="col-lg-12">

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		//'position',
		'name',
		array(
			'name'=>'gender',
			'type'=>'raw',
			'headerHtmlOptions' => array('width'=>'10%'),
			'value'=>'$data->gender==1?"男":"女"',
		),
		'phone',
		//'email',
		
		//'province',
		'city',
		'content',
		array(
			'name'=>'source',
			'type'=>'raw',
			'headerHtmlOptions' => array('width'=>'10%'),
			'value'=>'$data->source==1?"PC端":"移动端"',
		),
		'create_time',
		
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'headerHtmlOptions' => array('width'=>'10%'),
			'template' => '{view} {delete} ', // {update}

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
