@extends('layout.main')

@section('title')
    Home
@endsection



@section('content')
    <div>
        <label for="add-todo">Add Your Activities!</label>
    </div>
    <div class="mx-1 px-3 py-2 mb-3 btn btn-sm btn-primary text-center" data-toggle="modal" data-target="#ModalTambahData">
        Tambah Kegiatan</div>
    <div class="table-responsive">
        <table class="table rounded">
            <thead>


                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Terakhir Diubah</th>
                    <th scope="col">Tenggat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todolist as $item)
                    <tr class="">
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{!! nl2br($item->description) !!}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->end_at ?? 'Tidak ditentukan' }}</td>
                        <td>
                            <div>
                                <button class="open-modal-edit btn btn-sm btn-info text-white" value="{{ $item->id }}"
                                    data-target="#ModalEditData" style="button:active { outline: none; }">
                                    Edit
                                </button>
                                <button class="open-modal-delete btn btn-sm btn-danger text-white"
                                    style="button:active { outline: none; }" value="{{ $item->id }}">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- <!-- Modal Untuk Tambah Data --> --}}
    <div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="ModalTambahData"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTambahData">Tambah Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf


                        <div class="input-judul">
                            <div class="">
                                <label for="title">Judul</label>
                            </div>
                            <input class="form-control @error('title') is-invalid @else is-valid @enderror" type="text"
                                name="title" id="title" placeholder="Kegiatan Rumah">
                        </div>
                        <div class="input-keterangan">
                            <div class="">
                                <label for="description">Keterangan</label>
                            </div>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div class="input-tenggat">
                            <div class="">
                                <label for="end_at">Tenggat</label>
                            </div>
                            <input class="form-control" type="datetime-local" name="end_at" id="end_at"
                                placeholder="Kegiatan Rumah">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Kegiatan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END Modal Edit Data --}}


    <!-- Modal Untuk edit Data -->
    <div class="modal fade" id="ModalEditData" tabindex="-1" role="dialog" aria-labelledby="ModalEditDataTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="ModalEditDataTitle">Edit Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <form id="edit-form" method="POST">
                        @csrf
                        @method('PATCH')

                        <input type="number" name="id" id="id">
                        <div class="form-group">
                            <div class="">
                                <label for="">Judul</label>
                            </div>
                            <input class="form-control" type="text" name="title" id="edit-title"
                                placeholder="Kegiatan Rumah">
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Keterangan</label>
                            </div>
                            <textarea name="description" class="form-control" id="edit-description"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <label for="">Tenggat</label>
                            </div>
                            <input class="form-control" type="datetime-local" name="end_at" id="edit-end_at"
                                placeholder="Kegiatan Rumah">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Edit Kegiatan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- END Modal edit Data --}}


    {{-- Modal Hapus Data --}}
    <div class="modal fade" id="ModalHapusData" tabindex="-1" role="dialog" aria-labelledby="ModalHapusData"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalHapusDataTitle">Hapus Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="delete-form" method="POST">
                        @csrf
                        @method('Delete')
                        <div class="div">Apakah benar anda ingin menghapus data Berikut :</div>
                        <div class="div">
                            <div class="table-responsive">
                                <table
                                    class="table table-striped
                        table-hover
                        table-borderless
                        table-primary
                        align-middle">
                                    <thead class="table-light">
                                        <caption class="text-danger text-bold">Setelah dihapus kegiatan tidak akan bisa
                                            dikembalikan
                                        </caption>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Tenggat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">

                                        <td id="delete-title"></td>
                                        <td id="delete-description"></td>
                                        <td id="delete-end_at"></td>
                                        </td>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus Kegiatan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
