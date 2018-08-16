@extends('layouts.main')

@section('body')

    <script>
        function selectUser(that) {
            if (that.value == "buyer" || that.value == "buyer/seller") {
//                alert("check");
                document.getElementById("buyertype").style.display = "block";
            } else {
                document.getElementById("buyertype").style.display = "none";
            }
        }


        var check = function () {
            if (document.getElementById("password").value ==
                document.getElementById("password_confirmation").value) {
                document.getElementById("message").style.color = 'green';
                document.getElementById("message").innerHTML = 'Match with the Password';
            } else {
                document.getElementById("message").style.color = 'red';
                document.getElementById("message").innerHTML = 'Not match with the Password Field';
            }
        }

        var checkPhoneNo = function () {
            var phone = document.getElementById("tpno");
            var RE = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            if (!phone.value.match(RE)) {
                document.getElementById("tpmessage").style.color = 'red';
                document.getElementById("tpmessage").innerHTML = 'Invalid Phone Number';
            } else {
                document.getElementById("tpmessage").style.color = 'green';
                document.getElementById("tpmessage").innerHTML = 'Valid Phone Number';
            }
        }
    </script>


    @include('layouts.navbar')
    <br>
    <br>
    <div class="container">


        @include('partials.messages')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('signup') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="fname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control" name="fname" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control" name="lname" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation"
                                           id="password_confirmation" onkeyup='check()' required>
                                    <span id='message'></span>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="tpno"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="tpno" type="text" class="form-control" name="tpno" required
                                           onkeyup='checkPhoneNo()'>
                                    <span id='tpmessage'></span>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="textarea"
                                           class="form-control"
                                           name="address" required>


                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="textarea"
                                           class="form-control"
                                           name="description">


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="userType"
                                       class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="userType" id="userType"
                                            onchange="selectUser(this);">
                                        <option disabled selected>Select User</option>
                                        <option value="buyer">Buyer</option>
                                        <option value="seller">Seller</option>
                                        <option value="buyer/seller">Buyer/Seller</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group " id="buyertype" style="display: none;">
                                <div class="row">
                                    <label for="buyerType"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Buyer Type') }}</label>

                                    <div class="col-md-6">


                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                                       type="checkbox" value="Exporter">
                                                Exporter
                                                <br>
                                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                                       type="checkbox" value="Government">
                                                Government
                                                <br>
                                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                                       type="checkbox" value="Collecting Agent">
                                                Collecting Agent
                                                <br>
                                                <input class="form-check-input" name="buyerType[]" id="buyerType"
                                                       type="checkbox" value="Local Company">
                                                Local Company
                                            </label>
                                        </div>


                                        {{--<select class="form-control" name="buyerType" id="buyerType">--}}
                                        {{--<option disabled selected>Select User</option>--}}
                                        {{--<option>Exporter</option>--}}
                                        {{--<option>Government Body</option>--}}
                                        {{--<option>Collecting Agent</option>--}}
                                        {{--<option>Local Company</option>--}}

                                        {{--</select>--}}
                                    </div>
                                </div>

<br>
                                <div class="row">
                                    <label for="buyerType"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Web Address(if have)') }}</label>

                                    <div class="col-md-6">

                                        <input class="form-control" name="webAddress" id="webAddress" type="url">


                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">

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
