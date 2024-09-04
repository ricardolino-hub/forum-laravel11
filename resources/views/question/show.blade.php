<h1>Detalhes da pergunta: {{ $question->subject }}</h1>

<a href="{{ route('questions.index') }}">Voltar</a>

<p>Assunto: {{ $question->subject }}</p>
<p>Conteúdo: {{ $question->text }}</p>
<p>Categoria: {{ $question->category->name }}</p>

<form action="{{ route('questions.destroy', $question->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>