
<div class="container">
    <h2>Modifier mes indicateurs de santé</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('health.update') }}">
        @csrf
        <div>
            <label>Tension artérielle :</label>
            <input type="text" name="tension_arterielle" value="{{ old('tension_arterielle', $user->tension_arterielle) }}" placeholder="Ex: 120/80">
            @error('tension_arterielle') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Fréquence cardiaque (bpm) :</label>
            <input type="number" name="frequence_cardiaque" value="{{ old('frequence_cardiaque', $user->frequence_cardiaque) }}">
            @error('frequence_cardiaque') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Glycémie (g/L) :</label>
            <input type="number" step="0.1" name="glycemie" value="{{ old('glycemie', $user->glycemie) }}">
            @error('glycemie') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div>
            <label>IMC :</label>
            <input type="number" step="0.1" name="imc" value="{{ old('imc', $user->imc) }}">
            @error('imc') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</div>
