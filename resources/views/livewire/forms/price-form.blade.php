<div>
  <div class="d-flex justify-content-between my-2 px-1">
    <h4>Prices</h4>
    <button class="btn btn-info btn-sm" wire:click="showCreateForm" title="Add Price">
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
      @forelse($prices as $price)
        @if($editMode == $loop->index)
          <tr>
            <td class="pr-0">
              <div class="form-group">
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <span class="input-group-text text-xs">Rp.</span>
                  </div>
                  <input type="text" wire:model='editPrice.price' class="form-control form-control-sm rupiah">
                </div>
              </div>
            </td>
            <td>
              <div class="input-group input-group-sm">
                <input class="form-control form-control-sm" wire:model="editPrice.per_qty" min="1" type="number" placeholder="Qty">
                <div class="input-group-append">
                  <select class="btn btn-outline-primary dropdown-toggle btn-sm" wire:model='editPrice.unit_id'>
                    @foreach ($units as $unit)
                      <option value="{{ $unit->id }}">/ {{ $unit->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </td>
            <td class="wrap-column px-1">
              <button type="submit" class="btn btn-primary btn-sm mr-0" wire:click="editPrice({{ $loop->index }})">
                <i class="fas fa-check"></i>
              </button>
              <button type="button" class="btn btn-danger btn-sm" wire:click.stop="resetModes">
                <i class="fas fa-times"></i>
              </button>
            </td>
          </tr>
        @else
          <tr wire:key="{{ $loop->index }}">
            <td class="line-clamp">Rp. {{ $price['price'] ?? "null value" }}</td>
            <td>{{ $price['per_qty'] }} / {{ $price['unit'] }}</td>
            <td class="wrap-column px-1">
              <button class="btn btn-sm btn-success mr-0" title="Edit" wire:click="showEditForm({{ $loop->index }})"><i class="fas fa-pencil-alt"></i></button>
              <button button class="btn btn-sm btn-danger" title="Delete" wire:click="deleteVariant({{ $loop->index }})"><i class="fas fa-trash"></i></button></span> </li>
            </td>
          </tr>
        @endif
      @empty
        @if(!$createMode)
          <tr>
            <td class="text-center" colspan="3">No Prices</td>
          </tr>
        @endif
      @endforelse
      @if($createMode)
        <tr>
          <td class="pr-0">
            <div class="form-group">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text text-xs">Rp.</span>
                </div>
                <input type="text" wire:model='newPrice.price' class="form-control form-control-sm rupiah">
              </div>
            </div>
          </td>
          <td>
            <div class="input-group input-group-sm">
              <input class="form-control form-control-sm" wire:model="newPrice.per_qty" min="1" type="number" placeholder="Qty">
              <div class="input-group-append">
                <select class="btn btn-outline-primary dropdown-toggle btn-sm" wire:model='newPrice.unit_id'>
                  @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">/ {{ $unit->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </td>
          <td class="wrap-column px-1">
            <button type="submit" class="btn btn-primary btn-sm mr-0" wire:click="addPrice">
              <i class="fas fa-check"></i>
            </button>
            <button type="button" class="btn btn-danger btn-sm" wire:click="resetModes">
              <i class="fas fa-times"></i>
            </button>
          </td>
        </tr>
      @endif
    </tbody>
  </table>
  

  <script>
    
  </script>
</div>