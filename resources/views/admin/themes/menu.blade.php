<li class="menu-header">DASHBOARD</li>

<li class="nav-item {{Request::segment(2) == 'dashboard' ? 'active' : ''}}">
    <a href="{{url('admin/dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>

<li class="menu-header">MASTER DATA</li>

<li class="nav-item {{Request::segment(2) == 'user' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/user')}}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
</li>

<li class="menu-header">Ecommerce</li>
<li class="nav-item {{Request::segment(3) == 'banner' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/banner')}}" class="nav-link"><i class="fas fa-list"></i><span>Banner</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'kategori' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/kategori')}}" class="nav-link"><i class="fas fa-list"></i><span>Kategori</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'produkkategori' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/produkkategori')}}" class="nav-link"><i class="fas fa-list"></i><span>Kategori Produk</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'produk' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/produk')}}" class="nav-link"><i class="fas fa-list"></i><span>Produk</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'metodepembayaran' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/metodepembayaran')}}" class="nav-link"><i class="fas fa-list"></i><span>Metode Pembayaran</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'keranjang' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/keranjang')}}" class="nav-link"><i class="fas fa-list"></i><span>Keranjang</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'keranjangproduk' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/keranjangproduk')}}" class="nav-link"><i class="fas fa-list"></i><span>Keranjang Produk</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'ulasan' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/ulasan')}}" class="nav-link"><i class="fas fa-list"></i><span>Ulasan</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'voucher' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/voucher')}}" class="nav-link"><i class="fas fa-list"></i><span>Voucher</span></a>
</li>
<li class="nav-item {{Request::segment(3) == 'voucheruser' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/voucheruser')}}" class="nav-link"><i class="fas fa-list"></i><span>Voucher User</span></a>
</li>
<li class="nav-item {{Request::segment(2) == 'transaksi' ? 'active' : ''}}">
    <a href="{{url('admin/ecommerce/transaksi')}}" class="nav-link"><i class="fas fa-list"></i><span>Transaksi</span></a>
</li>

<li class="menu-header">ARISAN</li>

<li class="nav-item dropdown {{Request::segment(3) == 'programs' ? 'active' : ''}}">
    <a class="nav-link has-dropdown nav-item "><i class="fas fa-dice"></i><span>Programs</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{Request::segment(3) == 'programs' ? 'active' : ''}}">
            <a href="{{url('admin/arisan/programs')}}" class="nav-link">Programs</a>
        </li>
        <li class="nav-item {{Request::segment(4) == 'user' ? 'active' : ''}}">
            <a href="{{url('admin/arisan/programs/user')}}" class="nav-link">Program User</a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown {{Request::segment(3) == 'kategori' ? 'active' : ''}}">
    <a class="nav-link has-dropdown "><i class="fa fa-list"></i><span>Categories</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{Request::segment(3) == 'kategori' ? 'active' : ''}}">
            <a href="{{url('admin/arisan/kategori')}}" class="nav-link">Categories</a>
        </li>

        <li class="nav-item {{Request::segment(4) == 'program' ? 'active' : ''}}">
            <a href="{{url('admin/arisan/kategori/program')}}" class="nav-link">Categori Program</a>
        </li>
    </ul>
</li>