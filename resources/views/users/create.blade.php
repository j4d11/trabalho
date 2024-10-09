@extends('layout.app')

@section('content')
<div style="max-width: 400px">
    <h1>Criar novo usuário</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="m-3">
            <label for='name'>Nome:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="m-3">
            <label for='email'>Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="m-3">
            <label for="perfils">Selecione os Perfis:</label>
            <select name="perfils[]" id="perfils" multiple required>
                @foreach ($perfils as $perfil)
                    <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <ul id="perfil-list"></ul>
        </div>

        <div class="m-3">
            <button type="submit" class="btn btn-outline-primary">Criar</button>
            <a href="{{ route('index') }}" class="btn btn-outline-secondary">Voltar</a>
        </div>
    </form>
</div>

<script>
    const perfilSelect = document.getElementById('perfils');
    const perfilList = document.getElementById('perfil-list');

    perfilSelect.addEventListener('change', () => {
        perfilList.innerHTML = ''; // Limpa a lista atual
        Array.from(perfilSelect.selectedOptions).forEach(option => {
            const listItem = document.createElement('li');
            listItem.textContent = option.text;

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remover';
            removeButton.type = 'button';
            removeButton.onclick = function() {
                option.selected = false; // Deselects the option
                perfilList.removeChild(listItem); // Remove item da lista
            };

            listItem.appendChild(removeButton);
            perfilList.appendChild(listItem);
        });
    });
</script>
@endsection
