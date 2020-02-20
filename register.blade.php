@extends('layouts.auth')

@section('title',trans('corals-quantum-admin::labels.auth.register'))
@section('css')



    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>


    <style type="text/css">
        .login-box, .register-box {
            width: 720px;
            margin: 6% auto;
        }

        @media (max-width: 470px) {
            .login-box, .register-box {
                width: 340px;
            }
        }

        #terms {
            color: black;
        }

        #terms-anchor {
            text-transform: uppercase;
        }

        .home-row {
            padding-top: 88px !important;
        }




    </style>
@endsection
@section('content')

    <div class="overlay">
        <div id="loading-img"></div>
    </div>

    <div class="container">
        <div class="row home-row mb-0">
            <div class="col-12  col-xl-12 col-md-12">
                <div class="home-text">


                    @foreach ($errors->twofa->all() as $error)

                        <div>{{ $error }}</div>

                    @endforeach




                    <div class="row">
                        <div class="col-md-4">
                            <div  id="form-success" class="form-success alert alert-default" style="display:none"></div>

                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div  id="form-errors" class="form-errors alert alert-warning" style="display:none"></div>

                            </div>
                        </div>
                    <form   name="sign-in-form" id="sign-in-form" class="dark-background" action="">

                        <div class="display-1">
                            Register
                        </div>
                        <p class="white mb-5">
                            Please use this form to register.
                            If you are already a member, please <a href="{{ route('login') }}" class="white-underline-link">login</a>.
                        </p>

                        <div class="row">
                            <div class="col-md-6 p-r-0">
                                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label for="name" class="sr-only">@lang('User::attributes.user.name')</label>
                                    <input id="name" style="background-color: transparent !important;" required type="text"  name="name" class="form-control" placeholder="@lang('User::attributes.user.name')" value="{{ old('name') }}" autofocus/> @if ($errors->has('name'))
                                        <small class="form-control-feedback">{{ $errors->first('name') }}</small> @endif
                                </div>
                            </div>
                            <div class="col-md-6 p-r-0">
                                <div class="form-group {{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                    <label for="last_name" class="sr-only">@lang('User::attributes.user.last_name')</label>
                                    <input id="last_name" style="background-color: transparent !important;" required type="text" name="last_name" class="form-control" placeholder="@lang('User::attributes.user.last_name')" value="{{ old('last_name') }}" autofocus/> @if ($errors->has('last_name'))
                                        <small class="form-control-feedback">{{ $errors->first('last_name') }}</small> @endif
                                </div>
                            </div>
                            <div class="col-md-12 p-r-0">
                                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label for="inputEmail" class="sr-only">@lang('User::attributes.user.email')</label>
                                    <input id="email" style="background-color: transparent !important;" required type="email" name="email" class="form-control" placeholder="@lang('User::attributes.user.email')" value="{{ old('email') }}" />
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span> @if ($errors->has('email'))
                                        <small class="form-control-feedback">{{ $errors->first('email') }}</small> @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 p-r-0">
                                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label for="inputPassword" class="sr-only">@lang('User::attributes.user.password')</label>
                                    <input id="password" required type="password" name="password" class="form-control" placeholder="@lang('User::attributes.user.password')" /> @if ($errors->has('password'))
                                        <small class="form-control-feedback">{{ $errors->first('password') }}</small> @endif
                                </div>
                            </div>
                            <div class="col-md-6 p-r-0">
                                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                    <label for="inputPassword" class="sr-only">@lang('User::attributes.user.retype_password')</label>
                                    <input id="password_confirmation" style="background-color: transparent !important;" required type="password" name="password_confirmation" class="form-control" placeholder="@lang('User::attributes.user.retype_password')" /> @if ($errors->has('password_confirmation'))
                                        <small class="form-control-feedback">{{ $errors->first('password_confirmation') }}</small> @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                    {{--
                                    <input class="form-control" id="authy-cellphone" --}}
                                    <input  placeholder="+601xxxxxxxx" required class="mdl-textfield__input form-control" type="text" pattern="\+[0-9\s\-\(\)]+" id="phone-number" style="background-color: transparent !important;">

                                    <span class="glyphicon glyphicon-phone form-control-icon"></span>
                                    @if ($errors->has('phone_number'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 p-r-0">
                                <div class="form-group {{ $errors->has('coupon_code') ? ' has-danger' : '' }}">
                                    <label for="inputPassword" class="sr-only">Coupon Code</label>
                                    <input type="text" name="coupon_code" class="form-control" placeholder="Enter Coupon Code" value="{{ old('coupon_code') }}" autofocus /> @if ($errors->has('coupon_code'))
                                        <small class="form-control-feedback">{{ $errors->first('coupon_code') }}</small> @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 p-r-0">
                                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                    {{--@if(\TwoFactorAuth::isActive())--}} {{--{!! CoralsForm::checkbox('two_factor_auth_enabled','User::attributes.user.two_factor_auth_enabled',true) !!}--}} {{--@if(!empty(\TwoFactorAuth::getSupportedChannels()))--}} {{--{!! CoralsForm::radio('channel','User::attributes.user.channel', false,\TwoFactorAuth::getSupportedChannels(),'sms') !!}--}} {{--@endif--}} {{--@endif--}}
                                </div>

                            </div>

                        </div>


                        <div class="custom-control custom-checkbox">
                            <input  required type="checkbox" name="terms" value="true" {{ !old('terms') ?: 'checked' }} class="custom-control-input" id="termsCheckbox" />
                            <label class="custom-control-label" for="termsCheckbox">
                                <strong style="color: white !important;">@lang('corals-quantum-admin::labels.auth.agree')
                                    <a href="#" style="color: orange !important;" data-toggle="modal" id="terms-anchor"
                                       data-target="#terms">@lang('corals-quantum-admin::labels.auth.terms')</a>
                                </strong>
                            </label>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-3 p-r-0 ">
                                <button disabled type="submit" class="btn bg-olive btn-block" id="sign-in-button">Verifying Phone Number/SignUp</button>


                            </div>
                        </div>
                        <!-- Sign-in button -->
                    </form>


                    <form id="verification-code-form" action="#" style="display: none">

                        <div class="row">
                            <div class="col-md-4">
                                {!! CoralsForm::text('name','Verification Code',true,null,['id'=>'verification-code']) !!}
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  text-right">
                                    <!-- Button that triggers code verification -->

                                    <div class="form-group   required-field "><input type="submit" class="form-control btn btn-success" id="verify-code-button" name="verify-code-button" value="Verify Code"></div>

                                    <div class="form-group   required-field ">
                                        <button  class="form-control btn btn-warning" id="cancel-verify-code-button" name="cancel-verify-code-button" >Cancel
                                        </button>
                                    </div>


                                {{--                                    <input type="submit" class="btn btn-success " id="verify-code-button" value="Verify Code"/>--}}
                                <!-- Button to cancel code verification -->
                                    {{--                                    <button class="btn btn-warning" id="cancel-verify-code-button">Cancel</button>--}}
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    {!! Theme::js('js/form-validation.js') !!}


    <script type="text/javascript">
        // Initialize Firebase
        // add your credentials from firebase project console and make sure to allow various domains if you have multiple testing servers
        var config = {
            apiKey: "",
            authDomain: "",
            databaseURL: "",
            projectId: "",
            storageBucket: "",
            messagingSenderId: "",
            appId: "",
            measurementId: ""
        };
        firebase.initializeApp(config);

        // var database = firebase.database();
        /**
         * Set up UI event listeners and registering Firebase auth listeners.
         */
        window.onload = function() {


            // Event bindings.
            document.getElementById('sign-in-button').addEventListener('click', onSignInSubmit);
            document.getElementById('phone-number').addEventListener('keyup', updateSignInButtonUI);
            document.getElementById('phone-number').addEventListener('change', updateSignInButtonUI);

            // [START appVerifier]
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
                'size': 'invisible',
                'callback': function(response) {
                    // reCAPTCHA solved, allow signInWithPhoneNumber.
                    onSignInSubmit();
                }
            });
            // [END appVerifier]

            recaptchaVerifier.render().then(function(widgetId) {
                window.recaptchaWidgetId = widgetId;
                updateSignInButtonUI();
            });
        };

        function removeFirstTwoZerosfromPhone(phoneNumber) {

            const regex = /^\d{2}/;
            var str = phoneNumber;
            let m;

            if ((m = regex.exec(str)) !== null) {
                // The result can be accessed through the `m`-variable.


                m.forEach((match, groupIndex) => {
                    str =  "+"+parseInt(str);

                });

                return str;
            }else {
                return phoneNumber;
            }

        }

        /**
         * Function called when clicking the Login/Logout button.
         */
        function onSignInSubmit(e) {

            e.preventDefault();
            if (isPhoneNumberValid()) {
                window.signingIn = true;
                var phoneNumber = getPhoneNumberFromUserInput();

                phoneNumber =  removeFirstTwoZerosfromPhone(phoneNumber);

                updateSignInButtonUI();

                var appVerifier = window.recaptchaVerifier;
                firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                    .then(function (confirmationResult) {
                        // SMS sent. Prompt user to type the code from the message, then sign the
                        // user in with confirmationResult.confirm(code).
                        window.signingIn = false;
                        updateSignInButtonUI();
                        resetRecaptcha();
                        // SMS sent. Prompt user to type the code from the message, then sign the
                        // user in with confirmationResult.confirm(code).
                        var code = window.prompt('Enter the verification code you received by SMS');
                        if (code) {
                            confirmationResult.confirm(code).then(function () {

                                $("#sign-in-button").attr("disabled", true);

                                e.preventDefault();
                                jQuery.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                    }
                                });

                                jQuery('.alert-warning').empty();
                                // jQuery('.alert-warning').show();

                                $(".overlay").show();
                                if($('#termsCheckbox').is(":checked"))
                                {

                                    var terms = jQuery('#termsCheckbox').val();


                                }else{
                                    $( "#termsCheckbox" ).prop( "checked", false );



                                }
                                jQuery.ajax({
                                    url: "{{ url('register') }}",
                                    method: 'post',
                                    data: {

                                        name: jQuery('#name').val(),
                                        last_name: jQuery('#last_name').val(),
                                        email: jQuery('#email').val(),
                                        phone_number: jQuery('#phone-number').val(),
                                        password: jQuery('#password').val(),
                                        password_confirmation: jQuery('#password_confirmation').val(),
                                        terms:terms
                                    },

                                    success: function(data){
                                        $(".overlay").hide();
                                        jQuery.each(data.errors, function(key, value){
                                            jQuery('.alert-default').show();
                                            jQuery('.alert-default').append('<p>'+value+'</p>');
                                        });
                                        jQuery('.alert-warning').empty();
                                        jQuery('.alert-warning').hide();

                                        window.location.replace("{{url('login')}}");

                                    },
                                    error: function (request, status, error) {
                                        json = jQuery.parseJSON(request.responseText);
                                        jQuery.each(json.errors, function(key, value){
                                            jQuery('.alert-warning').show();
                                            jQuery('.alert-warning').append('<p style="color: dodgerblue">'+value+'</p>');
                                        });
                                        $("#result").html('');
                                        $(".overlay").hide();

                                    }


                                });


                            }).catch(function (error) {
                                // User couldn't sign in (bad verification code?)
                                console.error('Error while checking the verification code', error);
                                window.alert('Error while checking the verification code:\n\n'
                                    + error.code + '\n\n' + error.message)
                            });
                        }

                        // updateSignInButtonUI();
                        // updateVerificationCodeFormUI();
                        // updateVerifyCodeButtonUI();
                        // updateSignInFormUI();
                    }).catch(function (error) {
                    // Error; SMS not sent
                    console.error('Error during signInWithPhoneNumber', error);
                    window.alert('Error during signInWithPhoneNumber:\n\n'
                        + error.code + '\n\n' + error.message);
                    window.signingIn = false;
                    updateSignInFormUI();
                    resetRecaptcha();
                    // updateSignInButtonUI();
                });
            }
        }

        /**
         * Function called when clicking the "Verify Code" button.
         */
        function onVerifyCodeSubmit(e) {
            e.preventDefault();
            if (!!getCodeFromUserInput()) {
                window.verifyingCode = true;
                updateVerifyCodeButtonUI();
                var code = getCodeFromUserInput();
                confirmationResult.confirm(code).then(function (result) {
                    // User signed in successfully.
                    var user = result.user;
                    window.verifyingCode = false;
                    window.confirmationResult = null;
                    updateVerificationCodeFormUI();




                }).catch(function (error) {
                    // User couldn't sign in (bad verification code?)
                    console.error('Error while checking the verification code', error);
                    window.alert('Error while checking the verification code:\n\n'
                        + error.code + '\n\n' + error.message);
                    window.verifyingCode = false;
                    updateSignInButtonUI();
                    updateVerifyCodeButtonUI();
                });
            }
        }





        /**
         * Reads the phone number from the user input.
         */
        function getPhoneNumberFromUserInput() {
            return document.getElementById('phone-number').value;
        }

        /**
         * Returns true if the phone number is valid.
         */
        function isPhoneNumberValid() {
            // var pattern = /^\+[0-9\s\-\(\)]+$/;
            var pattern = /^((\+)|(00))(?:[0-9]●?){6,14}[0-9]$/;
            var phoneNumber = getPhoneNumberFromUserInput();
            return phoneNumber.search(pattern) !== -1;
        }


        /**
         * This resets the recaptcha widget.
         */
        function resetRecaptcha() {
            return window.recaptchaVerifier.render().then(function (widgetId) {
                grecaptcha.reset(widgetId);
            });
        }


        /**
         * Re-initializes the ReCaptacha widget.
         */
        // function resetReCaptcha() {
        //     if (typeof grecaptcha !== 'undefined'
        //         && typeof window.recaptchaWidgetId !== 'undefined') {
        //         grecaptcha.reset(window.recaptchaWidgetId);
        //     }
        // }

        /**
         * Updates the Sign-in button state depending on ReCAptcha and form values state.
         */
        function updateSignInButtonUI() {
            document.getElementById('sign-in-button').disabled =
                !isPhoneNumberValid()
                || !!window.signingIn;

            if ($("#sign-in-button").is(':enabled')) {
                $('#sign-in-button').addClass('eLaw-form-sms').removeClass('eLaw-form-sms-disable')
            } else { $('#sign-in-button').addClass('eLaw-form-sms-disable').removeClass('eLaw-form-sms') }


        }








    </script>


@endsection
