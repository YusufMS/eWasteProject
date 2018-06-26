@extends('layouts.main')

@section('body')
    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">
        @include('partials.messages')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('createBuyer') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tpno"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="tpno" type="text"
                                           class="form-control{{ $errors->has('tpno') ? ' is-invalid' : '' }}"
                                           name="tpno" value="{{ old('tpno') }}" required>

                                    @if ($errors->has('tpno'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tpno') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="textarea"
                                           class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           name="address" value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row ">

                                <label for="category"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control " name="type" placeholder="<select>">

                                        <option placeholder="<select>" selected>select</option>
                                        <option placeholder="Exporter" selected>Exporter</option>
                                        <option placeholder="Government Body" selected>Government Body</option>
                                        <option placeholder="Collectors" selected>Collectors</option>


                                    </select>
                                </div>

                            </div>


                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="textarea"
                                           class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                           name="description" value="{{ old('description') }}">

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="hidden" class="form-control" name="_usertype" value="buyer">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

























