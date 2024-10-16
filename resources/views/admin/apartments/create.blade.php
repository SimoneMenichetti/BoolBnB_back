@extends('layouts.app')

@section('content')
<h1>Inserisci i dati per il nuovo appartamento</h1>

<form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Titolo annuncio</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ old('title') }}">
        @error('title')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="d-flex gap-3 mb-3">
        <div>
            <label for="room" class="form-label">N. Camere</label>
            <input type="number" class="form-control @error('room') is-invalid @enderror" id="room" name="room"
                value="{{ old('room') }}">
            @error('room')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="beds" class="form-label">N. Letti</label>
            <input type="number" class="form-control @error('beds') is-invalid @enderror" id="beds" name="beds"
                value="{{ old('beds') }}">
            @error('beds')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="bathroom" class="form-label">N. Bagni</label>
            <input type="number" class="form-control @error('bathroom') is-invalid @enderror" id="bathroom"
                name="bathroom" value="{{ old('bathroom') }}">
            @error('bathroom')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="mq" class="form-label">Metri Quadri</label>
            <input type="number" class="form-control @error('mq') is-invalid @enderror" id="mq" name="mq"
                value="{{ old('mq') }}">
            @error('mq')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>
    <div class="d-flex gap-3 mb-3">
        <div>
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                value="{{ old('address') }}">
            @error('address')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="civic_number" class="form-label">N. Civico</label>
            <input type="number" class="form-control @error('civic_number') is-invalid @enderror" id="civic_number"
                name="civic_number" value="{{ old('civic_number') }}">
            @error('civic_number')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="city" class="form-label">Città</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                value="{{ old('city') }}">
            @error('city')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group">
        @foreach ($services as $service)
        <input name="services[]" type="checkbox" value="{{ $service->id }}" class="btn-check"
            id="service-{{ $service->id }}" autocomplete="off" @if(in_array($service->id, old('services',
        [])))checked
        @endif>
        <label class="btn btn-outline-primary" for="service-{{ $service->id }}">{{ $service->name }}</label>
        @endforeach
        @error('services')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Immagine</label>
        <input class="form-control" type="file" id="img" name="img[]" multiple>
        @error('img')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="is-visible-radios mb-3">
        <div>Visibile</div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_visible" value="1" id="flexRadioDefault1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Si
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_visible" value="0" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                No
            </label>
        </div>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Invia">
        <input type="reset" class="btn btn-danger" value="Annulla">
    </div>
</form>
@endsection
