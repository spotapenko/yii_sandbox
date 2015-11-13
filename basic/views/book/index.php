<?php

/* @var $this yii\web\View */
/* @var $book app\models\BookForm */

use yii\helpers\Html;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1>Books</h1>
    <table class="table table-striped table-bordered table-hover table-condensed"
           width="100%" border="1" cellspacing="5" cellpadding="5">
        <thead>
            <th>ID</th>
            <th>Название</th>
            <th>Превью</th>
            <th>Автор</th>
            <th>Дата выхода книги</th>
            <th>Дата добавления книги</th>
            <th colspan="3">Кнопки действий</th>
        </thead>
        <tbody>
        <?php if(count($books)) :
            foreach ($books as $book): ?>
              <tr>
                <td><?= Html::encode($book->id) ?></td>
                <td><?= Html::encode($book->name) ?></td>
                <td><?= Html::encode($book->preview) ?></td>
                <td><?= Html::encode($book->author_id) ?></td>
                <td><?= Html::encode($book->date) ?></td>
                <td><?= Html::encode($book->date_create) ?></td>
                <td>[ред]</td>
                <td>[просм]</td>
                <td>[удл]</td>
              </tr>
        <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="9">Нет книг</td></tr>
        <?php endif ?>
        </tbody>
    </table>
</div>
