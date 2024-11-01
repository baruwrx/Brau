<form action="{{ route('register') }}" method="POST">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" name="name" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" required>

    <label for="password_confirmation">Confirmar Contraseña</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Registrar</button>
</form>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
