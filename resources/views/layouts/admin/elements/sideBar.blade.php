<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Quản lý</div>
                <a class="nav-link" href="{{ route('category.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Danh mục sản phẩm
                </a>
                <a class="nav-link" href="{{ route('product.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Sản phẩm
                </a>
                <a class="nav-link" href="{{ route('option.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Cài đặt thẻ Meta
                </a>
                <a class="nav-link" href="{{ route('banner.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Cài đặt ảnh banner
                </a>
                
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>