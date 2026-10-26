<form action="{{ route('especialidad.delete', $especialidad->id) }}" method="POST"
    onsubmit="return confirm('¿Seguro que quieres eliminar esta especialidad?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
</form>