<div>
  <x-top-navigation>
    <input class="form-control" wire:model.debounce.500ms="search" placeholder="Search" type="text" id="searchBar">
  </x-top-navigation>

  <x-header-title title="Category">
    <button class="btn btn-sm btn-neutral" wire:click="create" data-toggle="modal" data-target="#formModal">Add New Category</button>
  </x-header-title>

  <!-- CONTENT -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Categories List</h3>
          </div>
          <!-- Light table -->
          <div class="mb-2">
            <table class="table w-100 align-items-center" id="tableCategory" wire:loading.class.delay='text-gray'>
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="index">No</th>
                  <th scope="col" class="sort" data-sort="nama">Nama</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class="list">
                @forelse ($categories as $category)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <button class="dropdown-item" wire:click="edit({{ $category }})" data-toggle="modal" data-target="#formModal">Edit</button>
                          <button class="dropdown-item" wire:click="confirmDelete({{ $category }})" data-toggle="modal" data-target="#deleteModal">Delete</button>
                          {{-- <button class="dropdown-item" wire:click="delete({{ $category }})">Delete</button> --}}
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
          {{ $categories->links() }}
          
        </div>
      </div>
    </div>

    <x-modal :title="$form ? 'Edit Category Modal' : 'Add Category Modal'" id="formModal">
      <livewire:forms.category-form key='{{ now() }}' :category='$form' /> 
    </x-modal>
  
    <x-modal title="Delete Category" id="deleteModal">
      <div class="modal-body">
          Are you sure you want to delete this ?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" wire:click="delete()" data-dismiss="modal">Delete</button>
      </div>
    </x-modal>
    
  </div>
</div>