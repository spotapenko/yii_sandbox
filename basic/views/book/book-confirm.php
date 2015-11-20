<?php

/* @var $this yii\web\View */
/* @var $model app\models\BookForm */

use yii\helpers\Html;

$this->title = 'Book Confirm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-confirm">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>You have entered the following information:</p>

    <ul>
        <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
        <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
        <li><label>Author Id</label>: <?= Html::encode($model->author_id) ?>
        </li>
    </ul>

    <code><?= __FILE__ ?></code>
</div>
