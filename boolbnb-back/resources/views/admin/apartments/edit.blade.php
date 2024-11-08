@extends('admin.index')

@section('user')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4>Attenzione!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4">

        <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <h2 class="my-4">Modifica appartamento: <br> {{ $apartment->title }}</h2>

        <form id="apartmentForm" action="{{ route('admin.apartments.update', $apartment) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="form-label">Titolo appartamento: <strong class="text-danger">*</strong></label>
                <input value="{{ old('title', $apartment->title) }}" name="title" type="text"
                    class="form-control @error('title') is-invalid @enderror" id="title">
                @error('title')
                    <small class="text-danger">*{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Descrizione: <strong class="text-danger">*</strong></label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                    placeholder="add description">{{ old('description', $apartment->description) }}</textarea>
            </div>

            <div class="d-md-flex justify-content-between gap-4">
                <div class="form-group mb-3 ">
                    <label for="room">Numero stanze: <strong class="text-danger">*</strong></label>
                    <input value="{{ old('room', $apartment->room) }}" type="number" id="room" name="room"
                        class="form-control @error('room') is-invalid @enderror" required min="1" max="250"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">

                    @error('room')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3 ">
                    <label for="bathroom">Numero di bagni: <strong class="text-danger">*</strong></label>
                    <input value="{{ old('bathroom', $apartment->bathroom) }}" type="number" id="bathroom" name="bathroom"
                        class="form-control @error('bathroom') is-invalid @enderror" required min="1" max="250"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">

                    @error('bathroom')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3 ">
                    <label for="bed">Numero di letti: <strong class="text-danger">*</strong></label>
                    <input value="{{ old('bed', $apartment->bed) }}" type="number" id="bed" name="bed"
                        class="form-control @error('bed') is-invalid @enderror" required min="1" max="250"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">

                    @error('bed')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3 ">
                    <label for="sqm">Metri quadrati: <strong class="text-danger">*</strong></label>
                    <input value="{{ old('sqm', $apartment->sqm) }}" type="number" id="sqm" name="sqm"
                        class="form-control @error('sqm') is-invalid @enderror" required min="1" max="50000"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0) || (event.charCode >= 48 && event.charCode <= 57)">

                    @error('sqm')
                        <small class="text-danger">*{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- input address con logica JS --}}
            @include('admin._partials.apiAddress', ['old' => old('address', $apartment->address)])

            <div class="form-group mb-3">
                <label for="img_path" class="form-label">Immagine</label>
                <input id="img_path" class="form-control" name="img_path" type="file" onchange="showImage(event)">
                @error('img_path')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <img src='{{ asset('storage/' . $apartment->img_path) }}' onerror="this.src='/img/default-image.jpg'"
                    id="thumb" class="img-thumbnail w-25 mt-2">
            </div>

            <div class="form-group mb-3">
                <label for="services" class="form-label d-block">Servizi disponibili: <strong
                        class="text-danger">*</strong></label>

                <div class="d-flex justify-content-center flex-wrap gap-2" style="width: 90%; margin: 0 auto;">
                    @foreach ($services as $service)
                        <input value="{{ $service->id }}" name="services[]" type="checkbox" class="btn-check "
                            id="service-{{ $service->id }}" autocomplete="off"
                            @if (
                                ($errors->any() && in_array($service->id, old('services', []))) ||
                                    (!$errors->any() && $apartment->services->contains($service->id))) checked @endif>
                        <label class="btn btn-outline-warning"
                            for="service-{{ $service->id }}">{{ $service->name }}</label>
                    @endforeach
                </div>

                @error('services')
                    <small class="text-danger d-block">*{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group mb-3">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_visible" value="0">
                    <input name="is_visible" class="form-check-input" type="checkbox" role="switch" value="1"
                        id="is_visible" @if (($errors->any() && old('is_visible') == 1) || (!$errors->any() && $apartment->is_visible == 1)) checked @endif>
                    <label class="form-check-label" for="is_visible">Appartamento visibile al pubblico</label>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" href="#" class="btn btn-success">Modifica</button>
                <button type="reset" href="#" class="btn btn-danger">Annulla</button>
            </div>

        </form>

    </div>

    <script>
        function showImage(event) {
            const thumb = document.getElementById('thumb');
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
