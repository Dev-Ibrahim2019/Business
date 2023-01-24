<div class="form-group">
    <x-form.input label="Service" type="text" name="name" id="name" :value="$service->name" />
</div>

<div class="form-group">
    <label for="name">Description</label>
    <x-form.textarea name="desc" id="desc" :value="$service->desc" />
</div>
<div class="form-group mb-0 mt-3 justify-content-end">
    <div>
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
    </div>
</div>
