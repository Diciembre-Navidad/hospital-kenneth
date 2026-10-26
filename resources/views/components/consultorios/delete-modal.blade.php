<form action="{{ route('consultorio.delete', $consultorio->id) }}" method="POST"
    onsubmit="return confirm('¿Seguro que quieres eliminar este consultorio?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
</form>