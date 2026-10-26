<form action="{{ route('cita.realizada', $cita->id) }}" method="POST"
    onsubmit="return confirm('¿Marcar esta consulta como realizada?')">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-success btn-sm">Realizada</button>
</form>