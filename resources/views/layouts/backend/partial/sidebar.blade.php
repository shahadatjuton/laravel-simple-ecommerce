<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="index.html" class="d-block">
                <img src="{{asset('assets/backend/img/logo-light.png')}}" class="img-fluid">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">
                @if(Request::is('admin*'))
                <li class="aiz-side-nav-item">
                    <a href="index.html" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <i class="las la-tachometer-alt aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Category</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{route('admin.category.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Categories</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('admin.category-type.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Category Types</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('admin.sub-category.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Sub Categories</span>
                            </a>
                        </li>

                    </ul>
                </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('admin.product.index')}}" class="aiz-side-nav-link">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">Products</span>
                        </a>
                    </li>
                @endif
                    @if(Request::is('customer*'))
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <i class="las la-home aiz-side-nav-icon"></i>
                                <span class="aiz-side-nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Personal Information</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="#" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">Order History</span>
                            </a>
                        </li>
                    @endif
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
