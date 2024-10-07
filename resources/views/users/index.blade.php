<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Lista de Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>Nome do Usuário</th>
                <th>Email</th>
                <th>Perfils</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user?->name }}</td>
                    <td>{{ $user?->email }}</td>

                    @foreach ($user->listPerfil as $userPerfil)
                        <td>{{ $userPerfil->perfil->name }}</td>
                    @endforeach

                    <td><a href="{{ route('edit', $user->id) }}">Editar</a></td>

                    <td>
                        <form action="{{ route('destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">Deletar</button>
                        </form>
                </tr>
                </td>
            @empty
                <tr>
                    <td colspan=100>Nenhum usuário encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('create') }}">Criar novo usuário</a>
</body>

</html>
