<form action="{{ route('cita.cancel', $cita->id) }}" method="POST"
    onsubmit="return confirm('¿Seguro que quieres cancelar esta cita?')">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
</form>