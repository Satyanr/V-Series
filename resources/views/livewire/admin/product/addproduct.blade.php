<div>
    <div class="row">
        <div class="col">
            <h5 class="modal-title" id="projectModalLabel">{{ $updateMode ? 'Edit Product' : 'Tambah Product' }}
            </h5>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form wire:submit.prevent="{{ $updateMode ? 'update' : 'storeProduct' }}">
                <div class="row">
                    <div class="col">
                        <div class="py-3">
                            <div class="row">
                                <div class="col">
                                    <input type="file" class="d-none" id="imageUpload" wire:model="image">
                                </div>
                                <div class="col">
                                    <label for="imageUpload" class="upload-box">Gambar</label>
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" class="preview-image">
                                    @else
                                    @endif
                                    </label>
                                </div>
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nama_product" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_product" wire:model="nama_product">
                            @error('nama_product')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe</label>
                            <input type="text" class="form-control" id="type" wire:model="type">
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-label">
                            Spesifikasi
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='pixel_pitch'>
                            <label for="floatingInputGrid">Pixel Pitch (mm)</label>
                            @error('pixel_pitch')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='panel_dimension'>
                            <label for="floatingInputGrid">Panel Dimensions (WxHxD)/(mm)</label>
                            @error('panel_dimension')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='panel_resolution'>
                            <label for="floatingInputGrid">Panel Resolution (pixel) </label>
                            @error('panel_resolution')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='module_dimension'>
                            <label for="floatingInputGrid">Module Dimensions (WxH)/(mm)</label>
                            @error('module_dimension')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='module_resolution'>
                            <label for="floatingInputGrid">Module Resolution (pixel)</label>
                            @error('module_resolution')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='brightness'>
                            <label for="floatingInputGrid">Brightness (nit) </label>
                            @error('brightness')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='refresh_rate'>
                            <label for="floatingInputGrid">Refresh Rate (Hz)</label>
                            @error('refresh_rate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='color_temperatur'>
                            <label for="floatingInputGrid">Color Temperature (K)</label>
                            @error('color_temperatur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='viewing_angle'>
                            <label for="floatingInputGrid">Viewing Angle (H/V) (°) </label>
                            @error('viewing_angle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='refresh_rate'>
                            <label for="floatingInputGrid">Power Consumption (Max./Avg.)(W/m²)</label>
                            @error('refresh_rate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='storage_temperature'>
                            <label for="floatingInputGrid">Storage Temperature (°C)</label>
                            @error('storage_temperature')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='operating_temperature'>
                            <label for="floatingInputGrid">Operating Temperature (°C) </label>
                            @error('operating_temperature')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='storage_humidity'>
                            <label for="floatingInputGrid">Storage Humidity (RH)</label>
                            @error('storage_humidity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='operating_humidity'>
                            <label for="floatingInputGrid">Operating Humidity (RH)</label>
                            @error('operating_humidity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" wire:model='ip_rating'>
                            <label for="floatingInputGrid">IP Rating (Front/Rear) </label>
                            @error('ip_rating')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary" wire:click="cancel">Batal</button>
                    <button type="submit" class="btn btn-primary">{{ $updateMode ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
