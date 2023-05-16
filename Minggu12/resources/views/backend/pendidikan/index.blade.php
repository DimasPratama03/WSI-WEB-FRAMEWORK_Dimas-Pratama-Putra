@extends('backend/layouts.template')
@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                Tambah Pendidikan
                            </button>
                        </li>
                    </ul>
                    
                    <!-- Show success or error message after form submission -->
                    @if(session('success'))
                    <br>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{-- modal tambah --}}
                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pendidikan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="pendidikan_form" method="POST"
                                    action="{{ route('pendidikan.store') }}">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group mb-3">
                                            <label for="nama">Nama </label>
                                            <input type="text" class="form-control" name="nama" id="nama" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tingkatan">Tingkatan</label>
                                            <select class="form-select" aria-label="Default select example" name="tingkatan" id="tingkatan" required>
                                                <option value="1">TK</option>
                                                <option value="2">SD</option>
                                                <option value="3">SMP</option>
                                                <option value="4">SMA/SMK</option>
                                                <option value="5">D3</option>
                                                <option value="6">D4/S1</option>
                                                <option value="7">S2</option>
                                                <option value="8">S3</option>
                                              </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tahun_masuk">Tahun Masuk</label>
                                            <input type="number" class="form-control" name="tahun_masuk"
                                                id="tahun_masuk" min="1900" max="{{ date('Y') }}" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tahun_keluar">Tahun Keluar</label>
                                            <input type="number" class="form-control" name="tahun_keluar"
                                                id="tahun_keluar" min="1900" max="{{ date('Y') }}" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <h5 class="card-title">Pendidikan</h5>
                {{-- data Pendidikan --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama </th>
                                <th>Tingkatan</th>
                                <th>Tahun Masuk</th>
                                <th>Tahun Keluar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendidikan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @if ($item->tingkatan==1)
                                        Tk
                                    @elseif ($item->tingkatan==2)
                                        SD
                                    @elseif ($item->tingkatan==3)
                                        SMP
                                    @elseif ($item->tingkatan==4)
                                        SMA/SMK
                                    @elseif ($item->tingkatan==5)
                                        D3
                                    @elseif ($item->tingkatan==6)
                                        D4/S1
                                    @elseif ($item->tingkatan==7)
                                        S2
                                    @elseif ($item->tingkatan==8)
                                        S3
                                    @endif
                                </td>
                                <td>{{ $item->tahun_masuk }}</td>
                                <td>{{ $item->tahun_keluar }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- // modal edit --}}
                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Pendidikan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form id="edit_pendidikan_form" method="POST"
                                            action="{{ route('pendidikan.update', $item->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">

                                                <div class="form-group mb-3">
                                                    <label for="nama">Nama Perusahaan</label>
                                                    <input type="text" class="form-control" name="nama" id="nama"
                                                        value="{{ $item->nama }}" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="jabatan">Tingkatan</label>
                                                    <select class="form-select" aria-label="Default select example" name="tingkatan" id="tingkatan" required>
                                                        <option value="1"{{ (isset($item) && $item->tingkatan == 1) ? 'selected' : '' }}>TK</option>
                                                        <option value="2"{{ (isset($item) && $item->tingkatan == 2) ? 'selected' : '' }}>SD</option>
                                                        <option value="3"{{ (isset($item) && $item->tingkatan == 3) ? 'selected' : '' }}>SMP</option>
                                                        <option value="4"{{ (isset($item) && $item->tingkatan == 4) ? 'selected' : '' }}>SMA/SMK</option>
                                                        <option value="5"{{ (isset($item) && $item->tingkatan == 5) ? 'selected' : '' }}>D3</option>
                                                        <option value="6"{{ (isset($item) && $item->tingkatan == 6) ? 'selected' : '' }}>D4/S1</option>
                                                        <option value="7"{{ (isset($item) && $item->tingkatan == 7) ? 'selected' : '' }}>S2</option>
                                                        <option value="8"{{ (isset($item) && $item->tingkatan == 8) ? 'selected' : '' }}>S3</option>
                                                      </select>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="tahun_masuk">Tahun Masuk</label>
                                                    <input type="number" class="form-control" name="tahun_masuk"
                                                        id="tahun_masuk" min="1900" max="{{ date('Y') }}"
                                                        value="{{ $item->tahun_masuk }}" required>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="tahun_keluar">Tahun Keluar</label>
                                                    <input type="number" class="form-control" name="tahun_keluar"
                                                        id="tahun_keluar" min="1900" max="{{ date('Y') }}"
                                                        value="{{ $item->tahun_keluar }}" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @endsection
    <section class="section dashboard">
        <div class="row">
            <div class="card">

            </div>
        </div>
    </section>


</main>

@section('scripts')
<script>
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='pendidikan_form']").validate({
        // Specify validation rules
        rules: {
            nama: "required",
            jabatan: "required",
            tahun_masuk: {
                required: true,
                digits: true,
                min: 1900,
                max: parseInt(new Date().getFullYear())
            },
            tahun_keluar: {
                required: true,
                digits: true,
                min: 1900,
                max: parseInt(new Date().getFullYear())
            }
        },

        // Specify validation error messages
        messages: {
            nama: "Mohon isi nama perusahaan",
            jabatan: "Mohon isi jabatan",
            tahun_masuk: {
                required: "Mohon isi tahun masuk",
                digits: "Mohon isi tahun dengan angka",
                min: "Tahun masuk tidak valid",
                max: "Tahun masuk tidak valid"
            },
            tahun_keluar: {
                required: "Mohon isi tahun keluar",
                digits: "Mohon isi tahun dengan angka",
                min: "Tahun keluar tidak valid",
                max: "Tahun keluar tidak valid"
            }
        },

        // Specify submit handler
        submitHandler: function (form) {
            // Submit the form via Ajax
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function (response) {
                    // Show success message
                    $('#pendidikan_form')[0].reset();
                    $('.alert-success').fadeIn().html(response.message);
                },
                error: function (xhr) {
                    // Show error message
                    var errors = xhr.responseJSON.errors;
                    var errorString = '';
                    $.each(errors, function (key, value) {
                        errorString += '<li>' + value + '</li>';
                    });
                    $('.alert-danger').fadeIn().html(errorString);
                }
            });
        }
    });
</script>
@endsection