<div>
    <x-top-navigation>
      <input class="form-control" wire:model.debounce.500ms="search" placeholder="Search" type="text" id="searchBar">
    </x-top-navigation>
  
    <x-header-title title="Product">
      <a href="{{ route('product.create') }}" class="btn btn-sm btn-neutral" >Add New Product</a>
    </x-header-title>
  
    <!-- CONTENT -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Products List</h3>
            </div>
            <!-- Light table -->
            <div class="mb-2">
              <table class="table table-hover w-100 align-items-center" id="tableCategory" wire:loading.class.delay='text-gray'>
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="index">No</th>
                    <th scope="col" class="sort" data-sort="nama">Nama</th>
                    <th scope="col" class="sort" data-sort="brand">Brand</th>
                    <th scope="col" class="sort" data-sort="kategori">Kategori</th>
                    <th scope="col" class="sort" data-sort="stock">Stock</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="list">
                  @forelse ($products as $product)
                    <tr>
                      <td>{{ $loop->iteration + $paginateCount * ($page - 1) }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->brand->name ?? "-" }}</td>
                      <td>{{ $product->category->name ?? "-" }}</td>
                      <td>
                        {{ $product->stock }}
                        <i class="fas fa-pencil-alt edit-icon ml-2"></i>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <button class="dropdown-item" wire:click="edit({{ $product }})" data-toggle="modal" data-target="#formModal">Edit</button>
                            <button class="dropdown-item" wire:click="confirmDelete({{ $product }})" data-toggle="modal" data-target="#deleteModal">Delete</button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3" class="text-center">No data</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            
            <!-- Card footer -->
            {{ $products->links() }}
            
          </div>
        </div>
      </div>
      
    </div>
  </div>