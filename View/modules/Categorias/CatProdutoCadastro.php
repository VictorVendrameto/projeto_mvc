<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
        <legend>Cadastro de Categoria Produto</legend>
        <form action="/categoria/form/save" method="post">
        
            <input type="hidden" value="<?= $model->id ?>" name="id"/>

            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" />

            <label for="descricao">Descricao:</label>
            <input name="descricao" id="descricao" type="text" />

            <button type="submit">Enviar</button>

        </form>    
    </fieldset>
</body>
</html>