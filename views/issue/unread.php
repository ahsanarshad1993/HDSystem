<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IssueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unread Issues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Issue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>    

<?php
            foreach ($allmails as $mail) {
                $ticketnum++;
?>
                <p><?= $subject = "Ticket No. ".$ticketnum.": ".$mail->subject ?></p>
                <p><?= $from = "Initiator: ".$mail->from ?></p>
                <p><?= $date = "Date: ".$mail->date ?></p>

<?php

            }
?>

<?php Pjax::end(); ?></div>
