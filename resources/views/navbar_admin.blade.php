<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
           {{-- @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')--}}
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Control Panel Pages</div>

                    <a class="nav-link" href="/home">
                        <div class="nav-link-icon"><i class="fas fa-columns text-gray-200"></i></div>
                        Main Page
                    </a>

                    <a class="nav-link" href="/domains">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                         Domains
                    </a>

                    <a class="nav-link" href="/options/settings">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                         Panel Settings
                    </a>

                    <a class="nav-link" href="/users">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                         Users
                    </a>

<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards2" aria-expanded="false" aria-controls="collapseDashboards2">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        New Domains
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards2" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/products">
                                All Products

                            </a>
                            <a class="nav-link" href="/products/create">
                                New Product

                            </a>

                        </nav>
                    </div>-->



                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Subscriptions
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/subscriptions">
                                All Subscriptions

                            </a>
                            <a class="nav-link" href="/subscriptions/create">
                                New Subscription

                            </a>

                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards3" aria-expanded="false" aria-controls="collapseDashboards3">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Points Level
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards3" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/points">
                                All Points Levels

                            </a>
                            <a class="nav-link" href="/points/create">
                                New Point Level

                            </a>

                        </nav>
                    </div>



<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards4" aria-expanded="false" aria-controls="collapseDashboards4">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        SubCategories
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards4" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/subcategories">
                                All SubCategories

                            </a>
                            <a class="nav-link" href="/subcategories/create">
                                New SubCategory

                            </a>

                        </nav>
                    </div>-->

<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards5" aria-expanded="false" aria-controls="collapseDashboards5">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        SubSubCategories
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards5" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/subsubcategories">
                                All SubSubCategories

                            </a>
                            <a class="nav-link" href="/subsubcategories/create">
                                New SubSubCategory

                            </a>

                        </nav>
                    </div>-->

<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards6" aria-expanded="false" aria-controls="collapseDashboards6">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Employees
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards6" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/employees">
                                All Employees

                            </a>
                            <a class="nav-link" href="/employees/create">
                                New Employee

                            </a>

                        </nav>
                    </div>-->

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards7" aria-expanded="false" aria-controls="collapseDashboards7">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Job Titles
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards7" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/jobtitles">
                                All Job Titles

                            </a>
                            <a class="nav-link" href="/jobtitles/create">
                                New Job Title

                            </a>

                        </nav>
                    </div>

<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards8" aria-expanded="false" aria-controls="collapseDashboards8">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Brands
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards8" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/brands">
                                All Brands
                            </a>
                            <a class="nav-link" href="/brands/create">
                                New Brand

                            </a>

                        </nav>
                    </div>-->




                    <!--                    <a class="nav-link" href="/admin/signals">
                                            <div class="nav-link-icon"><i class="fas fa-cog text-gray-200"></i></div>
                                            All Signals
                                        </a>

                                        <a class="nav-link" href="/admin/options">
                                            <div class="nav-link-icon"><i class="fas fa-cog text-gray-200"></i></div>
                                            All News
                                        </a>-->

                   {{-- <a class="nav-link" href="/admin/appusers">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                        Categories
                    </a>--}}


                   {{-- <a class="nav-link" href="/admin/users">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                        Sub-Categories
                    </a>--}}

                    <!--                    <a class="nav-link" href="/admin/porders">
                                            <div class="nav-link-icon"><i class="fas fa-shopping-cart text-gray-200"></i></div>
                                            Panel Orders
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/prepaidorders">
                                            <div class="nav-link-icon"><i class="fas fa-shopping-cart text-gray-200 "></i></div>
                                            Prepaid Forge Orders
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/tickets">
                                            <div class="nav-link-icon"><i class="fas fa-ticket-alt text-gray-200 "></i></div>
                                            Tickets
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/payments">
                                            <div class="nav-link-icon"><i class="fas fa-file-invoice-dollar text-gray-200 mr-1"></i></div>
                                            Payments
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/invoices">
                                            <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                                            Invoices
                                        </a>-->

                   {{-- <a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                       Sub-Sub-Categories
                    </a>
--}}


                  {{--  <a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                        Employees
                    </a>--}}

                  {{--  <a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                        Job Title
                    </a>--}}

                    {{--<a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                        Panel Users
                    </a>--}}





                </div>

          {{--  @endif--}}

        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">admin name</div>
                <div class="sidenav-footer-title">{{--{{\Illuminate\Support\Facades\Auth::user()->name}}--}}</div>
            </div>
        </div>
    </nav>
</div>
