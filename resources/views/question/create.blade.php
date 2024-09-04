<h1>Pergunta</h1>

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

<a href="{{ route('questions.index') }}">Listagem de perguntas</a>
<br>
<br>

<form action="{{ route('questions.store') }}" method="post">
    @csrf
    <input type="text" name="subject" value="{{ @old('subject') }}"><br>
    <textarea name="text" col="30" rows="10">{{ @old('text') }}</textarea>
    <select name="category_id" id="">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if (@old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Enviar</button>
</form>