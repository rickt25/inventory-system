<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">{{ $title }}</h6>
        </div>
        @isset($modal)
        <div class="col-lg-6 col-5 text-right">
          <a class="btn btn-sm btn-neutral"  data-toggle="modal" data-target="#{{ $modal }}">Add new {{ $title }}</a>
        </div>
        @endisset
      </div>
    </div>
  </div>
</div>