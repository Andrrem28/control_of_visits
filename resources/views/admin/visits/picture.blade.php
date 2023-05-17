@section('title', 'Captura de foto')

@section('content')
<!-- Card with header and footer -->
<div class="card">

    <div class="card-header">
        <div class="card-title">Caputar foto</div>
        <span>Posicione a camera corretamente para realizar a captura</span>
    </div>
    <div class="card-body">
        <div class="py-1">
            <button id="capture" class="btn btn-info btn-sm"> <i class="fa fa-camera"></i> Capturar foto</button>
        <div class="py-1">
            <video autoplay></video>
        </div>
        </div>
    </div>
    <div class="card-footer">
        <canvas></canvas>
    </div>
  </div><!-- End Card with header and footer -->
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'Controle de entrada')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Notify Package -->
    @notifyCss

    <!-- Favicons -->
    <link href="{{ asset('NiceAdmin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('NiceAdmin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">

    <!-- Fontwaserome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <main id="main" class="main">
        <!-- End Page Title -->
        <div class="card">

            <div class="card-header">
                <div class="card-title">Caputar foto</div>
                <span>Posicione a camera corretamente para realizar a captura</span>
            </div>
            <div class="card-body">
                <div class="py-1">
                    <button id="capture" class="btn btn-info btn-sm"> <i class="fa fa-camera"></i> Capturar foto</button>
                <div class="py-1">
                    <video autoplay></video>
                </div>
                </div>
            </div>
            <div class="card-body">
                <canvas></canvas>
            </div>
          </div>
    </main><!-- End #main -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        var video = document.querySelector('video');

        navigator.mediaDevices.getUserMedia({video:true})
        .then(stream => {
            video.srcObject = stream;
            video.play();
        })
        .catch(error => {
            console.log(error);
        })

        document.querySelector('#capture').addEventListener('click', () => {

            var canvas = document.querySelector('canvas');
                canvas.height = video.videoHeight;
                canvas.width = video.videoWidth;

            var context = canvas.getContext('2d');
                context.drawImage(video, 0, 0);

            var link = document.createElement('a');
                link.setAttribute('id', 'take-photo');
                link.setAttribute('class', 'btn btn-primary btn-lg mb-5');
                link.style.width = '150px';
                link.download = 'photo-visitor.png';
                link.href = canvas.toDataURL();
                link.textContent = 'Salvar';

                document.body.appendChild(link);
        });
    </script>
    <!-- Template Main JS File -->
    <script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>
</body>

</html>


