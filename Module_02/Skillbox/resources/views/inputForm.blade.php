<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InputForm</title>
</head>
<body>
    <form action="{{url("/store_form")}}" method="POST">
        {{ csrf_field() }}
        <div style="display: flex; flex-direction: column;gap: 10px; justify-content: space-between; width: 250px;">
        <div style="display: flex; justify-content: space-between;">
            <em>имя :</em>
            <input type="text" name="name">
        </div>
        <div style="display: flex; justify-content: space-between;">
            <em>фамилия :</em>
            <input type="text" name="surname">
        </div>
        <div style="display: flex; justify-content: space-between;">
            <em>email :</em>
            <input type="email" name="email">
        </div>
        <button type="submit">
            Отправить
        </button>
    </div>
    </form>
</body>
</html>