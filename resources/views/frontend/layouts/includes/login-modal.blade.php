@php
    $districts = App\Models\District::get(['id', 'name', 'bn_name']);
@endphp
<div class="modal login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="loginModalLabel">{{__('global.signIn')}}/{{__('global.register')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active " id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                            aria-controls="login" aria-selected="false"> <span>{{__('global.signIn')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab"
                            aria-controls="register" aria-selected="true"><span>{{__('global.register')}}</span></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('loginProcess') }}" class="row my-4 align-items-center">
                            @csrf
                            <div class="mb-3 col-sm-12">
                                <input class="form-control" type="email" name="email" required
                                    placeholder="@lang('login_register.email')">
                            </div>
                            <div class="mb-3 col-sm-12">
                                <input class="form-control" type="password" name="password" required
                                    placeholder="@lang('login_register.passwordOnly')">
                            </div>
                            <div class="col-sm-6 d-grid">
                                <button type="submit" class="btn btn-primary">@lang('global.login')</button>
                            </div>
                            <div class="col-sm-6 d-grid ">
                                <a href="{{ route('forgetPassword') }}"
                                    style="text-align: right !important">@lang('global.forgetPass')</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form class="row my-4 align-items-center" method="post" action="{{ route('registerStore') }}">
                            @csrf
                            <div class="mb-3 col-sm-12">
                                <input type="text" name="name" class="form-control"
                                    placeholder="{{ __('login_register.name') }} *" required>
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12">
                                <select name="gender" class="form-control" required>
                                    <option value="">{{ __('login_register.gender') }} *</option>
                                    <option value="1">{{ __('login_register.male') }} </option>
                                    <option value="2">{{ __('login_register.female') }} </option>
                                    <option value="3">{{ __('login_register.other') }} </option>
                                </select>
                                @if ($errors->has('gender'))
                                    <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12">
                                <input type="email" name="email" class="form-control"
                                    placeholder="{{ __('login_register.email') }}  *" required>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12 district_id">
                                <select name="district_id" class="form-control single-select2" required>
                                    <option value="">{{ __('login_register.district') }} *</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">
                                            {{ config('app.locale') == 'en' ? $district->name : $district->bn_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('district_id'))
                                    <div class="alert alert-danger">{{ $errors->first('district_id') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12">
                                <input type="Password" name="password" class="form-control"
                                    placeholder="{{ __('login_register.password') }}  *" required>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="mb-3 col-sm-12">
                                <input type="Password" name="password_confirmation" class="form-control"
                                    placeholder="{{ __('login_register.rePassword') }}  *" required>
                                @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12 d-grid">
                                <button type="submit" class="btn btn-primary">{{ __('login_register.registerBtn') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
