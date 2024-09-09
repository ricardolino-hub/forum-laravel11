<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Criar Pergunta') }}
            </h2>
            <x-link-button link="questions.index">Listagem de perguntas</x-link-button>
        </div>
    </x-slot>

    <br>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-error-message/>

        <form action="{{ route('questions.store') }}" method="post">
            @csrf
            @include('question.partials.form')
        </form>
    </div>
    <br>
</x-app-layout>