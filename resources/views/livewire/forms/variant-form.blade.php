<div>
  <div class="d-flex justify-content-between my-2 px-1">
    <h4>Variants</h4>
    <button class="btn btn-info btn-sm" wire:click="showCreateForm" title="Add variant">
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
      @forelse($variants as $variant)
        @if($editMode == $loop->index)
          <tr>
            <td>
              <input class="form-control form-control-sm" wire:model="editVariant" type="text" placeholder="Name">
            </td>
            <td class="wrap-column px-1">
              <button type="submit" class="btn btn-primary btn-sm mr-0" wire:click="editVariant({{ $loop->index }})">
                <i class="fas fa-check"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm" wire:click.stop="resetModes">
                <i class="fas fa-times"></i>
              </button>
            </td>
          </tr>
        @else
          <tr wire:key="{{ $loop->index }}">
            <td class="line-clamp">{{ $variant['name'] ?? "null value" }}</td>
            <td class="wrap-column px-1">
              <button class="btn btn-sm btn-success mr-0" title="Edit" wire:click="showEditForm({{ $loop->index }})"><i class="fas fa-pencil-alt"></i></button>
              <button button class="btn btn-sm btn-danger" title="Delete" wire:click="deleteVariant({{ $loop->index }})"><i class="fas fa-trash"></i></button></span> </li>
            </td>
          </tr>
        @endif
      @empty
        @if(!$createMode)
          <tr>
            <td class="text-center" colspan="2">No Variants</td>
          </tr>
        @endif
      @endforelse

      @if($createMode)
        <div>
          <tr>
            <td>
              <input class="form-control form-control-sm" wire:model="newVariant" type="text" placeholder="Name">
            </td>
              <td>
                <button type="submit" class="btn btn-primary btn-sm mr-0" wire:click="addVariant">
                  <i class="fas fa-check"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm" wire:click="resetModes">
                  <i class="fas fa-times"></i>
                </button>
              </td>
          </tr>
        </div>
      @endif
    </tbody>
  </table>
</div>