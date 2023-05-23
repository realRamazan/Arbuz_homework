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
<h3>Ваш заказ:</h3>
<br>
@for($x = 0; $x < count($data['quantity']); $x+= 1)
    @if($data['quantity'][$x] != null)
        {{$data['name'][$x]}}
        {{$data['quantity'][$x]}}
        <br>
    @endif
@endfor

<br>
<br>
<div>Период</div> <div>{{$data['period']}}</div>
<br>
<br>
<div>День недели</div> <div>{{$data['day']}}</div>
<br>
<form action="{{route('order.create')}}" method="post">
    @csrf
    <div>Ваш номер</div><input type="text" name="phone_number">
    <br>
    <div>Адрес доставки</div> <input type="text" name="address">
    <div>
        <input type="hidden" name="day" value="{{$data['day']}}">
        <input type="hidden" name="period" value="{{$data['period']}}">
    </div>
    @foreach($data['quantity'] as $item)
        <input type="hidden" name="quantity[]" value="{{$item}}">
    @endforeach
    @foreach($data['name'] as $item)
        <input type="hidden" name="name[]" value="{{$item}}">
    @endforeach
    @foreach($data['id'] as $item)
        <input type="hidden" name="id[]" value="{{$item}}">
    @endforeach
    <button type="submit">Создать подписку</button>
</form>
</body>
</html>
