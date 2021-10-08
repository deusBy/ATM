<?php
$nominal = '5,10,20,50,100,200,500'; // доступные номиналы
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Банкомат</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" /> 
    <script src="assets/js/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 align-self-center border border-primary p-3">
                <form class="p-3">
                    <div class="form-group">
                        <label for="nominal">Номинал в наличии</label>
                        <input type="text" class="form-control" id="nominal" value="<?= $nominal;?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="amount">Ваша сумма</label>
                        <input type="number" class="form-control" id="amount">
                    </div>
                    <button type="button" id="send" class="btn btn-primary btn-lg">Отправить</button>
                </form>
                <div>Ответ:</div>
                <div class="alert alert-primary" role="alert" id="root"></div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <script>
        $(function() {
            $('#send').on('click', function() {
                $.ajax({
                    'type': 'get',
                    'data': 'amount=' + $('#amount').val(),
                    'url': 'noteCounter.php',
                    'success': function(data) {
                        $('#root').empty();
                        $('#root').append(data);
                    },
                    'error': function(msg) {
                        console.log(msg);
                    }
                });
            });
        });
    </script>
</body>

</html>
