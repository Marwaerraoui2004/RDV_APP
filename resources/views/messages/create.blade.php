
<h2>Envoyer un message à un docteur</h2>

<form action="{{ route('message.store') }}" method="POST">
    @csrf

    <label for="receiver_id">Choisir un docteur :</label>
    <select name="receiver_id" required>
        <option value="">-- Sélectionner un docteur --</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach
    </select>

    <br><br>

    <label for="message">Message :</label><br>
    <textarea name="message" rows="5" required></textarea>

    <br><br>
    <button type="submit">Envoyer</button>
</form>
