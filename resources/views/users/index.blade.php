@extends('layout.app')

@section('content')
<div style="max-width: 800px">
    <h1>Lista de Usuários</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome do Usuário</th>
                <th>Email</th>
                <th>Perfis</th>
                <th>Ações</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user?->name }}</td>
                    <td>{{ $user?->email }}</td>
                    <td>

                        <span class="item">
                            @foreach ($user->listPerfil as $userPerfil)
                                {{ $userPerfil->perfil->name }}<br>
                            @endforeach
                        </span>
                    </td>
                    <td><a href="{{ route('edit', $user->id) }}" class="btn btn-outline-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                <tr class="itemPerfil" style="display: none">
                    <td colspan="5">
                        <ul>
                            @foreach ($user->listPerfil as $userPerfil)
                                <li>{{ $userPerfil->perfil->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum usuário encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('create') }}" class="btn btn-outline-primary">Criar novo usuário</a>

    <script>
        document.querySelectorAll('.item').forEach(item => {
            item.addEventListener('click', () => {
                const infoRow = item.closest('tr').nextElementSibling;
                infoRow.style.display = infoRow.style.display === 'none' ? 'table-row' : 'none';
            });
        });
    </script>
</div>
@endsection
