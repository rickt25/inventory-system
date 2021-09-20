<x-app-layout>
  <x-header-title title="Category" modal="categoryModal"/>

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

  <x-modal title="Add Category" id="categoryModal">
    <form id="categoryForm" action="{{ route('category.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label class="form-control-label" for="basic-url">Category Name</label>
        <input type="text" class="form-control" placeholder="name">
      </div>

      <div class="text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </x-modal>

  <x-slot name="script">
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/dataRender/ellipsis.js"></script>
    <script src="{{ asset('js/components/datatable/custom.js') }}"></script>
    <script>
      $(() => {
        var datatable = $("#tableCategory").DataTable({
          processing: true,
          serverSide: true,
          lengthChange: false,
          searchable: false,
          bFilter: true,
          pageLength: 8,
          ajax: '{!! url()->current() !!}',
          order: [[ 1, "desc" ]],
          columns: [
              {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                width: '1%',
                orderable: false,
                searchable: false
              },
              { 
                data: 'name', 
                name: 'name' 
              },
              { 
                data: 'action', 
                name: 'action',
                width: '1%',
                orderable: false,
                searchable: false
              }
          ],
          drawCallback: function(settings){
            customSettings(datatable);
          }
        });
      });

    </script>
  </x-slot>
</x-app-layout>