<?php
$this->breadcrumbs=array(
	'Tb04s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tb04', 'url'=>array('index')),
	array('label'=>'Manage Tb04', 'url'=>array('admin')),
);
?>

<h1>Create Tb04</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>