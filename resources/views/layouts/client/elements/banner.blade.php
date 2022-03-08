@php
    use App\Http\Helper\Url;
    use App\Models\BannerModel;
@endphp

<div class="banner">
    <section class="banner-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-auto">
                    <span style="color: #fff;"><i class="fas fa-map-marker-alt"></i> {{ $options['contact_address'] }}</span>
                </div>
                <div class="col-md-auto">
                    Tư vấn: <span style="color: #FF0;">{{ $options['contact_phone'] }}</span>
                </div>
                <div class="col-md-auto ms-auto d-none d-md-block">
                    <a href="https://www.facebook.com/CaCanhGiaRe.vn" target="_blank">
                        <img src="{{ asset('client/assets/images/fb-icon.png') }}" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="banner-bottom" style="height: 166px;">
        <div class="container" style="height: 100%;">
            <div class="banner-bottom__box" style="height: 100%;">
                <a href="#" style="height: 100%;">
                    <img src="{{ Url::bannerThumb(BannerModel::where('name', 'top-banner')->first()->thumb) }}" alt="" class="banner-bottom__box-img">
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