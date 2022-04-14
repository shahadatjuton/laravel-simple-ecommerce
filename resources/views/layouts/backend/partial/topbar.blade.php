<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-xl-none d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3" data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
        <div class="aiz-topbar-logo-wrap d-flex align-items-center justify-content-start">
            <a href="index.html" class="d-block">
                <img src="{{asset('assets/backend/img/logo.png')}}" class="img-fluid" height="45">
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
            <div class="aiz-topbar-item">
                <div class="d-flex align-items-center">
                    <a class="btn btn-light" href="{{route('home')}}" target="_blank">
                        <i class="las la-external-link-square-alt"></i>
                        <span class="d-none d-xl-inline-block">Browse Website</span>
                    </a>
                </div>
            </div><!-- .aiz-topbar-item -->
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
		                        	<span class="btn btn-light">
			                        	<i class="las la-plus"></i>
			                        	<span class="d-none d-xl-inline-block">Add New</span>
		                        	</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-md">
                        <a href="javascript:void(0);" class="dropdown-item text-capitalize">
                            <i class="las la-user"></i>
                            <span>Add New Customer</span>
                        </a>

                        <a href="javascript:void(0);" class="dropdown-item text-capitalize">
                            <i class="las la-sign-out-alt"></i>
                            <span>Add New Product</span>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
		                        	<span class="d-flex align-items-center">
			                            <span class="mr-md-2">
			                                <img src="{{asset('storage/profile/'.Auth::user()->image)}}" alt="user-image" class="rounded-circle img-fluid" height="36" width="36">
			                            </span>
			                            <span class="d-none d-md-block">
			                                <span class="d-block fw-500">{{Auth::user()->name}}</span>
			                                <span class="d-block small opacity-60">{{Auth::user()->role->name}}</span>
			                            </span>
		                            </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>My Account</span>
                        </a>
                        <a href="{{route('logout')}}" class="dropdown-item">
                            <i class="las la-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
