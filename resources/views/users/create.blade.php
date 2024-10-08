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


            {{-- <div class="m-3">
                <label for="perfils">Selecione os perfils:</label>
                <select name="perfils" id="perfils" required>
                    @foreach ($perfils as $perfil)
                        <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                    @endforeach
                </select>
                <button>Adicionar</button>
            </div> --}}


            <div class="m-3">
                <label for="perfils">Selecione um Perfil:</label>
                <select name="perfils" id="perfils" required>
                    @foreach ($perfils as $perfil)
                        <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                    @endforeach
                </select>
                <button type="button" id="add-perfil">Adicionar Perfil</button>
            </div>

            <div>
                <ul id="perfil-list"></ul>
            </div>

            <input type="hidden" name="perfils" id="perfils-input">

            <div class="m-3">
                <button type="submit" class="btn btn-outline-primary">Criar</button>
                <a href="{{ route('index') }}" class="btn btn-outline-secondary">Voltar</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-perfil').addEventListener('click', () => {
            const perfilSelect = document.getElementById('perfils');
            const perfilId = perfilSelect.value;
            const perfilName = perfilSelect.options[perfilSelect.selectedIndex].text;
            const list = document.createElement('li');
            list.textContent = perfilName;

            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remover';
            removeButton.type = 'button';
            removeButton.onclick = function() {
                list.remove();
                updateHiddenInput();
            };

            list.appendChild(removeButton);
            document.getElementById('perfil-list').appendChild(list);
            updateHiddenInput();
        });

        function updateHiddenInput() {
            const perfilList = document.getElementById('perfil-list');
            const perfils = [];
            perfilList.querySelectorAll('li').forEach((li) => {
                const perfilName = li.textContent.replace(' Remover', '');
                const perfil = [...document.getElementById('perfils').options].find(option => option.text ===
                    perfilName);
                if (perfil) {
                    perfils.push(perfil.value);
                }
            });
            document.getElementById('perfils-input').value = perfils.join(',');

        }
    </script>
@endsection
