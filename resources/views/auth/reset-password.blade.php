<form action="{{ route('password.reset.direct') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="secret_code" placeholder="Code secret" required>
    <input type="password" name="new_password" placeholder="Nouveau mot de passe" required>
    <input type="password" name="new_password_confirmation" placeholder="Confirmer" required>
    <button type="submit">Réinitialiser</button>
</form>
