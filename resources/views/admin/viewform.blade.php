<form method="POST" action="{{ url('admin/kirimdataform') }}">
    @csrf
    Nama: <input type="input" name="nama"><br>
    Jabatan: <input type="input" name="jabatan"><br>
    <input type="submit" value="Kirim">
</form>

@if ( $errors->any() )
    tidak valid
@endif
