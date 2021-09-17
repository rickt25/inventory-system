<div>
    <form wire:submit.prevent="submit">
        <div class="modal-body">
            @csrf
            <div class="form-group">
            <label class="form-control-label" for="basic-url">Category Name</label>
            
            <input type="text" wire:model="category.name" class="form-control @error("category.name") is-invalid @enderror" placeholder="name" autofocus>
            @error('category.name') 
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="resetForm">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>