<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | AdminLTE 3</title>
  <!-- AdminLTE & Bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
  <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

  <style>
    /* ==== Select2 Single ==== */
    .select2-container .select2-selection--single {
      height: 38px;
      padding: 6px 12px;
      border: 1px solid #ced4da;
      border-radius: 6px;
      background-color: #fff;
      display: flex;
      align-items: center;
      font-size: 14px;
      box-shadow: none;
      transition: all 0.2s ease;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #495057;
      line-height: normal;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 36px;
      right: 8px;
    }

    .select2-container--default .select2-selection--single:hover {
      border-color: #80bdff;
    }

    .select2-container--default .select2-selection--single:focus {
      outline: none;
      border-color: #80bdff;
      box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }

    /* ==== Select2 Multiple (Tags) ==== */
    .select2-container--default .select2-selection--multiple {
  min-height: 38px; /* biar sama tinggi dengan input bootstrap */
  border: 1px solid #ced4da;
  border-radius: 6px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  padding: 4px 6px;
  font-size: 14px;
}
    /* Chip/tag style */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
  background-color: #007bff;
  border: none;
  color: #fff;
  border-radius: 20px;
  padding: 4px 10px;
  margin: 3px;
  font-size: 13px;
  display: flex;
  align-items: center;
}

    /* Tombol X */
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
      color: #fff;
      margin-right: 6px;
      font-weight: bold;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
      color: #ffdddd;
    }

    /* Highlight saat pilih dropdown */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
      background-color: #007bff;
      color: #fff;
    }
    
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  {{-- Sidebar --}}
  @include('layouts.sidebar') 

  {{-- Content --}}
  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

</div>

<!-- Scripts -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      width: '100%' // biar lebar penuh
    });
  });
</script>

@stack('scripts')
</body>
</html>
