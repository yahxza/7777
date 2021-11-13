<?
    session_start();

    require '../engine/core/config/config1.php';

    $mysqli = @new mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);]
	
	$mysqli->set_charset("utf8");

    if (mysqli_connect_errno())
	{
        echo json_encode(array('status' => 'error', 'message' => 'Не удалось подключиться к бд'));
        return false;
	}

    $name = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['name']))));
    $type = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['type']))));
    $limit = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['limit']))));


    if(empty($name))
    {
        echo json_encode(array('status' => 'error', 'message' => 'Заполните ник'));
        return false;
    }

    if($type <= 0)
    {
        echo json_encode(array('status' => 'error', 'message' => 'Выберите тип'));
        return false;
    }

    if($limit <= 0)
    {
        echo json_encode(array('status' => 'error', 'message' => 'Неверная значения лимита'));
        return false;
    }



    $sql = "SELECT * FROM `accounts` WHERE `NickName` = '{$name}'";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    if($rows == 0)
    {
        echo json_encode(array('status' => 'error', 'message' => 'Аккаунт не найден'));
        return false;
    }

    switch($type)
    {
        case 1: // 1 это для деньги надо это определить из файла logs.php
        {
            $sql = "SELECT * FROM `money_log` WHERE `Name` = '{$name}' ORDER BY `id` DESC LIMIT {$limit}";
            $result = $mysqli->query($sql);
            $rows = $result->num_rows;
            if($rows > 0)
            {
                $dannie =
                '<table style="width:100%">
                    <tr>
                        <th>IP</th>
                        <th>Действия</th>
                        <th>Дата</th>
                    </tr>';


                for ($i=0; $i < $rows; $i++)
                {
                    $result->data_seek($i);
                    $log = $result->fetch_assoc();

                    $dannie .=
                    '<tr>
                        <td>'.$log['ip'].'</td>
                        <td>'.$log['info'].'</td>
                        <td>'.$log['date'].'</td>
                    </tr>';

                }

                $dannie .= '</table>';

                echo json_encode(array('status' => 'success', 'result' => $dannie));
            }
            else
            {
                echo json_encode(array('status' => 'error', 'message' => 'Логи этого игрока не найден'));
            }
            break;
        }
        case 2: // 1 это для деньги надо это определить из файла logs.php
        {
            $sql = "SELECT * FROM `admin_log` WHERE `Name` = '{$name}' ORDER BY `id` DESC LIMIT {$limit}";
            $result = $mysqli->query($sql);
            $rows = $result->num_rows;
            if($rows > 0)
            {
                $dannie =
                '<table style="width:100%">
                    <tr>
                        <th>IP</th>
                        <th>Действия</th>
                        <th>Дата</th>
                    </tr>';


                for ($i=0; $i < $rows; $i++)
                {
                    $result->data_seek($i);
                    $log = $result->fetch_assoc();

                    $dannie .=
                    '<tr>
                        <td>'.$log['ip'].'</td>
                        <td>'.$log['info'].'</td>
                        <td>'.$log['date'].'</td>
                    </tr>';

                }

                $dannie .= '</table>';

                echo json_encode(array('status' => 'success', 'result' => $dannie));
            }
            else
            {
                echo json_encode(array('status' => 'error', 'message' => 'Логи этого игрока не найден'));
            }
            break;
        }
        case 3: // 1 это для деньги надо это определить из файла logs.php
        {
            $sql = "SELECT * FROM `frac_log` WHERE `Name` = '{$name}' ORDER BY `id` DESC LIMIT {$limit}";
            $result = $mysqli->query($sql);
            $rows = $result->num_rows;
            if($rows > 0)
            {
                $dannie =
                '<table style="width:100%">
                    <tr>
                        <th>IP</th>
                        <th>Действия</th>
                        <th>Дата</th>
                    </tr>';


                for ($i=0; $i < $rows; $i++)
                {
                    $result->data_seek($i);
                    $log = $result->fetch_assoc();

                    $dannie .=
                    '<tr>
                        <td>'.$log['ip'].'</td>
                        <td>'.$log['info'].'</td>
                        <td>'.$log['date'].'</td>
                    </tr>';

                }

                $dannie .= '</table>';

                echo json_encode(array('status' => 'success', 'result' => $dannie));
            }
            else
            {
                echo json_encode(array('status' => 'error', 'message' => 'Логи этого игрока не найден'));
            }
            break;
        }
        case 4: // 1 это для деньги надо это определить из файла logs.php
        {
            $sql = "SELECT * FROM `all_log` WHERE `Name` = '{$name}' ORDER BY `id` DESC LIMIT {$limit}";
            $result = $mysqli->query($sql);
            $rows = $result->num_rows;
            if($rows > 0)
            {
                $dannie =
                '<table style="width:100%">
                    <tr>
                        <th>IP</th>
                        <th>Действия</th>
                        <th>Дата</th>
                    </tr>';


                for ($i=0; $i < $rows; $i++)
                {
                    $result->data_seek($i);
                    $log = $result->fetch_assoc();

                    $dannie .=
                    '<tr>
                        <td>'.$log['ip'].'</td>
                        <td>'.$log['info'].'</td>
                        <td>'.$log['date'].'</td>
                    </tr>';

                }

                $dannie .= '</table>';

                echo json_encode(array('status' => 'success', 'result' => $dannie));
            }
            else
            {
                echo json_encode(array('status' => 'error', 'message' => 'Логи этого игрока не найден'));
            }
            break;
        }
    }

?>
