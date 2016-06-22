<?php
/* @var $this CaseimgController */
/* @var $model Caseimg */

$this->breadcrumbs=array(
	'作品列表'=>array('/admin/cases/admin'),
	'作品'.$case.' 图片',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#caseimg-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class='col-lg-12 page-title'>
	<h1 class="title">作品<?php echo $case; ?> 图片</h1>
	
	<p>
	<a class="btn btn-primary" href="<?php echo Yii::app()->controller->createUrl('/admin/cases/admin'); ?>">作品列表</a>
	<a class="btn btn-primary" id="btn">上传图片</a>
	最大2MB，支持jpg，gif，png格式。
	
	</p>
</div>

<div class="col-lg-12">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'caseimg-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		//'cid',
		//'img',
		array(
			'name'=>'img',
			'type'=>'raw',
			'headerHtmlOptions' => array('width' => '10%'),
			//'htmlOptions' => array(),
			'value' => 'CHtml::link(CHtml::image("$data->img","", array("height" => "100px")),"$data->img",array("class" => "preview","target"=>"_blank"))',
		),
		//'orderid',
		//'is_show',
		//'create_uid',
		'create_time',
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'headerHtmlOptions' => array('width'=>'10%'),
			'template' => ' {delete} ', // {view} {update}

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
<p id="cid" style="display:none;"><?php echo $cid; ?></p>
</div>

<script type="text/javascript" src="/static/plupload/plupload.full.min.js"></script>
<script type="text/javascript">
	var cid=$('#cid').html();
	//alert(cid);
	var uploader = new plupload.Uploader({//创建实例的构造方法
		runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
		browse_button: 'btn', // 上传按钮
		url: "/admin/caseimg/upload/cid/"+cid, //远程上传地址
		flash_swf_url: 'plupload/Moxie.swf', //flash文件地址
		silverlight_xap_url: 'plupload/Moxie.xap', //silverlight文件地址
		filters: {
			max_file_size: '2mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
			mime_types: [//允许文件上传类型
				{title: "files", extensions: "jpg,png,gif"}
			]
		},
		multi_selection: true, //true:ctrl多文件上传, false 单文件上传
		init: {
			FilesAdded: function(up, files) { //文件上传前
				if ($("#ul_pics").children("li").length > 30) {
					alert("您上传的图片太多了！");
					uploader.destroy();
				} else {
					
					uploader.start();
				}
			},
			UploadProgress: function(up, file) { //上传中，显示进度条
		 
			},
			FileUploaded: function(up, file, info) { //文件上传成功的时候触发
				
				$.fn.yiiGridView.update('caseimg-grid');
				//alert('上传成功！');
			},
			Error: function(up, err) { //上传出错的时候触发
				alert(err.message);
			}
		}
	});
	uploader.init();
</script>
