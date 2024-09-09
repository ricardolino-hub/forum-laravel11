<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Pergunta: {{ $question->id }}
            </h2>
            <x-link-button link="questions.index"> Listagem perguntas</x-link-button>
        </div>
    </x-slot>

    <br>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p class="text-white py-2">Assunto: {{ $question->subject }}</p>
        <p class="text-white py-2">Conteúdo: {{ $question->text }}</p>
        <p class="text-white py-2">Categoria: {{ $question->category->name }}</p>

        <button
            onclick="event.preventDefault(); if(confirm('Você realmente deseja excluir este item?')) document.getElementById('form-delete').submit()"
            type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Deletar</button>

        <form id="form-delete" action="{{ route('questions.destroy', $question->id) }}" method="POST">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <br>
</x-app-layout>