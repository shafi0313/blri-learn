@php
    $districts = App\Models\District::get(['id', 'name', 'bn_name']);
@endphp
<div class="modal login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="loginModalLabel">Log in & Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab"
                            aria-controls="login" aria-selected="false"> <span> Log in</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab"
                            aria-controls="register" aria-selected="true"><span>Register</span></a>
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
                        {{-- <div class="login-social-media border ps-4 pe-4 pb-4 pt-0 rounded-sm">
                            <div class="mb-4 d-block text-center"><b class="bg-white ps-2 pe-2 mt-3 d-block">Login or
                                    Sign in with</b></div>
                            <form class="row">
                                <div class="col-sm-6">
                                    <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                class="fab fa-facebook-f me-2"></i>Login with Facebook</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                class="fab fa-twitter me-2"></i>Login with Twitter</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn instagram-bg social-bg-hover d-block mb-3 mb-sm-0"
                                        href="#"><span><i class="fab fa-instagram me-2"></i>Login with
                                            Instagram</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i
                                                class="fab fa-linkedin-in me-2"></i>Login with Linkedin</span></a>
                                </div>
                            </form>
                        </div> --}}
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
                        {{-- <div class="login-social-media border ps-4 pe-4 pb-4 pt-0 rounded-sm">
                            <div class="mb-4 d-block text-center"><b class="bg-white ps-2 pe-2 mt-3 d-block">Login or
                                    Sign in with</b></div>
                            <form class="row">
                                <div class="col-sm-6">
                                    <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                class="fab fa-facebook-f me-2"></i>Login with Facebook</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i
                                                class="fab fa-twitter me-2"></i>Login with Twitter</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn instagram-bg social-bg-hover d-block mb-3 mb-sm-0"
                                        href="#"><span><i class="fab fa-instagram me-2"></i>Login with
                                            Instagram</span></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i
                                                class="fab fa-linkedin-in me-2"></i>Login with Linkedin</span></a>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
