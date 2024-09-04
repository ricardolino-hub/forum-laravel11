<h1>Listagem de perguntas</h1>

@if (session('success'))
    <p>
        {{ session('success') }}
    </p>
@endif

@if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
    @endforeach
        </ul>
    </div>
@endif

<a href="{{ route('questions.create') }}"">Cadastrar Perguntas</a>
<br>

<table>
    <thead>
        <tr>
            <th>Assunto</th>
            <th>Conteúdo</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($questions as $question)
            <tr>
                <td>{{ $question->subject }}</td>
                <td>{{ $question->text }}</td>
                <td>{{ $question->category->name }}</td>
                <td>
                    <a href="{{ route('questions.show', $question->id) }}">Detalhes</a>
                    <a href="{{ route('questions.edit', $question->id) }}">Editar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Nenhuma pergunta encontrada</td>
            </tr>
        @endforelse
    </tbody>
</table>