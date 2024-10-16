@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-between align-items-center mt-4">
        <h2> Dashboard di {{ Auth::user()->name }} {{ Auth::user()->surname }} </h2>
        <div>
            <a class="btn btn-success" href="{{ route('admin.apartments.create') }}"> Aggiungi un appartamento <i
                    class="fa-solid fa-plus"> </i></a>
        </div>
    </div>
    <div class="container">
        @if (session('delete'))
            <div class="alert alert-danger d-block">
                {{ session('delete') }}
            </div>
        @endif
        <ul class="row gap-3 row-cols-1 row-cols-md-4 justify-content-center">
            @foreach ($apartments as $apartment)
                <li class="mt-3 card p-4 mb-4 bg-white shadow rounded d-flex flex-column">
                    {{-- <a class="stretched-link z-1" href="{{ route('apartments.show', $apartment) }}"></a> --}}
                    {{-- <img class="card-img-top w-100 images" src="{{ asset('storage/' . $apartment->path_image) }}" alt=""> --}}
                    <div class="card-body w-100">
                        <h5 class="card-title mt-3">
                            {{ $apartment->title }}
                        </h5>
                        <p class="card-text mt-3">
                            {{ $apartment->description }}
                        </p>
                        <div class="d-flex justify-content-center align-self-end">
                            <a class="btn btn-primary m-2" href="{{ route('admin.apartments.edit', $apartment) }}"> <i
                                    class="fa-solid fa-pen">
                                </i></a>
                            <a class="btn btn-primary m-2" href="{{ route('admin.apartments.show', $apartment) }}"> <i
                                    class="fa-solid fa-eye">
                                </i></a>

                            <form
                                class="btn btn-danger rounded border-0 z-3 w-25 d-flex align-items-center justify-content-center"
                                action="{{ route('admin.apartments.destroy', $apartment) }}" method="POST"
                                onsubmit="return confirm('sei sicuro di voler cancellare {{ $apartment['title'] }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"> <i class="text-light fa-solid fa-trash">
                                    </i></button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
            @empty($apartments)
                <li> You own no apartments. </li>
            @endempty
        </ul>
    </div>
@endsection
