<?
    if(!defined("Airzona")) return require_once '../../public/pages/404norule.php';
?>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <h1 class="b-title">Магазин</h1>
        <div class="cash-grid">
            <div>
                <form id="donate-form" method="post" role="form">
                    


                    <div id="account-error" class="form-group field-donate-user required">
                        <label class="control-label" for="donate-user">Ник на сервере</label>

                        <input type="text" id="donate-user" class="main-inp w-100" name="name" placeholder="Например: Mark_Markov" required>
                        <p id="noaccount" class="help-block help-block-error"></p>
                    </div>                    


                    <div id="server-error" class="form-group field-donate-server required">
                        <label class="control-label" for="donate-server">Сервер</label>
                        <select id="donate-server" class="main-inp main-select w-100" name="server" required>
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
                        <p id="invalidserver" class="help-block help-block-error"></p>
                    </div>                    



                        <div id="sum-error" class="form-group field-donate-sum required">
                            <label class="control-label" for="donate-sum">Сумма, руб</label>
                            <input type="number" id="donate-sum" class="main-inp w-100" name="sum" placeholder="Сумма" required>
                            <p id="invalidsum" class="help-block help-block-error"></p>
                        </div>


                    <button class="big-but w-100" type="submit">Купить</button>
                </form>  


            </div>
            <div class="img-money">
                <img src="/public/images/design/money-art.png" alt="">
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

<script>
$('#donate-form').ajaxForm({
    url: '/donate.php',
    dataType: 'text',
    success: function(data) {
        data = $.parseJSON(data);
        var noaccount = $('#noaccount');
        var invalidserver = $('#invalidserver');
        var invalidsum = $('#invalidsum');
        noaccount.empty();
        invalidserver.empty();
        invalidsum.empty();
        switch(data.status) {
            case 'error':
            {
                switch(data.type)
                {
                    case 'noaccount':
                    {
                        noaccount.append('Аккаунт не найден!');
                        document.getElementById('account-error').classList.add('has-error');
                        break;
                    }
                    case 'invalidserver':
                    {
                        invalidserver.append('Выберите сервер!');
                        document.getElementById('server-error').classList.add('has-error');
                        break;
                    }
                    case 'invalidsum':
                    {
                        invalidsum.append('Не корректная сумма!');
                        document.getElementById('sum-error').classList.add('has-error');
                        break;
                    }
                    case 'online':
                    {
                        noaccount.append('Сначала выходите из игры!');
                        document.getElementById('account-error').classList.add('has-error');
                        break;
                    }
                }
                break;
            }
            case 'success':
            {
                location.href = data.url;
                break;
            }
        }
    },
});
</script>