<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload file laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="container">
            <h2 class="text-center my-5">Upload File Dengan Laravel</h2>
            <div class="col-lg-8 mx-auto my-5">
                {{-- Peringatan Jika Error --}}
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error) {{ $error }} <br />
                    @endforeach
                </div>
                @endif


                {{-- Pesan Jika Success --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible"> <a href="#" class="close text-decoration-none"
                        data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
                </div>
                @endif
                {{-- Peringatan Jika Error --}} @if (session('error'))
                <div class="alert alert-danger alert-dismissible"> <a href="#" class="close text-decoration-none"
                        data-dismiss="alert" aria-label="close">&times;</a> {{ session('error') }}
                </div>
                @endif
                <form action="{{ route('upload.resize') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <b>File Gambar</b><br />
                        <input type="file" name="file">
                    </div>
                    <div class="form-group">
                        <b>Keterangan</b>
                        <textarea class="form-control" name="keterangan">
                        </textarea>
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>

</html>