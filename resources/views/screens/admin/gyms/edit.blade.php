@section('title', 'Edit Gym')
@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <form class="card" id="editGymForm" action="#" method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
                <div class="card-options">
                    <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i
                            class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#"
                        data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row custom-input">
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name">Gym Name <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                type="text" placeholder="e.g. The Strength Studio" name="name" value="{{ $gym->name ?? '' }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" id="phone"
                                type="text" placeholder="e.g. +1 234 567 890" name="phone" value="{{ $gym->phone ?? '' }}" />
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="price">Price (per session) <span class="text-danger">*</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" id="price"
                                type="number" step="0.01" placeholder="e.g. 18.00" name="price" value="{{ $gym->price ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="category">Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" id="category">
                                <option value="">Select Category</option>
                                <option value="garage_gym" {{ (isset($gym->category) && $gym->category == 'garage_gym') ? 'selected' : '' }}>Garage Gym</option>
                                <option value="fitness_room" {{ (isset($gym->category) && $gym->category == 'fitness_room') ? 'selected' : '' }}>Modern Fitness Room</option>
                                <option value="yoga_studio" {{ (isset($gym->category) && $gym->category == 'yoga_studio') ? 'selected' : '' }}>Yoga Studio</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <h6 class="my-3">Location Details</h6>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="street">Street Address <span class="text-danger">*</span></label>
                            <input class="form-control" id="street" type="text" placeholder="e.g. 123 Main St" name="street_address" value="{{ $gym->street_address ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="city">City <span class="text-danger">*</span></label>
                            <input class="form-control" id="city" type="text" placeholder="e.g. Dallas" name="city" value="{{ $gym->city ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="state">State <span class="text-danger">*</span></label>
                            <input class="form-control" id="state" type="text" placeholder="e.g. TX" name="state" value="{{ $gym->state ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="zip">Zip Code</label>
                            <input class="form-control" id="zip" type="text" placeholder="e.g. 75001" name="zip_code" value="{{ $gym->zip_code ?? '' }}" />
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="image">Gym Image</label>
                            <input class="form-control" id="image" type="file" name="image" />
                            @if(isset($gym->image))
                                <div class="mt-2">
                                    <img src="{{ asset($gym->image) }}" alt="Current Image" width="100">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
<script>
    // Placeholder for update ajax if needed
    // ajaxUpdate('#editGymForm', "{{-- route('gyms.index') --}}");
</script>
@endpush
@endsection
