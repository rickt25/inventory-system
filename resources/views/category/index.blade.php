<x-app-layout>
  <x-header-title title="Category">
    <div class="col-lg-6 col-5 text-right">
      <a class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#createCategoryModal">Add New Category</a>
    </div>
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
            <table class="table w-100 align-items-center" id="tableCategory">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="index">No</th>
                <th scope="col" class="sort" data-sort="nama">Nama</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="list">
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <x-slot name="script">

  </x-slot>
</x-app-layout>