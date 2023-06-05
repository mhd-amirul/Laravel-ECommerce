<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("midtrans1") }}" method="post">
        @csrf
        <input type="text" name="user_id" placeholder="user id" value="1" hidden>
        <input type="text" name="products" placeholder="product" value="1" hidden>
        <input type="number" name="quantity" placeholder="quantity">

        <button type="submit">check out</button>
    </form>
</body>
</html>