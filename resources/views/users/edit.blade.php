<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <form action="{{ route('update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for ='name'>Nome:</label>
        <input type = "text" name="name" id="name" value="{{ $user->name }}" required>
        <label for ='email'>Email:</label>
        <input type = "text" name="email" id="email" value="{{ $user->email }}" required>

        <label for="perfil_id">Perfils:</label>
        <select name="perfil_id" id="perfil_id" required>
            @foreach ($perfils as $perfil)
                <option value="{{ $perfil->id }}" {{ $user->perfil_id == $perfil->id ? 'selected' : '' }}>{{ $perfil->name }}</option>
            @endforeach
        </select>


        <button type="submit">Editar</button>
        <a href="{{route('index')}}">Voltar</a>
    </form>
</body>
</html>
