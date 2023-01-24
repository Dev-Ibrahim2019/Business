<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard1">
                    <h3>Content Information</h3>
                    <section>
                        <div class="form-group">
                            <x-form.input label="Title" type="text" name="title" id="title" :value="$blog->title" />
                        </div>

                        <div class="form-group">
                            <label for="name">Description</label>
                            <x-form.textarea name="desc" id="desc" :value="$blog->desc" />
                        </div>

                        <div class="form-group">
                            <x-form.label id="image">Blog Image</x-form.label>
                            <x-form.input type="file" name="image" id="image" accept="image/*" />
                            @if ($blog->image)
                                <img src="{{ $blog->image_url }}" alt="" width="100" height="100"
                                    class="m-3">
                            @endif
                        </div>
                    </section>
                    <h3>Auther Information</h3>
                    <section>
                        <div class="form-group">
                            <label for="name">Auther</label>
                            <x-form.input name="auther" id="auther" :value="$blog->auther" />
                        </div>
                        <div class="form-group">
                            <x-form.label class="w-50" id="image">Auther Image</x-form.label>
                            <x-form.input type="file" name="auther_image" id="auther_image" accept="image/*" />
                            @if ($blog->auther_image)
                                <img src="{{ $blog->auther_image }}" alt="" width="100" height="100"
                                    class="m-3">
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group mb-0 mt-3 justify-content-end">
    <div>
        <button type="submit" class="btn btn-primary">{{ $button_label ?? 'Save' }}</button>
    </div>
</div>
<!-- /row -->

@push('scripts')
    <script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

    <script src="{{ asset('assets/js/form-wizard.js') }}"></script>
@endpush
