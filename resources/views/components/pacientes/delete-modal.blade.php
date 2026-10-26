<form action="{{ route('paciente.delete', $paciente->id) }}" method="POST"
    onsubmit="return confirm('¿Seguro que quieres eliminar este paciente?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
</form>