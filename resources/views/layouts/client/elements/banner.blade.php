<div class="banner">
    <section class="banner-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-auto">
                    <span style="color: #fff;"><i class="fas fa-map-marker-alt"></i> 80/25/21/11 Ngô Gia Tự, phường An Bình, thành phố Dĩ An, tỉnh Bình Dương</span>
                </div>
                <div class="col-md-auto">
                    Tư vấn: <span style="color: #FF0;">0974.180.759</span>
                </div>
                <div class="col-md-auto ms-auto d-none d-md-block">
                    <a href="https://www.facebook.com/CaCanhGiaRe.vn" target="_blank">
                        <img src="{{ asset('client/assets/images/fb-icon.png') }}" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="banner-bottom">
        <div class="container">
            <div class="banner-bottom__box">
                <a href="#">
                    <img src="{{ asset('client/assets/images/banner-bottom.png') }}" alt="" class="banner-bottom__box-img">
                </a>
                <form class="d-flex banner-bottom__box-search">
                    @csrf
                    <input class="form-control banner-bottom__box-search-input" type="search" placeholder="Bạn tìm gì?" name="Search">
                    <button class="btn btn-outline-success banner-bottom__box-search-submit" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </section>
</div>