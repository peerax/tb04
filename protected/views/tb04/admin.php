<?php
$this->breadcrumbs=array(
	'Tb04s'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tb04', 'url'=>array('index')),
	array('label'=>'Create Tb04', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tb04-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tb04s</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tb04-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		//'l_o_n',
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
