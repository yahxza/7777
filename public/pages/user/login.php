<?
    if(!defined("Airzona")) return require_once '../../../public/pages/404norule.php';
?>
            
			<div class="b-title">Личный кабинет</div>
			
			
			<div class="form-login-grid">
				<div class="login-img"><img src="..\public\images\design\login-man.png" alt=""></div>
				<div class="login-form">
				
			        <form id="login-form" action="../engine/user/login.php" method="POST">
<input type="hidden" name="_csrf" value="ioWA3ac-Zy-qyZRNqli0X1NrmPdti_Rml2IDoORE9Z-_3bab0k8PVvOR0R7JB-AcFQnzxw7NmRTBBi7ztwWkqQ==">


				        <div class="form-group field-formlogin-username required">
<?php if($_SESSION['error'] == 1) echo '<div class="form-group field-formlogin-code has-error">';?>
<label class="control-label" for="formlogin-username">Игровой ник</label>
<input type="text" id="formlogin-username" class="main-inp w-100" name="username" placeholder="Например: Mark_Markov" aria-required="true">
<p class="help-block help-block-error"><?php if($_SESSION['error'] == 1) { echo 'Такого аккаунта не существует</p></div>'; $_SESSION['error'] = 5; }?>


</div>				        <div class="form-group field-formlogin-password required">
<?php if($_SESSION['error'] == 2) echo '<div class="form-group field-formlogin-code has-error">';?>
<label class="control-label" for="formlogin-password">Пароль</label>
<input type="password" id="formlogin-password" class="main-inp w-100" name="password" placeholder="" aria-required="true">
<p class="help-block help-block-error"><?php if($_SESSION['error'] == 2) { echo 'Введен неверный пароль!</p></div>'; $_SESSION['error'] = 0; }?>


</div>				        <div class="form-group field-formlogin-code">
<?php if($_SESSION['error'] == 3) echo '<div class="form-group field-formlogin-code has-error">';?>
<label class="control-label" for="formlogin-code">Секретный код (если есть)</label>
<input type="text" id="formlogin-code" class="main-inp w-100" name="code" placeholder="Ваш личный секретный код">
<?php if($_SESSION['error'] == 3) { echo '<p class="help-block help-block-error">Введен неверный секретный код!</p></div>'; $_SESSION['error'] = 0; }?>


</div>				        <div class="form-group field-formlogin-server">
<label class="control-label" for="formlogin-server">Сервер</label>
<select id="formlogin-server" class="main-inp main-select w-100" name="server">
<option value="0">Выберите сервер..</option>
<?
    for($x = 1; $x-1 < $servermon; $x++)
	{
		switch ($x)
		{
		    case 1: $now = $nameserver1;break;
			case 2: $now = $nameserver2;break;
			case 3: $now = $nameserver3;break;
			case 4: $now = $nameserver4;break;
			case 5: $now = $nameserver5;break;
			case 6: $now = $nameserver6;break;
			case 7: $now = $nameserver7;break;
			case 8: $now = $nameserver8;break;
			case 9: $now = $nameserver9;break;
		}
	    echo '<option value='.$x.'>'.$servername.' RolePlay '.$now.'</option>';
	}
?>
</select>
<p class="help-block help-block-error">
</div>
						<div class="googleTest">
														<div class="form-group field-formlogin-captcha">
<?php if($_SESSION['error'] == 4) echo '<div class="form-group field-formlogin-captcha has-error">';?>
<label class="control-label" for="formlogin-captcha"></label>
<div class="row"><div class="col-sm-7"><input type="text" id="formlogin-captcha" class="main-inp w-100" name="captcha" placeholder="Код.." autocomplete="off"></div><div class="col-sm-5"><img id="formlogin-captcha-image" src="public/captcha/captcha.php" alt=""></div></div>
<p class="help-block help-block-error"><?php if($_SESSION['error'] == 4) { echo 'Неправильный проверочный код.</p></div>'; $_SESSION['error'] = 0; }?></p>
</div>						

						</div>


						<button type="submit" class="big-but w-100">Войти</button>
						<div class="more-line w-100">
							<a href="restore" class="href-white">Забыли пароль?</a>
						</div>
					</form>				</div>
			</div>
		</div>
	</div>

