<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reqeust dengan input laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="/formulir/proses" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" name="nama"
                        placeholder="Nama Lengkap" value="{{ old('nama') }}">
                    @if ($errors->has('nama'))
                    <span class="text-danger small">
                        <p>{{ $errors->first('nama') }}</p>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" name="alamat"
                        placeholder="Alamat Lengkap" value="{{ old('alamat') }}">
                    @if ($errors->has('alamat'))
                    <span class="text-danger small">
                        <p>{{ $errors->first('alamat') }}</p>
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>