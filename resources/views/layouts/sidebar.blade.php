<div class="vertical-menu @yield('pos')">
    <div class="h-100">
        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="/admin/assets/images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
            </div>
            <div class="mt-3">
                {{-- <a href="#" class="text-dark font-weight-medium font-size-16">{{Auth::user()->name}}</a> --}}
                <p class="text-body mt-1 mb-0 font-size-13">Administrator</p>
            </div>
        </div>

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{route('home')}}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('pos.index')}}" class="waves-effect">
                        <i class="mdi mdi-printer-pos"></i>
                        <span style="font-weight: bold">POS</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-group"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('customers.index')}}">All Orders</a></li>
                        <li><a href="{{route('pending.orders')}}">Pending Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-group"></i>
                        <span>Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('customers.index')}}">All Customers</a></li>
                        <li><a href="{{route('customers.create')}}">Add Customer</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account"></i>
                        <span>Employees</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('employees.index')}}">All Employees</a></li>
                        <li><a href="{{route('employees.create')}}">Add Employee</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-switch"></i>
                        <span>Suppliers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('suppliers.index')}}">All Suppliers</a></li>
                        <li><a href="{{route('suppliers.create')}}">Add Supplier</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cash-usd-outline"></i>
                        <span>Salary(EMP)</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('adv-salaries.create')}}">Pay Advsalary</a></li>
                        <li><a href="{{route('adv-salaries.index')}}">All AdvSalary</a></li>
                        <li><a href="{{route('salaries.index')}}">Pay Salary</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-tag-text"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('categories.index')}}">All Categories</a></li>
                        <li><a href="{{route('categories.create')}}">Add Category</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-storefront"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('products.index')}}">All Products</a></li>
                        <li><a href="{{route('products.create')}}">Add Product</a></li>
                        <li><a href="{{route('import.products')}}">Import Product</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-minus-circle-outline"></i>
                        <span>Expenses</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('expenses.create')}}">Add Expense</a></li>
                        <li><a href="{{route('expenses.index')}}">All Expenses</a></li>
                        <li><a href="{{route('today.expenses')}}">Today Expenses</a></li>
                        <li><a href="{{route('monthly.expenses')}}">Monthly Expenses</a></li>
                        <li><a href="{{route('yearly.expenses')}}">yearly Expenses</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-fingerprint"></i>
                        <span class="badge badge-pill badge-danger float-right">Not</span>
                        <span>Attendances</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('attendances.create')}}">Take Attendance</a></li>
                        <li><a href="{{route('attendances.index')}}">All Attendance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge badge-pill badge-danger float-right">Not</span>
                        <i class="mdi mdi-settings-outline"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Dashboard Settings</a></li>
                        <li><a href="#">Profile Settings</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>