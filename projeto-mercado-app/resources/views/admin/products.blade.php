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
                <th>Produto</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
    @foreach ($products as $product)
    <tr>
        <td>
            <p>{{$product->product_name}}</p>
        </td>
        <td>
            @if($product->product_img != "")
                <img src="/storage/images/{{$product->product_img}}" width="200px" alt="não achado">
            @endif
        </td>
        <td>
            <a href="/editar-produto/{{$product->id}}" class="btn btn-warning">Editar</a>
            <a href="/excluir-produto/{{$product->id}}" class="btn btn-danger">Excluir</a>
        </td>
    </tr>
    @endforeach
    </table>
    <a class="btn btn-primary" href="/cadastrar-produto">Cadastrar produto</a>
    <a class="btn btn-danger" href="/">Voltar</a>
</body>
</html>