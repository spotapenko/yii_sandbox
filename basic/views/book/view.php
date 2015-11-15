<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = 'Book View';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--<div class="site-about">
    <h1><?/*= Html::encode($this->title) */?></h1>

    <?php /*$form = ActiveForm::begin(); */?>

    <?/*= $form->field($model, 'name') */?>

    <?/*= $form->field($model, 'email') */?>

    <?/*= $form->field($model, 'author_id') */?>

    <div class="form-group">
        <?/*= Html::submitButton('Submit', ['class' => 'btn btn-primary']) */?>
    </div>

    <?php /*ActiveForm::end(); */?>

    <code><?/*= __FILE__ */?></code>
</div>
-->

<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger',
          'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
          ],
        ]) ?>
    </p>

    <?= DetailView::widget([
      'model' => $model,
      'attributes' => [
        'id',
        'name',
        'preview',
        'author_id',
        'date',
        'date_create',
        'date_update',
      ],
    ]) ?>

</div>