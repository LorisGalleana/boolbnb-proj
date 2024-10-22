@extends('admin.index')

@section('user')
    <div class="container">
        @if (session('delete'))
            <div class="alert alert-danger mx-auto">
                {{ session('delete') }}
            </div>
        @endif

        @if (session('update'))
            <div class="alert alert-success mx-auto">
                {{ session('update') }}
            </div>
        @endif

        @if (session('sponsor_success'))
            <div class="alert alert-success">
                {{ session('sponsor_success') }}
            </div>
        @endif

        <h2 class="mt-3 text-primary"> Dettaglio appartamento </h2>
        <h6 class="text-primary"> Proprietario: {{ Auth::user()->name }} {{ Auth::user()->surname }} </h6>

        <div class="mt-5 card">

            <div class="row no-gutters">
                <div class="col-sm-5">
                    <img src="{{ asset('storage/' . $apartment->img_path) }}" class="img-thumbnail"
                        onerror="this.src='/img/default-image.jpg'">
                </div>
                <div class="col-sm-7">
                    <div class="card-body">
                        {{-- Nome appartamento --}}
                        <h3 class="card-title">
                            {{ $apartment->title }}
                        </h3>


                        {{-- Descrizione appartamento --}}


                        <p class="card-text"> {{ $apartment->description }} </p>


                        {{-- Caratteristiche dell'appartamento --}}


                        <h5> Caratteristiche: </h5>
                        <div class="card-text d-flex flex-column">
                            <span> Numero Stanze : {{ $apartment->room }} </span>
                            <span>Numeri Letti :{{ $apartment->bed }}</span>
                            <span>Numero Bagni: {{ $apartment->bathroom }}</span>
                            <span>Grandezza: {{ $apartment->sqm }} m²</span>
                        </div>


                        {{-- Servizi Appartamento --}}


                        <h5 class="mt-2">Servizi: </h5>
                        <div class="card-text d-flex flex-column">
                            @foreach ($apartment->services as $service)
                                <span>
                                    {{ $service->name }}
                                </span>
                            @endforeach
                        </div>


                        {{-- Indirizzo appartamento --}}


                        <h5 class="mt-2"> Indirizzo: </h5>
                        <span class="card-text">
                            {{ $apartment->address }}
                        </span>


                        {{-- Visibilità --}}

                        <h5 class="mt-2">Visibilità</h5>
                        <button class="btn btn-success">
                            @if ($apartment->is_visible)
                                <i class="fa-solid fa-eye"></i>
                            @else
                                <i class="fa-solid fa-eye-slash"></i>
                            @endif
                        </button>
                        <button class="btn btn-warning text-white"><a
                                href="{{ route('admin.message.index', ['apartment' => $apartment->id]) }}"><i
                                    class="fa-regular fa-envelope"></i></a>
                        </button>
                        <button class="btn btn-primary"><a href="{{ route('admin.sponsor.index') }}"><i
                                    class="fa-solid fa-sack-dollar"></i></a></button>
                    </div>
                </div>

                <div>
                    <h3 class="text-center">Sponsorizza l'appartamento</h3>
                    <div class="row justify-content-around">
                        @foreach ($sponsors as $sponsor)
                            <div class="card my-3 text-center" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $sponsor->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $sponsor->price }} €</h6>
                                    <p class="card-text">{{ $sponsor->duration }} ore</p>

                                    <form action="{{ route('admin.payment.store', $apartment->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <!-- campi nascosti per passare id dello sponsor -->
                                        <input type="hidden" name="sponsor_id" value="{{ $sponsor->id }}">
                                        <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                                        <button type="submit" class="btn btn-secondary text-white">Acquista</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
