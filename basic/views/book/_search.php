<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Author;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="form-group row">
        <div class="col-md-3">
            <?php  echo $form->field($model, 'author_fullname')->dropDownList(ArrayHelper::map(Author::find()->all(),'id','fullname'), ['prompt'=>'Choose...'])  ?>
        </div>
            <div class="col-md-3">
        <?php  echo $form->field($model, 'name') ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-3">
        <?php  echo $form->field($model, 'date_from')->widget(DatePicker::classname(), [
          'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
        </div>
        <div class="col-md-3">
        <?php  echo $form->field($model, 'date_to')->widget(DatePicker::classname(), [
          'dateFormat' => 'yyyy-MM-dd',
        ]) ?>
        </div>
    </div>

 <div class="form-group row">
    <?=Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'Reset'), '#', ['class' => 'btn btn-default btn-reset']) ?>
    </div>






    <?php ActiveForm::end(); ?>

</div>
