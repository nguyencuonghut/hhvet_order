<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('product.index') }}"><img style="height: 10px;" src="{{ URL::to('honghavet.png') }}" alt="Honghavet"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('product.shoppingCart') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Quản lý tài khoản <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li><a href="{{ route('order') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Đặt hàng</a></li>
                            <li><a href="{{ route('user.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            <li><a href="{{ route('user.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li>
                        @else
                            <li><a href="{{ route('user.signin') }}"><i class="fa fa-user" aria-hidden="true"></i> Đăng nhập</a></li>
                            <li><a href="{{ route('user.signup') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng ký</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>