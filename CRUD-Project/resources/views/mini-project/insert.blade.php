@extends('layout.template')
@section('konten')
<!-- START FORM -->
    <form action='{{ url('project') }}' method='post'>
    @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('project') }}" class="btn btn-secondary">< Kembali</a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='p_name' value="{{ Session::get('p_name') }}" id="p_name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Client</label>
                <div class="col-sm-10">
                    <select class="form-control" name="client" id="client">
                            <option value="">---</option>
                            @foreach ($data2 as $client)
                            <option value="{{ $client->client_id }}">{{ $client->client_name }}</option>
                            @endforeach
                        </select>
                    {{-- <input type="text" class="form-control" name='client' id="client" required> --}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Project Start</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='p_start' value="{{ Session::get('p_start') }}" id="p_start">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Project End</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='p_end' value="{{ Session::get('p_end') }}" id="p_end">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name='status' id="satus">
                        <option value="">---</option>
                        <option value="OPEN">OPEN</option>
                        <option value="DOING">DOING</option>
                        <option value="DONE">DONE</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->

@endsection
