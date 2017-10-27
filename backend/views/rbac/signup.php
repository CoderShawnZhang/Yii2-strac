<?php
/**
 * 注册用户
 */
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form','options' => ['class' => 'form-horizontal'],'method' => 'post'
]);
?>

<?= $form->field($model,'username') ?>
<?= $form->field($model,'password_hash')->passwordInput() ?>
<?= $form->field($model,'email') ?>
<div class="row">
    <div class="col-lg-5">
        <?= \yii\helpers\Html::submitButton('Login',['class'=>'btn btn-primary'])?>
    </div>
</div>

<?php ActiveForm::end() ?>
