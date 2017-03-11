@extends('pink.layouts.site')

@section('content')

    <div id="content-page" class="content group">
        <div class="hentry group">
            <form class="contact-form" method="post" role="form" action="{{ url('/login') }}" >
                {{ csrf_field() }}
                <fieldset>
                    <ul>
                        <li class="text-field">
                            <label for="name-contact-us">
                                <span class="label">Login</span>
                                <br />					<span class="sublabel">This is the login</span><br />
                            </label>
                            <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="login" /></div>
                            <div class="msg-error"></div>
                        </li>
                        <li class="text-field">
                            <label for="password-contact-us">
                                <span class="label">Password</span>
                                <br />					<span class="sublabel">This is a field password</span><br />
                            </label>
                            <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><input type="password" name="password" /></div>
                            <div class="msg-error"></div>
                        </li>

                        <li class="submit-button">
                            <input type="submit"   value="Login"  />
                        </li>
                    </ul>
                </fieldset>
            </form>
        </div>

    </div>
@endsection
