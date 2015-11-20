<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Books'),
    'url'   => ['index']
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget(
        [
            'model'      => $model,
            'attributes' => [
                'name',
                'date_create',
                'date_update',
                'preview',
                'date',
            ],
        ]
    ) ?>

</div>
