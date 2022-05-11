 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('adminassets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
          <p>Green House</p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active treeview">
          <a href="{{ url('/home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>

        </li>
{{--
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>الإعدادات</span>
          </a>
          <ul class="treeview-menu">
             </ul>
        </li> --}}


        <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>الشركة</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin-company.index') }}"><i class="fa fa-circle-o"></i> عن الشركه </a></li>
              <li><a href="{{ route('admin-company-contact.index') }}"><i class="fa fa-circle-o"></i> بيانات التواصل</a></li>

              <li><a href="{{ route('admin-counter.index') }}"><i class="fa fa-circle-o"></i> جرين هاوس بالارقام</a></li>

            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>المستخدمين</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('admin-users.index') }}"><i class="fa fa-circle-o"></i>  المستخدمين </a></li>
              <li><a href="{{ route('admin-orders.index') }}"><i class="fa fa-circle-o"></i>  الاوردارات </a></li>
              <li><a href="{{ route('admin-points.index') }}"><i class="fa fa-circle-o"></i>  النقاط </a></li>

            </ul>
          </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>المقالات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
             <li><a href="{{ route('admin-blogs.index') }}"><i class="fa fa-circle-o"></i> عرض المقالات </a></li>
            <li><a href="{{ route('admin-blogs.create') }}"><i class="fa fa-circle-o"></i> انشاء مقالة </a></li>
</ul>
        </li>

        <li class="treeview">
            <a href="">
              <i class="fa fa-edit"></i>
              <span> الاصناف</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                     <a href="{{ route('admin-item-category.index') }}"><i class="fa fa-circle-o text-red"></i> <span> تصنيفات المنتجات</span></a>
                    <li><a href="{{ route('admin-items.index') }}"><i class="fa fa-circle-o"></i>  المنتجات</a></li>


            </ul>
          </li>



        <li class="treeview">
          <a href="">
            <i class="fa fa-edit"></i>
            <span>بيانات العملاء </span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin-partners.index') }}"><i class="fa fa-circle-o"></i> شركاء النجاح </a></li>
            <li><a href="{{ route('admin-how-use.index') }}"><i class="fa fa-circle-o"></i> كيفية الاستخدام</a></li>
            <li><a href="{{ route('admin-feedback.index') }}"><i class="fa fa-circle-o"></i> اراء العملاء</a></li>
        </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
