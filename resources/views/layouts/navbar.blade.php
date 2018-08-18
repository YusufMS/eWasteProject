<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Online E-waste Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>

        </ul>


        @guest
            <ul class="navbar-nav navbar-right">
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>

                {{--<li class="nav-item dropdown shown">--}}
                {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
                {{--aria-haspopup="true" aria-expanded="true">Register</a>--}}
                {{--<div class="dropdown-menu shown" x-placement="bottom-start"--}}
                {{--style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">--}}
                {{--<a class="dropdown-item " href="{{ route('register') }}">{{__('Seller')}}</a>--}}
                {{--<a class="dropdown-item" href="{{ route('regBuyer') }}">{{__('Buyer')}}</a>--}}
                {{--</div>--}}
                {{--</li>--}}
                @else


                    @if(Auth::user()->_usertype == 'seller')

                        <li class="nav-item dropdown shown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="true">Posts</a>
                            <div class="dropdown-menu shown" x-placement="bottom-start"
                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                <a class="dropdown-item " href="/posts/create">{{ __('Add Posts') }}</a>
                                <a class="dropdown-item" href="/posts">{{ __('View All posts') }}</a>
                                <a class="dropdown-item"
                                   href="/showMyPosts/{{Auth::user()->id}}">{{ __('View Your posts') }}</a>
                            </div>
                        </li>


                    @elseif(Auth::user()->_usertype == 'buyer')

                        <li class="nav-item dropdown shown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Posts</a>
                            <div class="dropdown-menu shown">
                                <a class="dropdown-item " href="/posts/create">{{ __('Add Posts') }}</a>
                                <a class="dropdown-item" href="/posts">{{ __('View posts') }}</a>
                            </div>
                        </li>

                    @else
                        @if(Session::has('user_role'))
                            {{-- @if(Request::url() === 'http://localhost:8000/sellerHome' || Request::url() === 'http://localhost:8000/posts/create') --}}
                            @if(Session::get('user_role') == 'seller')

                                <li class="nav-item dropdown shown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="true" aria-expanded="true">Post</a>
                                    <div class="dropdown-menu shown" x-placement="bottom-start"
                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                                        <a class="dropdown-item " href="/posts/create">{{ __('Add Posts') }}</a>
                                        <a class="dropdown-item" href="/posts">{{ __('View All posts') }}</a>
                                        <a class="dropdown-item"
                                           href="/showMyPosts/{{Auth::user()->id}}">{{ __('View Your posts') }}</a>
                                    </div>
                                </li>

                            @elseif(Session::get('user_role') == 'buyer')

                                <li class="nav-item dropdown shown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                       role="button">Posts</a>
                                    <div class="dropdown-menu shown">
                                        <a class="dropdown-item " href="/posts/create">{{ __('Add Posts') }}</a>
                                        <a class="dropdown-item" href="/posts">{{ __('View posts') }}</a>
                                        <a class="dropdown-item"
                                           href="/showMyPosts/{{Auth::user()->id}}">{{ __('View Your posts') }}</a>
                                    </div>
                                </li>
                            @endif
                        @endif
                    @endif


                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->email }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                                {{ __('Profile') }}
                            </a>


                            @if( Auth::user()->_usertype == "buyer/seller")
                                <hr>
                                <a class="dropdown-item" href="/sellerHome">

                                    {{ __('Seller Portal') }}
                                    @if(Session::get('user_role') == 'seller')
                                        <kbd class="bg-success mx-1">active</kbd>
                                    @endif
                                </a>
                                <a class="dropdown-item" href="/buyerHome">
                                    {{ __('Buyer Portal') }}
                                    @if(Session::get('user_role') == 'buyer')
                                        <kbd class="bg-success mx-1">active</kbd>
                                    @endif
                                </a>
                            @endif
                            <hr>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            </ul>
        @endguest


    </div>
</nav>

