<?
    if(!defined("Airzona")) return require_once '../../../public/pages/404norule.php';
?>
			<p class="b-title">Смена секретного кода</p>
			
			
			<div class="form-login-grid">
				<div class="login-img"><img src="public/images/design/login-man.png" alt=""></div>
				<div class="login-form">

			        <form id="password-form" action="engine/user/changecode.php" method="post" role="form">
<input type="hidden" name="_csrf" value="SnlfeHBvZ0MzHGtJOAIdOgUIFQwcADEMOjJuDERaPzo.FCpOFj0Tcw==">


				        <div class="form-group field-formcode-old has-success">
<?php if($_SESSION['error'] == 1) echo '<div class="form-group field-formlogin-code has-error">';?>
<label class="control-label" for="formcode-old">Текущий код (если есть)</label>
<input type="text" id="formcode-old" class="main-inp w-100" name="oldcode" placeholder="Старый код">
<p class="help-block help-block-error">
<?php 
if($_SESSION['error'] == 1) 
{
	echo 'Старый код введен неверно</p>';
	$_SESSION['error'] = 0; 

}?>
</div>				        <div class="form-group field-formcode-new required has-success">
<label class="control-label" for="formcode-new">Новый</label>
<input type="password" id="formcode-new" class="main-inp w-100" name="newcode" placeholder="Новый код">
<p class="help-block help-block-error"></p>


</div>				        <div class="form-group field-formcode-new_compare required has-success">
<?php if($_SESSION['error'] == 2) echo '<div class="form-group field-formlogin-code has-error">';?>
<label class="control-label" for="formcode-new_compare">Еще раз новый</label>
<input type="password" id="formcode-new_compare" class="main-inp w-100" name="confirmcode" placeholder="Новый код еще раз">
<p class="help-block help-block-error">
<?php 
if($_SESSION['error'] == 2) 
{
	echo 'Вы ввели разные коды</p>';
	$_SESSION['error'] = 0; 
}?>
</div>
                
				<div class="form-group field-formcode-captcha required">
	            <? if($_SESSION['error'] == 3) echo '<div class="form-group field-formcode-captcha required has-error">';?>
<label class="control-label" for="formcode-captcha">Проверочный код</label>
<div class="row"><div class="col-md-5"><img id="formsearch-captcha-image" src="public/captcha/captcha.php" alt=""></div><div class="col-md-7"><input type="text" id="" class="main-inp w-100" name="captcha" placeholder="Проверочный код"></div></div>
<p class="help-block help-block-error"><? if($_SESSION['error'] == 3) echo 'Неправильный проверочный код'; $_SESSION['error'] = 0; ?></p>
                </div>				      
 


					  <button type="submit" class="big-but w-100">Изменить</button>
					</form>				</div>
			</div>
		</div>
	</div>
</div>