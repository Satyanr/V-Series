<div>
    <div class="row">
        <div class="col">
            <h5 class="modal-title" id="projectModalLabel">{{ $updateMode ? 'Edit Proyek' : 'Tambah Proyek' }}
            </h5>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}">
                <div class="py-3">
                    <div class="row">
                        <div class="col">
                            <input type="file" class="d-none" id="imageUpload" wire:model="image">
                        </div>
                        <div class="col">
                            <label for="imageUpload" class="upload-box">Gambar</label>
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" class="preview-image">
                            @elseif ($imageedit)
                                <img src="{{ asset('storage/' . $imageedit) }}" class="preview-image">
                            @else
                            @endif
                            </label>
                        </div>
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-3">
                    <label class="form-label">Nama Proyek</label>
                    <input type="text"
                        class="form-control @error('title') is-invalid
                        
                    @enderror"
                        wire:model="title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid
                        
                    @enderror"
                        wire:model="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-3">
                    <label class="form-label">Klien</label>
                    <input type="text"
                        class="form-control @error('client') is-invalid
                        
                    @enderror"
                        wire:model="client">
                    @error('client')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary" wire:click="cancel">Batal</button>
                    <button type="submit" class="btn btn-primary">{{ $updateMode ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
