<div class="row">
    <div class="span12">
        <ul class="top-nav">
            <li><a href="/">Loja</a></li>
            @if ( ! Authentication::user())
                <li><a href="/auth/login">Login</a></li>
                <li><a href="/register">Registre-se</a></li>
                <li><a href="/password">Perdeu a senha?</a></li>
            @else
                <li class="dropdown">
                    <a class="dropdown-toggle"
                       data-toggle="dropdown"
                       href="#">{{ Authentication::user()->present()->fullName }}<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/auth/logout">Sair</a></li>
                        @can('show', new App\Services\Admin\Policies\Admin())
                            <li><a href="/admin">Administrador</a></li>
                        @endcan
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
