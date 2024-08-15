<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Estabelecimento</th>
                <th>Ações</th>
            </tr>
        </thead>
    @foreach ($stores as $store)
        <tr>
            <td>
            @if ($store->store_img != "")
                <img src="/storage/images/{{$store->store_img}}" style="width: 70px" alt="">
            @endif
            </td>
            <td>
                <input type="hidden" name="store_id" value="{{$store->id}}">
                <p>{{$store->store_name}} - {{$store->store_address}}</p>
            </td>
            <td>
                <a href="/gerenciar-estoque/{{$store->id}}" class="btn btn-success">Gerenciar estoque</a>
                <a href="/editar-estabelecimento/{{$store->id}}" class="btn btn-warning">Editar dados do estabelecimento</a>
                <a href="/excluir-estabelecimento/{{$store->id}}" class="btn btn-danger">Excluir estabelecimento</a>
                @endforeach
            </td>
        </tr>
    </table>
    
    <a class="btn btn-primary" href="/cadastrar-estabelecimento">Cadastrar estabelecimento</a>
    <a class="btn btn-danger" href="/">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>