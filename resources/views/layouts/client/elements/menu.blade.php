<div class="menu">
    <div class="container menu-pc">
        <ul class="menu-list">
            <li class="menu-list-item ">
                <a href="{{ route('client-home') }}">Trang chủ</a>    
            </li>
            
            <li class="menu-list-item ">
                <a href="{{ route('quote') }}">Bảng giá</a>
            </li>

            <li class="menu-list-item ">
                <a target="_blank" href="https://shopee.vn/shop/359252536/">Shopee</a>
            </li>

            <li class="menu-list-item ">
                <a target="_blank" href="{{ route('contact') }}">Liên hệ</a>
            </li>
        </ul>
    </div>
    
    <div class="container menu-mobile">
        <div class="row menu-mobile__top">
            <div class="col-md-12">
                <div class="d-flex justify-content-between menu-mobile-icon">           
                    <a class="btn" data-bs-toggle="collapse" href="#menu-mobile-toggle" >
                        <span class="menu-mobile__top-icon">
                            <i class="fas fa-list"></i>
                        </span>
                    </a>
                    <a class="btn">
                        <span class="menu-mobile__top-icon menu-mobile__top-icon-cart">
                            <i class="fas fa-cart-plus"></i>
                        </span>
                    </a>
                    
                </div>
            </div>
        </div>
        <div class="row menu-mobile__bottom collapse" id="menu-mobile-toggle">
            <ul class="menu-list">
                <li class="menu-list-item ">
                    <a href="{{ route('client-home') }}/">
                        Trang chủ            </a>    
                </li>
                
                <li class="menu-list-item ">
                    <a href="{{ route('quote') }}">Bảng giá</a>
                </li>
                <li class="menu-list-item ">
                    <a target="_blank" href="https://shopee.vn/shop/359252536/">Shopee</a>
                </li>
    
                <li class="menu-list-item ">
                    <a target="_blank" href="{{ route('contact') }}">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</div>