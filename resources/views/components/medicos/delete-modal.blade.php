<form action="{{ route('medico.delete', $medico->id) }}" method="POST"
    onsubmit="return confirm('¿Seguro que quieres eliminar este médico?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
</form>