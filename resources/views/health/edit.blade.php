@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier mes indicateurs de santé</h2>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <form action="{{ route('health.update') }}" method="POST">
        @csrf

        <div>
            <label for="tension_arterielle">Tension artérielle (ex: 125/80)</label>
            <input type="text" name="tension_arterielle" id="tension_arterielle" value="{{ old('tension_arterielle', $user->tension_arterielle) }}">
            @error('tension_arterielle') <div style="color: red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="frequence_cardiaque">Fréquence cardiaque (bpm)</label>
            <input type="number" name="frequence_cardiaque" id="frequence_cardiaque" value="{{ old('frequence_cardiaque', $user->frequence_cardiaque) }}">
            @error('frequence_cardiaque') <div style="color: red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="glycemie">Glycémie (g/L)</label>
            <input type="number" step="0.1" name="glycemie" id="glycemie" value="{{ old('glycemie', $user->glycemie) }}">
            @error('glycemie') <div style="color: red">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="imc">IMC</label>
            <input type="number" step="0.1" name="imc" id="imc" value="{{ old('imc', $user->imc) }}">
            @error('imc') <div style="color: red">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</div>
@endsection
