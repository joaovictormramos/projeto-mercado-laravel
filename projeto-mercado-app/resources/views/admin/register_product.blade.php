<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produto</title>
</head>
<body>
    <form action="/cadastrar-produto" method="post">
        @csrf
        <label for="name">Produto</label>
        <input type="text" name="name" id="name" required>

        <label for="brand_id">Marca</label>
        <select name="brand_id" id="brand_id" required>
            <option value="">Selecionar</option>
            @foreach ($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
            @endforeach
        </select>

        <label for="description">Descrição</label>
        <input type="text" name="description" id="description">

        <label for="measurement">Medida</label>
        <input type="number" name="measurement" id="measurement" step="0.1" required>

        <label for="unity_measurement">Unidade de medida</label>
        
        <abbr title="Quilograma">
            <label for="unity_measurement_kg">Kg</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_kg" value="Kg" required>

        <abbr title="Grama">
            <label for="unity_measurement_g">g</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_g" value="g" required>

        <abbr title="Litro">
            <label for="unity_measurement_l">L</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_l" value="L" required>

        <abbr title="Mililitro">
            <label for="unity_measurement_ml">mL</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_ml" value="mL" required>


        <label for="package">Embalagem</label>
        <select name="package" id="package" required>
            <option value="">Selecionar</option>
            @foreach ($packages as $package)
            <option value="{{$package->id}}">{{$package->package_name}}</option>
            @endforeach
        </select>

        <label for="section">Seção</label>
        <select name="section" id="section" required>
            <option value="">Selecionar</option>
            @foreach ($sections as $section)
            <option value="{{$section->id}}">{{$section->section_name}}</option>
            @endforeach
        </select>

        <button class="btn btn-primary">Cadastrar</button>
    </form>
</body>
</html>