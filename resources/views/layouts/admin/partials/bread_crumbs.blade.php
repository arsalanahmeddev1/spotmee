<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="row mb-3">
                <div class="col-12">
                    @if (auth()->user()->hasRole(config('roles.host')))
                        {{-- @if ($company->is_profile_completed) --}}
                        <div class="alert alert-info" style="background:#1d1d1d; border-color:#0dcaf0; color:#fff;">
                            <i class="fa-solid fa-hourglass-half"></i>Your profile is currently under review. You’ll be
                            able to host gyms once approval is complete.
                        </div>
                        {{-- @elseif(!$company->is_active)
                            <div class="alert alert-danger"
                                style="background:#1d1d1d; border-color:#0dcaf0; color:#fff;"> <i
                                    class="fa-solid fa-hourglass-half"></i> Your profile Deactivated By Admin. Please
                                contact support to reactivate your profile. </div>
                        @endif --}}
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <h3>@yield('title', 'Dashboard')</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <a href="#"> <svg class="stroke-icon">
                                <use href="{{ asset('/assets/libs/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg></a> </li> {{-- @foreach ($breadcrumbs as $crumb) @if ($loop->last) <li class="breadcrumb-item active">{{ $crumb['page_title'] }}</li> @else <li class="breadcrumb-item"> <a href="{{ $crumb['url'] }}">{{ $crumb['page_title'] }}</a> </li> @endif @endforeach --}}
                </ol>
            </div>
        </div>
    </div>
</div>
