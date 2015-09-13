@extends('layouts.simple')

@section('contents')
    <div class="row">

        <div class="span6 offset3">

            <div class="member-box">

                <h2>Login</h2>

                {!! Form::opener(['route' => 'auth.login', 'class' => 'smart-form client-form', 'id' => 'smart-form-register', 'no-return-ajax-url' => true]) !!}

                    <p>
                        <label for="field-email">Email <span class="mand">*</span></label>
                        {!! Form::text('email', null, ['id' => 'email', 'type' => 'email', 'autofocus']) !!}
                    </p>

                    <p>
                        <label for="field-password">Senha <span class="mand">*</span></label>
                        {!! Form::password('password', ['id' => 'password', 'type' => 'password', 'value' => '']) !!}
                    </p>

                    <p class="buttons">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </p>

                {!! Form::close() !!}

            </div>

        </div>

    </div>
@stop


