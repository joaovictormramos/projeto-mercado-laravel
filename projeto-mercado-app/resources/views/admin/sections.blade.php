<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <table>
        @foreach ($sections as $section)
        <tr>
            <td>
                <h3>{{$section->section_name}}</h3>
            </td>
            <td>
                <a href="/editar-secao/{{$section->id}}" class="btn btn-warning">Editar</a>
                <a href="/excluir-secao/{{$section->id}}" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach
    </table>

    <a class="btn btn-primary" href="/cadastrar-secao">Cadastrar seção</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>