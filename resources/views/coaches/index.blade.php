@extends('layouts.base')

@section('content')

<div class="flex items-start">
    <div class="py-8 mb-5">
    <a href="{{url('pokemon/create')}}" class="text-white bg-gradient-to-r from-slate-500 via-slate-600 to-slate-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-slate-800 dark:focus:ring-slate-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Pokemon</a>
    </div>
</div>

<div class="flex flex-wrap justify-center mt-10">    
    @foreach($coaches as $entity)
    <div class="p-4 max-w-sm">
        <div class="flex rounded-lg h-full dark:bg-gray-800 bg-teal-400 p-8 flex-col">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($entity->image) }}" alt="{{ $entity->name }}"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $entity->name }}</h5>
            <div class="flex mt-4 md:mt-6">
                <a href="{{ url('coaches/'.$entity->id.'/edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                <form action="{{ url('coaches/'.$entity->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Delete</button></form>
            </div>
        </div>
    </div>    
    @endforeach
@endsection

