<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#"><img src="{{ asset('assets_'.direction().'/assets/images/placeholder.jpg') }}"
                                     class="img-circle img-responsive" alt=""></a>
                    <h6>{{ auth()->user()->name }}</h6>
                    <span class="text-size-small">Santa Ana, CA</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li><a href=""><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                    <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                    <li><a href="#"><i class="icon-comment-discussion"></i> <span><span
                                        class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                    <li class="divider"></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> <span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>


                    <li class="">
                        <a href="{{ route('importExport') }}">
                            <i class="icon-home"></i>
                            <span>Import File
                                <span class="label bg-warning-400"></span>

                            </span>
                        </a>
                    </li>


                    <li class="">
                        <a href="{{ route('companies') }}">
                            <i class="icon-home"></i>
                            <span>companies
                                <span class="label bg-warning-400"></span>

                            </span>
                        </a>
                    </li>



                    <li class="">
                        <a href="{{ route('indexBranches') }}">
                            <i class="icon-home"></i>
                            <span>Branches
                                <span class="label bg-warning-400"></span>

                            </span>
                        </a>
                    </li>


                    </li>
                    <!-- /page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
