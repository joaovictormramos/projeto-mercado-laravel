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
        <input type="hidden" name="id" value="{{$product->id}}">

        <label for="name">Produto</label>
        <input type="text" name="name" id="name" value="{{$product->product_name}}" required>

        <label for="brand_id">Marca</label>
        <select name="brand_id" id="brand_id" required>
            @foreach ($brands as $brand)
            <option value="{{$product->brand_id}}"{{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->brand_name}}</option>
            @endforeach
        </select>

        <label for="description">Descrição</label>
        <input type="text" name="description" id="description" value="{{$product->product_description}}">

        <label for="measurement">Medida</label>
        <input type="number" name="measurement" id="measurement" step="0.1" value="{{$product->product_measurement}}" required>

        <label for="unity_measurement">Unidade de medida</label>
        
        <abbr title="Quilograma">
            <label for="unity_measurement_kg">Kg</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_kg" value="Kg"{{ $product->product_unity_measurement == 'Kg' ? 'checked' : '' }} required>

        <abbr title="Grama">
            <label for="unity_measurement_g">g</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_g" value="g"{{ $product->product_unity_measurement == 'g' ? 'checked' : '' }} required>

        <abbr title="Litro">
            <label for="unity_measurement_l">L</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_l" value="L"{{ $product->product_unity_measurement == 'L' ? 'checked' : '' }} required>

        <abbr title="Mililitro">
            <label for="unity_measurement_ml">mL</label>
        </abbr>
        <input type="radio" name="unity_measurement" id="unity_measurement_ml" value="mL"{{ $product->product_unity_measurement == 'mL' ? 'checked' : '' }} required>

        <label for="package">Embalagem</label>
        <select name="package" id="package" value="{{$product->product_package}}" required>
            @foreach ($packages as $package)
            <option value="{{$package->id}}"{{$product->package_id == $package->id ? 'selected' : ''}}>{{$package->package_name}}</option>
            @endforeach
        </select>

        <label for="section">Seção</label>
        <select name="section" id="section" required>
            @foreach ($sections as $section)
            <option value="{{$section->id}}"{{$product->section_id == $section->id ? 'selected' : ''}}>{{$section->section_name}}</option>
            @endforeach
        </select>

        <button class="btn btn-primary">Salvar alterações</button>
    </form>
</body>
</html>