@extends('layout.app')

@section('content')
<div style="max-width: 400px">
    <h1>Editar usuário</h1>
    <form action="{{ route('update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') 
        
        <div class="m-3">
            <label for='name'>Nome:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
        </div>

        <div class="m-3">
            <label for='email'>Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
        </div>

        <div class="m-3">
            <label for="perfils">Selecione os Perfis:</label>
            <select name="perfils[]" id="perfils" multiple required>
                @foreach ($perfils as $perfil)
                    <option value="{{ $perfil->id }}" 
                        @if(in_array($perfil->id, $userPerfilIds)) selected @endif>
                        {{ $perfil->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <ul id="perfil-list"></ul>
        </div>

        <div class="m-3">
            <button type="submit" class="btn btn-outline-primary">Atualizar</button>
            <a href="{{ route('index') }}" class="btn btn-outline-secondary">Voltar</a>
        </div>
    </form>
</div>

<script>
    const perfilSelect = document.getElementById('perfils');
    const perfilList = document.getElementById('perfil-list');

    perfilSelect.addEventListener('change', () => {
        perfilList.innerHTML = ''; 
        Array.from(perfilSelect.selectedOptions).forEach(option => {
            const listItem = document.createElement('li');
            listItem.textContent = option.text;

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remover';
            removeButton.type = 'button';
            removeButton.onclick = function() {
                option.selected = false; 
                perfilList.removeChild(listItem); 

            listItem.appendChild(removeButton);
            perfilList.appendChild(listItem);
        });
    });

    
    document.addEventListener('DOMContentLoaded', () => {
        Array.from(perfilSelect.selectedOptions).forEach(option => {
            const listItem = document.createElement('li');
            listItem.textContent = option.text;

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remover';
            removeButton.type = 'button';
            removeButton.onclick = function() {
                option.selected = false; 
                perfilList.removeChild(listItem); 
            };

            listItem.appendChild(removeButton);
            perfilList.appendChild(listItem);
        });
    });
</script>
@endsection
