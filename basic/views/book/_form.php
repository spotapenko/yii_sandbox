<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin([
      'enableClientValidation' => false,
      'options' => [
        'enctype' => 'multipart/form-data',
      ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('A Title of the Book') ?>

    <?= $form->field($model, 'preview')->fileInput() ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?php //todo need modify author field ?>
    <?= $form->field($model, 'author_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
