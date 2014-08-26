<?php
$this->breadcrumbs=array(
	'Tb04s'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tb04', 'url'=>array('index')),
	array('label'=>'Create Tb04', 'url'=>array('create')),
	array('label'=>'View Tb04', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tb04', 'url'=>array('admin')),
);
?>

<h1>Update Tb04 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>