
<!-- Home / Dashboard -->
<li class="{{ Request::is('home') ? 'active' : '' }}">
    <a href="home">
        <i class="fa fa-home"></i> <span>Home</span>
    </a>
</li>

<!-- Master Menu -->
@if(Auth::user()->level == '1' or Auth::user()->level == '2')
<li class="treeview {{ Request::is('customers*') or Request::is('companies*') or Request::is('factories*') or Request::is('products*') or Request::is('salesPrices*') ? 'active' : '' }}">
    <a href="javascript:;">
        <i class="fa fa-database"></i>
        <span>Data Master</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('customers*') ? 'active' : '' }}">
            <a href="{!! route('customers.index') !!}"><i class="fa fa-angle-double-right"></i><span>Customers</span></a>
        </li>

        <li class="{{ Request::is('companies*') ? 'active' : '' }}">
            <a href="{!! route('companies.index') !!}"><i class="fa fa-angle-double-right"></i><span>Perusahaan</span></a>
        </li>

        <li class="{{ Request::is('factories*') ? 'active' : '' }}">
            <a href="{!! route('factories.index') !!}"><i class="fa fa-angle-double-right"></i><span>Gudang</span></a>
        </li>

        

        <li class="{{ Request::is('salesPrices*') ? 'active' : '' }}">
            <a href="{!! route('salesPrices.index') !!}"><i class="fa fa-angle-double-right"></i><span>Product Prices</span></a>
        </li>
        <li class="{{ Request::is('salesorders*') ? 'active' : '' }}">
            <a href="{!! route('salesorders.index') !!}"><i class="fa fa-angle-double-right"></i><span>S.O</span></a>
        </li>
        <li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
            <a href="{!! route('suppliers.index') !!}"><i class="fa fa-angle-double-right"></i><span>suppliers</span></a>
        </li>

        <li class="{{ Request::is('salesinvoices*') ? 'active' : '' }}">
            <a href="{!! route('salesinvoices.index') !!}"><i class="fa fa-angle-double-right"></i><span>salesinvoices</span></a>
        </li>
        <li class="{{ Request::is('products*') ? 'active' : '' }}">
            <a href="{!! route('products.index') !!}"><i class="fa fa-angle-double-right"></i><span>products</span></a>
        </li>
    </ul>
</li>
@endif

@if(Auth::user()->level == '1' or Auth::user()->level == '2' or Auth::user()->level == '3' or Auth::user()->level == '4')
<!-- Transaction Menu -->
<li class="treeview {{ Request::is('salesorders*') or Request::is('salesPrices*') or Request::is('salespayments*') ? 'active' : '' }}">
    <a href="javascript:;">
        <i class="fa fa-file-text-o"></i>
        <span>Data Transaksi</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        @if(Auth::user()->level == '1' or Auth::user()->level == '2' or Auth::user()->level == '3')
        <li class="{{ Request::is('salesorders*') ? 'active' : '' }}">
            <a href="{!! route('salesorders.index') !!}"><i class="fa fa-angle-double-right"></i><span>Sales Order</span></a>
        </li> 
        @endif       

        @if(Auth::user()->level == '1' or Auth::user()->level == '2' or Auth::user()->level == '4')
        <li class="{{ Request::is('salespayments*') ? 'active' : '' }}">
            <a href="{!! route('salespayments.index') !!}"><i class="fa fa-angle-double-right"></i><span>Pembayaran</span></a>
        </li>
        @endif
    </ul>
</li>
@endif

