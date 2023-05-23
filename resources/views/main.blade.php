<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2> Молочные продукты, сезонные овощи и фрукты </h2>
<div class="container">
    <form action="{{route('order.index')}}" method="get">
        @csrf
        @foreach($storages as $item)

            <div>
                {{$item->name}}
            </div>
        <div>
            <label for="number">Количество </label>
            <input type="text" id="number" name="quantity[]"> {{$item->measurement}}
            <input type="hidden" name="id[]" value="{{$item->id}}">
            <input type="hidden" name="name[]" value="{{$item->name}}">
        </div>
            <br>
        @endforeach
        <div>Период доставки</div><input type="text" name="period">
        <br>
        <br>
        <div>День недели:</div>
        <select name="day" id="day">
            <option value="Понедельник">Понедельник</option>
            <option value="Вторник">Вторник</option>
            <option value="Среда">Среда</option>
            <option value="Четверг">Четверг</option>
            <option value="Пятница">Пятница</option>
            <option value="Суббота">Суббота</option>
            <option value="Воскресенье">Воскресенье</option>
        </select>
        <br>
        <br>
        <button type="submit">Order</button>
    </form>
</div>
</body>
</html>
