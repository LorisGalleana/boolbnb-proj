@extends('layouts.app')

@section('content')
  <div class="container">
    
    <h6> Proprietario degli appartamenti: {{ Auth::user()->name }} {{ Auth::user()->surname }} </h6>

    <h2>Show dell'appartamento</h2>

    <div class="d-flex flex-wrap mt-4">
      @foreach ($apartments as $apartment)

      <div class="card " style="width: 18rem;">
                        {{-- Immagine/i appartamento --}}
              <div class="picture">
                {{ $apartment->img_name}}
              </div>
              <div class="card-body">
                      {{-- Nome appartamento --}}
                <h5 class="card-title">
                  {{ $apartment->title }}
                </h5>
                            {{-- Descrizione appartamento --}}
                <p class="card-text">
                  <p> {{$apartment->description}} </p>
                </p>
                            {{-- Caratteristiche dell'appartamento --}}
                <div class="card-text d-flex flex-column">
                  <h5> Caratteristiche appartamento </h5>
                  <span> Numero Stanze : {{$apartment->room}} </span>
                  <span>Numeri Letti :{{$apartment->bed}}</span>
                  <span>Numero Bagni: {{$apartment->bathroom}}</span>
                  <span>Grandezza: {{$apartment->sqm}} m²</span>
                </div>
                  {{-- Servizi Appartamento --}}
                <div class="card-text d-flex flex-column">
                  <h5>Servizi : </h5>
                    @foreach ($services as $service)
                      <span>
                        {{$service->name}}
                      </span>
                    @endforeach
                </div>

                {{-- Indirizzo appartamento --}}
                <div class="card-text d-flex flex-column">
                  <h4> Indirizzo : </h4>
                  <span class="text-secondary">
                    {{$apartment->address}}
                  </span> 
                </div>

                {{-- Longitudine e latitudine --}}
                <div class="card-text d-flex flex-column">
                  <h4>Longitudine e Latitudine</h4>
                  <span class="text-secondary">
                    {{$apartment->coordinate_long_lat}}
                  </span> 

                  {{-- Disponibilità --}}
                  <div>
                  <h4>Disponibilte</h4>
                    <button class="btn btn-success">
                      {{$apartment->is_visible}}         
                    </button>
                  </div> 
                </div> 
              </div>
      @endforeach
      </div>
    </div>
  </div>

@endsection