<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="/cadastrar-marca" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$brand->id}}">

        <label for="name">Marca</label>
        <input type="text" name="name" id="name" value="{{$brand->brand_name}}">

        <button class="btn btn-primary">Salvar alterações</button>
    </form>
    <a class="btn btn-primary" href="/marcas">Voltar</a>
</body>
</html>