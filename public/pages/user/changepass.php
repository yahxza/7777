<?
    if(!defined("Airzona")) return require_once '../../../public/pages/404norule.php';
?>

			<p class="b-title">Смена пароля</p>
			
			
			<div class="form-login-grid">
				<div class="login-img"><img src="/public/images/design/login-man.png" alt=""></div>
				<div class="login-form">

			        <form id="password-form" action="engine/user/changepass.php" method="post" role="form">
<input type="hidden" name="_csrf" value="a0NTYjIxZFEpJjcaYAQdYCQPMTFbXRAjBTkaMH1fEGYjCRoXZ1kNGw==">


				        <div class="form-group field-formpassword-old required">
<?php if($_SESSION['error'] == 1) echo '<div class="form-group field-formlogin-code has-error">';?>
<label class="control-label" for="formpassword-old">Старый пароль</label>
<input type="password" id="formpassword-old" class="main-inp w-100" name="oldpass" placeholder="Старый пароль">
<p class="help-block help-block-error">
<?php 
if($_SESSION['error'] == 1) 
{
	echo 'Старый пароль введен неверно</p>';
    $_SESSION['error'] = 0;
}?>
</div>				        <div class="form-group field-formpassword-new required">
<label class="control-label" for="formpassword-new">Новый</label>
<input type="password" id="formpassword-new" class="main-inp w-100" name="newpass" placeholder="Новый пароль">
<p class="help-block help-block-error"></p>


</div>				        <div class="form-group field-formpassword-new_compare required">
<?php if($_SESSION['error'] == 2) echo '<div class="form-group field-formlogin-code has-error">';?>
<label class="control-label" for="formpassword-new_compare">Еще раз новый</label>
<input type="password" id="formpassword-new_compare" class="main-inp w-100" name="confirmpass" placeholder="Новый пароль еще раз">
<p class="help-block help-block-error">
<?php 
if($_SESSION['error'] == 2) 
{
	echo 'Вы ввели разные пароли</p>';
    $_SESSION['error'] = 0;	
}?>
</div>
				        
                <div class="form-group field-formpassword-captcha required">
	            <? if($_SESSION['error'] == 3) echo '<div class="form-group field-formpassword-captcha required has-error">';?>
<label class="control-label" for="formpassword-captcha">Проверочный код</label>
<div class="row"><div class="col-md-5"><img id="formsearch-captcha-image" src="public/captcha/captcha.php" alt=""></div><div class="col-md-7"><input type="text" id="" class="main-inp w-100" name="captcha" placeholder="Проверочный код"></div></div>
<p class="help-block help-block-error"><? if($_SESSION['error'] == 3) echo 'Неправильный проверочный код'; $_SESSION['error'] = 0; ?></p>
                </div>
					
					
					
					<button type="submit" class="big-but w-100">Изменить</button>
					</form>				</div>
			</div>
		</div>
	</div>
</div>