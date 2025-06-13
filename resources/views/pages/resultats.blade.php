<h2>Résultats de recherche pour : "{{ $query }}"</h2>

<h3>Médecins</h3>
<ul>
@forelse($medecins as $medecin)
    <li>{{ $medecin->name }} - {{ $medecin->email }}</li>
@empty
    <li>Aucun médecin trouvé</li>
@endforelse
</ul>

<h3>Rendez-vous</h3>
<ul>
@forelse($rendezvous as $rdv)
    <li>
        Le {{ $rdv->date }} à {{ $rdv->heure ?? 'Heure non définie' }}<br>
        @if($rdv->medecin_id)
            Avec Dr {{ \App\Models\User::find($rdv->medecin_id)->name ?? 'Inconnu' }}
        @endif
    </li>
@empty
    <li>Aucun rendez-vous trouvé</li>
@endforelse
</ul>
