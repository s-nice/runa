<?php
/* @var $this CasesController */
/* @var $model Cases */

$this->breadcrumbs=array(
	'作品管理'=>array('index'),
	'管理',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cases-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">作品管理</h1>
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
	'id'=>'cases-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		//'name',
		array(
			'name'=>'name',
			'type'=>'raw',
			'value'=>'CHtml::link("$data->name",array("/works/view","id"=>$data->id),array("target"=>"_blank"))',
		),
		array(
			'name'=>'img',
			'type'=>'raw',
			'headerHtmlOptions' => array('width' => '10%'),
			//'htmlOptions' => array(),
			'value' => 'CHtml::link(CHtml::image("$data->img","", array("width" => "100px")),"$data->img",array("target" => "_blank"))',
		),
		//'video',
		//'tid',
		
		array(
			'name'=>'video',
			'type'=>'raw',
			'value'=>'Video::getName($data->video)',
		),
		
		array(
			'name'=>'tid',
			'type'=>'raw',
			'value'=>'Tem::getName($data->tid)',
		),
		
		//'is_rec',
		/*
		'orderid',
		'is_show',
		'create_uid',
		
		*/
		'create_time',
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'headerHtmlOptions' => array('width'=>'10%'),
			'template' => ' {view} {img} {update} {delete} ', //

			'buttons'=>array(
				'img'=>array(
					'label'=>'图片',
					'url'=>'Yii::app()->createUrl("admin/caseimg/pc", array("cid" => $data->id))',
					'imageUrl'=>NULL,
					'options'=>array( 'style'=>'cursor:pointer;' ), // HTML options for the button tag
				),
				'view'=>array(
					'label'=>'查看',
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
					'label'=>'编辑',
					'imageUrl'=>NULL,
					'options'=>array( 'style'=>'cursor:pointer;' ), // HTML options for the button tag
				),
				'delete'=>array(
					'label'=>'删除',
					'imageUrl'=>NULL,
					'options'=>array('style'=>'cursor:pointer;' ), // HTML options for the button tag
				),
			),
		),
	),
)); ?>

</div>
