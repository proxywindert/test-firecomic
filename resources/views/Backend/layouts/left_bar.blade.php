<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>{{trans('leftbar.nav.comic')}}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('comics.list')}}"><i
                                class="fa fa-circle-o"></i>{{trans('leftbar.nav.list.comic')}}</a></li>
                    <li><a href="{{ route('comics.create')}}"><i
                                class="fa fa-circle-o"></i>{{trans('leftbar.nav.add.comic')}}</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>{{trans('leftbar.nav.hashtag')}}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('hashtags.list')}}"><i
                                class="fa fa-circle-o"></i>{{trans('leftbar.nav.list.hashtag')}}</a></li>
                    <li><a href="{{ route('hashtags.create')}}"><i
                                class="fa fa-circle-o"></i>{{trans('leftbar.nav.add.hashtag')}}</a></li>
                </ul>
            </li>

        </ul>

    </section>
    <!-- /.sidebar -->
</aside>


