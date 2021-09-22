<div>
    <x-top-navigation>
      <input class="form-control" wire:model.debounce.500ms="search" placeholder="Search" type="text" id="searchBar">
    </x-top-navigation>
  
    <x-header-title title="Create Product"/>
  
    <!-- CONTENT -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Products List</h3>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <div>
                    <label class="form-control-label" for="">Nama Produk</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-row mt-2 mb-0">
                    <div class="col-md-10">
                      <label class="form-control-label" for="">Brand Produk</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <label class="form-control-label" for="">Stock</label>
                      <input type="number" class="form-control">
                    </div>
                  </div>
                  <div class="textarea-wrapper mt-2">
                    <label class="form-control-label" for="">Deskripsi Produk</label>
                    <textarea class="form-control" aria-label="Deskripsi Produk" rows="3"></textarea>
                  </div>

                  <div class="row mt-3">
                    <div class="col-6">
                      <div class="d-flex justify-content-between my-2 px-1">
                        <h4>Variant</h4>
                        <button class="btn btn-info btn-sm" title="Add variant">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="line-clamp">lorem10</td>
                            <td class="wrap-column px-1">
                              <button class="btn btn-sm btn-success mr-0" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                              <button button class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button></span> </li>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                    <div class="col-6">
                      <div class="d-flex justify-content-between my-2 px-1">
                        <h4>Harga</h4>
                        <button class="btn btn-info btn-sm" title="Add variant">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>

                      <table class="table">
                        <thead>
                          <tr>
                            <th>Price</th>
                            <th>Unit</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="line-clamp">Rp. 5.900.000</td>
                            <td>1 / pcs</td>
                            <td class="wrap-column px-1">
                              <button class="btn btn-sm btn-success mr-0" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                              <button button class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button></span> </li>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-4 px-4">
                  <img class="img-thumbnail img-squared rounded" src="{{ asset('assets/img/default/product.png    ') }}" alt="">
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
    </div>
  </div>