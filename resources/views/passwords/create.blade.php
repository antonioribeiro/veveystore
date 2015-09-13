@extends('layouts.simple')

@section('contents')
    <div class="row">

        <div class="span6 offset3">

            <div class="member-box">

                <h2>Recupere a sua senha</h2>

                Após informar seu endereço de e-mail você receberá uma mensagem com um link para troca da sua senha.

                <br>
                <br>

                {!! Form::opener(['route' => 'register', 'class' => 'smart-form client-form', 'id' => 'smart-form-register', 'no-return-ajax-url' => true]) !!}

                    <p>
                        <label for="field-email">Email <span class="mand">*</span></label>
                        {!! Form::text('email', null, ['id' => 'email', 'type' => 'email', 'autofocus']) !!}
                    </p>

                    <p class="buttons">
                        <button class="btn btn-primary" type="submit">Recuperar senha</button>
                    </p>

                {!! Form::close() !!}

            </div>

        </div>

    </div>
@stop


