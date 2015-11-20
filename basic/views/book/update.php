<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = Yii::t(
        'app', 'Update {modelClass}: ', [
        'modelClass' => 'Book',
    ]
    ) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'),
                                  'url'   => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name,
                                  'url'   => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(
        '_form', [
        'model' => $model,
    ]
    ) ?>

</div>
