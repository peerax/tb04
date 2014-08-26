<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tb04-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'l_o_n'); ?>
		<?php echo $form->textField($model,'l_o_n'); ?>
		<?php echo $form->error($model,'l_o_n'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hn'); ?>
		<?php echo $form->textField($model,'hn',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'hn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tb_04_id'); ?>
		<?php echo $form->textField($model,'tb_04_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tb_04_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'round'); ?>
		<?php echo $form->textField($model,'round'); ?>
		<?php echo $form->error($model,'round'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afb_res'); ?>
		<?php echo $form->textField($model,'afb_res',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'afb_res'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'epi_res'); ?>
		<?php echo $form->textField($model,'epi_res',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'epi_res'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wbc_res'); ?>
		<?php echo $form->textField($model,'wbc_res',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'wbc_res'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_o'); ?>
		<?php echo $form->textField($model,'n_o',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'n_o'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'o_date'); ?>
		<?php echo $form->textField($model,'o_date'); ?>
		<?php echo $form->error($model,'o_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sp_type'); ?>
		<?php echo $form->textField($model,'sp_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sp_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'col_type'); ?>
		<?php echo $form->textField($model,'col_type',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'col_type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->