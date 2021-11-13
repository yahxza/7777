<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
<?
    if($_POST['submit'] == 'yes'){
		
    require_once('engine/core/consite.php');
    $name = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['newsname']))));
	$image = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['newsimage']))));
	$text = $mysqli->real_escape_string(stripslashes(trim($_POST['newstext'])));
	$date = date("d.m.Y");
    $mysqli->set_charset("utf8");
	$sql = "INSERT INTO `site_news`(`date`,`title`,`text`,`status`,`image`) VALUES ('$date','$name','$text','1','$image')";
	$mysqli->query($sql);
	$mysqli->close();
	
	}
?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/css/froala_style.min.css" rel="stylesheet" type="text/css" />
	<style>
	.fr-wrapper>div>a { display: none!important; }
	</style>
        
		</div>
    </div>
</div>
<div id="content">
    <div class="container">
        <p class="b-title">Создание новости</p>

        <div style="width:725px;margin:0 auto;margin-bottom:auto;">
       
			
			
			
			
			<form id="news-form" action="/addnew" method="post" role="form">
<input type="hidden" name="_csrf" value="YXgtajY5Ulo1IV0yBF48LhsCZDtuUwMfLg9/CVdqZhgLAUtbXWowLQ==">

                          
<label class="control-label">Заголовок новости</label>
<input type="text" class="main-inp w-100" name="newsname">

		
<label class="control-label">Ссылка на изображение (267x267)</label>
<input type="text" class="main-inp w-100" name="newsimage">
                

<label class="control-label">Полный текст (HTML)</label>
<textarea name="newstext"></textarea>
	
	
				
				<button type="submit" name="submit" value="yes" class="big-but w-100">Создать</button>
				<br></br><br></br>
			</form>        
		</div>
    </div>
</div>
   
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.5/js/froala_editor.pkgd.min.js"></script>
    <script> $(function() { $('textarea').froalaEditor() }); </script>