<div>
  <div class="d-flex justify-content-between my-2 px-1">
    <h4>Variants</h4>
    <button class="btn btn-info btn-sm" wire:click="$set('createMode', true)" title="Add variant">
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
      <tr wire:key="{{ $loop->index }}">
        <td class="line-clamp">{{ $variant['name'] ?? "null value" }}</td>
        <td class="wrap-column px-1">
          <button class="btn btn-sm btn-success mr-0" title="Edit"><i class="fas fa-pencil-alt"></i></button>
          <button button class="btn btn-sm btn-danger" title="Delete" wire:click="deleteVariant({{ $loop->index }})"><i class="fas fa-trash"></i></button></span> </li>
        </td>
      </tr>
      @empty
        @if(!$createMode)
          <tr>
            <td class="text-center" colspan="2">No Variants</td>
          </tr>
        @endif
      @endforelse
      @if($createMode)
        <tr>
          <td>
            <input class="form-control form-control-sm" wire:model="newVariant" type="text" placeholder="Name">
          </td>
          <td class="wrap-column px-1">
            <button class="btn btn-primary btn-sm mr-0" wire:click="addVariant">
              <i class="fas fa-check"></i>
            </button>
            <button class="btn btn-danger btn-sm" wire:click="$set('createMode', false)">
              <i class="fas fa-times"></i>
            </button>
          </td>
        </tr>
      @endif
    </tbody>
  </table>
  <button class="btn btn-primary" wire:click="ddbutton">DD button</button>
</div>