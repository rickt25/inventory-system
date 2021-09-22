<div>
    <x-top-navigation>
      <input class="form-control" wire:model.debounce.500ms="search" placeholder="Search" type="text" id="searchBar">
    </x-top-navigation>
  
    <x-header-title title="Create Product">
      <a href="{{ route('product') }}" class="btn btn-sm btn-default">
        <i class="fas fa-angle-double-left"></i>
        Back
      </a>
    </x-header-title>
  
    <!-- CONTENT -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="mb-0">Products List</h3>
                <button wire:click="submit" class="btn btn-md btn-primary py-1">
                  <i class="fas fa-save"></i>
                  Save
                </button>
              </div>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-8">
                  <div>
                    <label class="form-control-label" for="">Product Name</label>
                    <input type="text" class="form-control @error("product.name") is-invalid @enderror" wire:model='product.name'>
                    @error('product.name') 
                      <span class="invalid-feedback">
                          {{ $message }}
                      </span>
                    @enderror
                  </div>
                  <div class="form-row mt-2 mb-0">
                    <div class="col-md-6">
                      <label class="form-control-label" for="">Category</label>
                      <select type="text" class="form-control @error("product.category_id") is-invalid @enderror" wire:model='product.category_id'> 
                        <option value="">-- Category --</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                      @error('product.category_id') 
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>

                    <div class="col-md-4">
                      <label class="form-control-label" for="">Brand</label>
                      <select type="text" class="form-control @error("product.brand_id") is-invalid @enderror" wire:model='product.brand_id'> 
                        <option value="">-- Brand --</option>
                        @foreach($brands as $brand)
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                      </select>
                      @error('product.brand_id') 
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                    
                    <div class="col-md-2">
                      <label class="form-control-label" for="">Stock</label>
                      <input type="number" class="form-control @error("product.stock") is-invalid @enderror" min="0" value="0" wire:model='product.stock'>
                      @error('product.stock') 
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="textarea-wrapper mt-2">
                    <label class="form-control-label" for="">Product Description</label>
                    <textarea class="form-control @error("product.description") is-invalid @enderror" wire:model='product.description' aria-label="Deskripsi Produk" rows="3"></textarea>
                    @error('product.description') 
                      <span class="invalid-feedback">
                          {{ $message }}
                      </span>
                    @enderror
                  </div>

                  <div class="row mt-3">
                    <div class="col-6">
                      <div class="d-flex justify-content-between my-2 px-1">
                        <h4>Variants</h4>
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
                        <h4>Prices</h4>
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
                <div class="col-4">
                  <img class="float-right img-thumbnail img-squared rounded" src="{{ asset('assets/img/default/product.png') }}" alt="">
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
    </div>
  </div>