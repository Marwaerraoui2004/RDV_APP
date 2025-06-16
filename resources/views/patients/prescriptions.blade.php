
<div class="container">
    <h2 class="mb-4">Mes ordonnances</h2>

    @if($prescriptions->isEmpty())
        <div class="alert alert-info">Aucune ordonnance disponible pour le moment.</div>
    @else
        @foreach($prescriptions as $prescription)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Médicament : {{ $prescription->medication_name }}</h5>
                    <p><strong>Docteur :</strong> {{ $prescription->doctor->name }}</p>
                    <p><strong>Dosage :</strong> {{ $prescription->dosage }}</p>
                    <p><strong>Fréquence :</strong> {{ $prescription->frequency }}</p>
                    <p><strong>Durée :</strong> {{ $prescription->duration }}</p>
                    @if($prescription->notes)
                        <p><strong>Notes :</strong> {{ $prescription->notes }}</p>
                    @endif

                    @if($prescription->signature_path)
                        <div class="mt-3">
                            <strong>Signature du docteur :</strong><br>
                            <img src="{{ asset($prescription->signature_path) }}" alt="Signature" width="200" height="80">
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
