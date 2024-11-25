@extends('layouts.base')

@section('content')

@can('create', App\Models\Pokemon::class)
    <div class="flex items-center">
        <div class="py-8 mb-5 p-4">
            <a href="{{url('pokemon/create')}}" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Pokemon</a>
        </div>
    </div>
@endcan

<div class="flex flex-wrap justify-center mt-10">
    @foreach($pokemon as $entity)
    <div class="p-4 max-w-sm">
        <div class="flex rounded-lg h-full dark:bg-pink-500  bg-teal-400 p-8 flex-col items-center">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($entity->image) }}" alt="{{ $entity->name }}"/>
            <h5 class="mb-1 text-xl font-medium text-white dark:text-white">{{ $entity->name }}</h5>
            <span class="text-sm text-white dark:text-white">{{ $entity->type }}</span>
            <span class="text-sm text-white dark:text-white">{{ $entity->power }}</span>
            @if (isset($entity->coach))
                <span class="text-sm text-white dark:text-white">{{ $entity->coach->name }}</span>           
            @else
                <span class="text-sm text-white dark:text-white">Sem treinador</span>           
            @endif
            <div class="flex mt-4 md:mt-6">
                <a href="{{ url('pokemon/'.$entity->id.'/edit') }}" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a>
                <form action="{{ url('pokemon/'.$entity->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                </form>
            </div>
        </div>
    </div>    
    @endforeach
</div>

@endsection
