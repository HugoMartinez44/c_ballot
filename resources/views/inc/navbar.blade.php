<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="/">
            C_Ballot
        </a>
        <a class="py-2 d-none d-md-inline-block" href="/campaigns">Campaigns</a>
        <a class="py-2 d-none d-md-inline-block" href="/organizations">Organizations</a>
            @guest
        <a class="py-2 d-none d-md-inline-block" href="{{ route('register') }}">Register</a>
        <a class="py-2 d-none d-md-inline-block" href="{{ route('login') }}">Login</a>
            @else
        <a class="py-2 d-none d-md-inline-block" href="/dashboard">
            {{Auth::user()->organizername}} <span class='caret'></span></a>

            <!-- continue the log nav here by adding Auth to the Nico's project -->
                    <a class="py-2 d-none d-md-inline-block" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
                @endguest
    </div>
</nav>