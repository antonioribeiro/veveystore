@extends('layouts.simple')

@section('contents')
    <div class="row">

        <div class="span6 offset3">

            <div class="member-box">

                <h2>Registre-se</h2>

                {!! Form::opener(['route' => 'register', 'class' => 'smart-form client-form', 'id' => 'smart-form-register', 'no-return-ajax-url' => true]) !!}

                    <p>
                        <label for="field-email">Nome <span class="mand">*</span></label>
                        {!! Form::text('first_name', null, ['id' => 'first_name', 'type' => 'text', 'autofocus']) !!}
                    </p>

                    <p>
                        <label for="field-email">Email <span class="mand">*</span></label>
                        {!! Form::text('email', null, ['id' => 'email', 'type' => 'email']) !!}
                    </p>

                    <p>
                        <label for="field-password">Senha <span class="mand">*</span></label>
                        {!! Form::password('password', ['id' => 'password', 'type' => 'password', 'value' => '']) !!}
                    </p>

                    <p>
                        <label for="field-password">Confirme a senha <span class="mand">*</span></label>
                        {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'type' => 'password', 'value' => '']) !!}
                    </p>

                    <p class="buttons">
                        <button class="btn btn-primary" type="submit">Enviar registro</button>
                    </p>

                {!! Form::close() !!}

            </div>

        </div>

    </div>
@stop


