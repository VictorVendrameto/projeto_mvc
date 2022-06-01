<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro de Pessoa</legend>
        <form action="/pessoa/form/save" method="post">
        
            <input type="hidden" value="<?= $model->id ?>" name="id"/>

            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" />

            <label for="CPF">CPF:</label>
            <input name="CPF" id="CPF" type="number" />

            <label for="data_nascimento">Data Nascimento:</label>
            <input name="data_nascimento" id="data_nascimento" type="date" />

            <button type="submit">Enviar</button>

        </form>    
    </fieldset>
</body>
</html>