<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<h1>Produk</h1>

@if(isset($products))
    @foreach ($products as $product)
        <div>
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }}</p>
        </div>
    @endforeach
@endif

</body>
</html>
