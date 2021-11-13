<?
    if(!defined("Airzona")) return require_once '../../../public/pages/404norule.php';
?>
<?
    if($_GET['token'] == $_SESSION['acode'] && !empty($_SESSION['acode']))
    {
        require_once('engine/core/connect.php');
		$mysqli->set_charset("utf8");
	    $sql = "SELECT * FROM `accounts` WHERE `Mail` = '{$_SESSION['email']}'";
	    $result = $mysqli->query($sql);
		
		if($result->num_rows == 1)
		{
		
			if($_SESSION['restore'] == 'pass')
			{
				$sql = "UPDATE `accounts` SET `Password` = '{$_SESSION['pass']}' WHERE `Mail` = '{$_SESSION['email']}'";
       	  		$mysqli->query($sql);
			
				$from = "admin@airzona-rp.ru";
				$topic = "Восстановление доступа к игровому аккаунту";
				$message = "Ваш новый пароль: ";
				$message .= $_SESSION['passformail'];
				$headers = "From: ".$from."\r\nReply-To: ".$from."\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=utf-8;";
				$mbody .= $message."\r\n\r\n";
		    	mail($_SESSION['email'], $topic, $mbody, $headers);
			}
			else if($_SESSION['restore'] == 'code')
			{
				$sql = "UPDATE `accounts` SET `Key` = '{$_SESSION['code']}' WHERE `Mail` = '{$_SESSION['email']}'";
	       		$mysqli->query($sql);
			
				$from = "admin@airzona-rp.ru";
				$topic = "Восстановление доступа к игровому аккаунту";
				$message = "Ваш новый код: ";
				$message .= $_SESSION['code'];
				$headers = "From: ".$from."\r\nReply-To: ".$from."\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=utf-8;";
				$mbody .= $message."\r\n\r\n";
				mail($_SESSION['email'], $topic, $mbody, $headers);
			}
		}
		$result->close();
		$mysqli->close();
		session_unset();
		$_SESSION['success'] = 2;
    }
?>		
		</div>
    </div>
</div>
<div id="content">
    <div class="container">
        <p class="b-title">Восстановление доступа</p>
<? if($_SESSION['success'] == 1) {
echo'
<div id="w0-success" class="alert-success alert fade show">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

На привязанный к аккаунту E-Mail отправлены дальнейшие указания по восстановлению.

</div>';
$_SESSION['success'] = 0;
}
?>
<? if($_SESSION['success'] == 2) {
echo'
<div id="w0-success" class="alert-success alert fade show">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

Новый пароль отправлен Вам на привязанный к аккаунту E-Mail.

</div>';
$_SESSION['success'] = 0;
}
?> 
        <div style="width:400px;margin:0 auto;margin-bottom:20px">
            <form id="recovery-form" action="../engine/user/restore.php" method="post" role="form">
<input type="hidden" name="_csrf" value="YXgtajY5Ulo1IV0yBF48LhsCZDtuUwMfLg9/CVdqZhgLAUtbXWowLQ==">
                
				
				
				<div class="form-group field-formrecovery-email required">
<? if($_SESSION['error'] == 1) echo '<div class="form-group field-formlogin-code has-error">'; ?>
<label class="control-label" for="formrecovery-email">E-Mail</label>
<input type="text" id="formrecovery-email" class="main-inp w-100" name="email">
<p class="help-block help-block-error">
<? 
if($_SESSION['error'] == 1) 
{
	echo 'Адрес не найден.'; 
	$_SESSION['error'] = 0; 
}	
?></p>
</div>                



                      <div class="form-group field-formrecovery-server">
<label class="control-label" for="formrecovery-server">Сервер</label>
<select id="formrecovery-server" class="main-inp main-select w-100" name="server">
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
<p class="help-block help-block-error"></p>
</div>                


                      <div class="form-group field-formrecovery-type">
<label class="control-label" for="formrecovery-type">Что восстанавливаем?</label>
<select id="formrecovery-type" class="main-inp main-select w-100" name="type">
<option value="0">Пароль</option>
<option value="1">Секретный код</option>
</select>
<p class="help-block help-block-error"></p>
</div>                

         
						<div class="form-group field-formlogin-captcha">
<?php if($_SESSION['error'] == 2) echo '<div class="form-group field-formlogin-captcha has-error">';?>
<label class="control-label" for="formlogin-captcha">Проверочный код</label>
<div class="row"><div class="col-sm-7"><input type="text" id="formlogin-captcha" class="main-inp w-100" name="captcha" placeholder="Код.." autocomplete="off"></div><div class="col-sm-5"><img id="formlogin-captcha-image" src="public/captcha/captcha.php" alt=""></div></div>
<p class="help-block help-block-error"><?php if($_SESSION['error'] == 2) { echo 'Неправильный проверочный код.</p></div>'; $_SESSION['error'] = 0; }?></p>
</div>						


                <button type="submit" class="big-but w-100">Восстановить</button>

            </form>        </div>


    </div>
</div>