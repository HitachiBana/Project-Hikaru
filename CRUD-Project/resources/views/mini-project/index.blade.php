@extends('layout.template')
@section('konten')
<!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                        <form class="d-flex" action="{{ url('project') }}" method="get">
                            <label class="col-sm-2"><h3>FILTER</h3></label>
                            <input style="width:300px" class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                            <button class="btn btn-secondary mx-2" type="submit">Search</button>
                            <a href="{{ url('project') }}" class="btn btn-secondary mx-2">Clear</a>
                        </form>
                </div>

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">

                    <a href='{{ url('project/create') }}' class="btn btn-primary">New</a>

                    <button id="delete-checkbox" name="delete-checkbox" class="btn btn-danger">Delete</a>

                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="col-md-0,5">Pilih</th>
                            <th class="col-md-1">Action</th>
                            <th class="col-md-2,5">Project Name</th>
                            <th class="col-md-2">Client</th>
                            <th class="col-md-2,5">Project Start</th>
                            <th class="col-md-2,5">Project End</th>
                            <th class="col-md-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <input type="checkbox" name="item_ids[]" value="{{ $item->project_id }}" style="width: 30px; height:30px;">
                            </td>
                            <td>
                                <a href="{{ url('project/'.$item->project_id."/edit") }}" class="btn btn-success btn-sm"><u>Edit</u></a>
                            </td>
                            <td>{{ $item->project_name }}</td>
                            <td>{{ $item->client_name }}</td>
                            <td><?php echo date('d M Y', strtotime($item->project_start)) ?></td>
                            <td><?php echo date('d M Y', strtotime($item->project_end )) ?></td>
                            <td>{{ $item->project_status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.getElementById('delete-checkbox');

        deleteButton.addEventListener('click', function() {
            const selectedCheckboxes = document.querySelectorAll('input[name="item_ids[]"]:checked');
            const selectedIds = Array.from(selectedCheckboxes).map(checkbox => checkbox.value);

            if (selectedIds.length === 0) {
                Swal.fire('Peringatan', 'Pilih setidaknya satu item untuk dihapus', 'warning');
                return;
            }

            Swal.fire({
                title: 'Hapus Item Terpilih?',
                text: 'Apakah Anda yakin ingin menghapus item yang dipilih?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan pemanggilan Ajax ke rute delete dengan data selectedIds
                    axios.delete(`/delete`, {
                        data: { item_ids: selectedIds }
                    })
                    .then(response => {
                        Swal.fire('Sukses', 'Item terpilih berhasil dihapus', 'success');
                        // Refresh halaman setelah penghapusan
                        location.reload();
                    })
                    .catch(error => {
                        Swal.fire('Error', 'Terjadi kesalahan', 'error');
                    });
                }
            });
        });
    });
</script>
        <!-- AKHIR DATA -->

@endsection
