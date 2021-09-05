<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">{{ $title }}</h6>
        </div>
        @isset($route)
        <div class="col-lg-6 col-5 text-right">
          <a href="{{ route($route . '.create') }}" class="btn btn-sm btn-neutral">Tambah data</a>
        </div>
        @endisset
      </div>

      {{ $slot }}
    </div>
  </div>
</div>