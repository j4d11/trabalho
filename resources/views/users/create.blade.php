<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar</title>
</head>

<body>
    <h1>Criar novo usuário</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for ='name'>Nome:</label>
        <input type = "text" name="name" id="name" required>
        <label for ='email'>Email:</label>
        <input type = "text" name="email" id="email" required>

        <label for="perfil_id">Perfils:</label>
        <select name="perfil_id" id="perfil_id" required>
            @foreach ($perfils as $perfil)
                <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
            @endforeach
        </select>


        <button type="submit">Criar</button>
        <a href="{{route('index')}}">Voltar</a>
</body>

</html>
