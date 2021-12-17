<div class="box-search">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto ">
                <form class="d-flex" method="GET" action="{{ route('quote') }}">
                    <input class="form-control box-search-input" type="search" placeholder="Bạn tìm gì?" name="search">
                    <button class="btn btn-outline-success box-search-submit" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>