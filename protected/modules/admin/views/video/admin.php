<?php
/* @var $this VideoController */
/* @var $model Video */

$this->breadcrumbs=array(
	'视频'=>array('index'),
	'管理',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#video-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">视频管理</h1>
	<div class="pull-right">
	<a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('create'); ?>">新增</a>
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
	'id'=>'video-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		//'name',
		array(
			'name'=>'name',
			'type'=>'raw',
			'value'=>'CHtml::link("$data->name",array("/video/view","id"=>$data->id),array("target"=>"_blank"))',
		),
		array(
			'name'=>'pid',
			'type'=>'raw',
			'value'=>'Videocat::getName($data->pid)',
		),
		//'img',
		array(
			'name'=>'img',
			'type'=>'raw',
			'headerHtmlOptions' => array('width' => '10%'),
			//'htmlOptions' => array(),
			'value' => 'CHtml::link(CHtml::image("$data->img","", array("width" => "100px")),"$data->img",array("target" => "_blank"))',
		),
		//'video',
		array(
			'name'=>'video',
			'type'=>'raw',
			'value'=>'CHtml::link("$data->video",$data->video,array("target"=>"_blank"))',
		),
		'is_rec',
		'orderid',
		array(
			'name'=>'is_show',
			'type'=>'raw',
			'headerHtmlOptions' => array('width'=>'10%'),
			'value'=>'$data->is_show==1?"是":"否"',
		),
		/*
		'is_show',
		'create_uid',
		'create_time',
		*/
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'headerHtmlOptions' => array('width'=>'10%'),
			'template' => ' {view} {update} {delete} ', //

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
