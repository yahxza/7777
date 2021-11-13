<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
		</div>
    </div>
</div>

<style>
table, th, td {
    border: 3px solid #ff4a4a;
    border-collapse: collapse;
    padding: 10px;
}
</style>

<div id="content">
    <div class="container">
        <p class="b-title">Логи сервера</p>

        <div style="width:725px;margin:0 auto;margin-bottom:auto;">

            <form id="logs-form" method="post">

                <label class="control-label">Введите ник игрока</label>
                <input type="text" class="main-inp w-100" name="name">

                <label class="control-label">Выберите тип лога</label>
                <select class="main-inp main-select w-100" name="type">
                    <option value="0">Выберите тип</option>
                    <option value="1">Деньги</option>
					<option value="2">Admin</option>
					<option value="3">Frac</option>
					<option value="4">All</option>
                </select>

                <label class="control-label">Сколько строк получить (Лимит)</label>
                <input type="number" class="main-inp w-100" name="limit">

				<button type="submit" class="big-but w-100">Поиск</button>

				<br></br><br></br><br></br><br></br>
			</form>
		</div>

        <div id="loging">

        </div>

        <br></br><br></br><br></br><br></br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
$('#logs-form').ajaxForm({
    url: '/ajax/logs.php',
    dataType: 'text',
    success: function(data) {
        data = $.parseJSON(data);
        switch(data.status) {
            case 'error':
                swal('Ошибка',  data.message,  'error');
                break;
            case 'success':
                var loging = $('#loging');
                loging.empty();
                loging.append(data.result);
                break;
        }
    },
});
</script>

    </div>
</div>
