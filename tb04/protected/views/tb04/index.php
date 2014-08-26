<?php
$this->breadcrumbs=array(
	'Tb04s',
);

$this->menu=array(
	array('label'=>'Create Tb04', 'url'=>array('create')),
	array('label'=>'Manage Tb04', 'url'=>array('admin')),
);
?>

<h1>Tb04s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
