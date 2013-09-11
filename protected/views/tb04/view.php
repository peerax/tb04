<?php
$this->breadcrumbs=array(
	'Tb04s'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tb04', 'url'=>array('index')),
	array('label'=>'Create Tb04', 'url'=>array('create')),
	array('label'=>'Update Tb04', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tb04', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tb04', 'url'=>array('admin')),
);
?>

<h1>View Tb04 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'l_o_n',
		'hn',
		'name',
		'age',
		'sex',
		'tb_04_id',
		'round',
		'afb_res',
		'epi_res',
		'wbc_res',
		'n_o',
		'o_date',
		'sp_type',
		'col_type',
	),
)); ?>
