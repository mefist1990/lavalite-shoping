@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> Details of {!! $product['name'] !!} </h4>
        </div>
        <div class="col-md-6">
            <div class='pull-right'>
                <a href="{{ trans_url('/user/product/product') }}" class="btn btn-default"> {{ trans('app.back')  }}</a>
                <a href="{{ trans_url('/user/product/product') }}/{{ product->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('app.edit')  }}</a>
                <a href="{{ trans_url('/user/product/product') }}/{{ product->getRouteKey() }}/copy" class="btn btn-warning"> {{ trans('app.copy')  }}</a>
                <a href="{{ trans_url('/user/product/product') }}/{{ product->getRouteKey() }}/delete" class="btn btn-danger"> {{ trans('app.delete')  }}</a>
            </div>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr/>

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="model">
                    {!! trans('product::product.label.model') !!}
                </label><br />
                    {!! $product['model'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="download">
                    {!! trans('product::product.label.download') !!}
                </label><br />
                    {!! $product['download'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="related_products">
                    {!! trans('product::product.label.related_products') !!}
                </label><br />
                    {!! $product['related_products'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('product::product.label.name') !!}
                </label><br />
                    {!! $product['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="price">
                    {!! trans('product::product.label.price') !!}
                </label><br />
                    {!! $product['price'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('product::product.label.status') !!}
                </label><br />
                    {!! $product['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="quantity">
                    {!! trans('product::product.label.quantity') !!}
                </label><br />
                    {!! $product['quantity'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="description">
                    {!! trans('product::product.label.description') !!}
                </label><br />
                    {!! $product['description'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="return_policy">
                    {!! trans('product::product.label.return_policy') !!}
                </label><br />
                    {!! $product['return_policy'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="meta_title">
                    {!! trans('product::product.label.meta_title') !!}
                </label><br />
                    {!! $product['meta_title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="meta_description">
                    {!! trans('product::product.label.meta_description') !!}
                </label><br />
                    {!! $product['meta_description'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="meta_keyword">
                    {!! trans('product::product.label.meta_keyword') !!}
                </label><br />
                    {!! $product['meta_keyword'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="tags">
                    {!! trans('product::product.label.tags') !!}
                </label><br />
                    {!! $product['tags'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="image">
                    {!! trans('product::product.label.image') !!}
                </label><br />
                    {!! $product['image'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="sku">
                    {!! trans('product::product.label.sku') !!}
                </label><br />
                    {!! $product['sku'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="upc">
                    {!! trans('product::product.label.upc') !!}
                </label><br />
                    {!! $product['upc'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="ean">
                    {!! trans('product::product.label.ean') !!}
                </label><br />
                    {!! $product['ean'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="jan">
                    {!! trans('product::product.label.jan') !!}
                </label><br />
                    {!! $product['jan'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="isbn">
                    {!! trans('product::product.label.isbn') !!}
                </label><br />
                    {!! $product['isbn'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="mpn">
                    {!! trans('product::product.label.mpn') !!}
                </label><br />
                    {!! $product['mpn'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="location">
                    {!! trans('product::product.label.location') !!}
                </label><br />
                    {!! $product['location'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="tax_class">
                    {!! trans('product::product.label.tax_class') !!}
                </label><br />
                    {!! $product['tax_class'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="substract_stock">
                    {!! trans('product::product.label.substract_stock') !!}
                </label><br />
                    {!! $product['substract_stock'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="outofstock_status">
                    {!! trans('product::product.label.outofstock_status') !!}
                </label><br />
                    {!! $product['outofstock_status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="seo_keyword">
                    {!! trans('product::product.label.seo_keyword') !!}
                </label><br />
                    {!! $product['seo_keyword'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="order">
                    {!! trans('product::product.label.order') !!}
                </label><br />
                    {!! $product['order'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="dimensions">
                    {!! trans('product::product.label.dimensions') !!}
                </label><br />
                    {!! $product['dimensions'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="weight_class">
                    {!! trans('product::product.label.weight_class') !!}
                </label><br />
                    {!! $product['weight_class'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="length_class">
                    {!! trans('product::product.label.length_class') !!}
                </label><br />
                    {!! $product['length_class'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="date_available">
                    {!! trans('product::product.label.date_available') !!}
                </label><br />
                    {!! $product['date_available'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="manufacturer">
                    {!! trans('product::product.label.manufacturer') !!}
                </label><br />
                    {!! $product['manufacturer'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="attributes">
                    {!! trans('product::product.label.attributes') !!}
                </label><br />
                    {!! $product['attributes'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="discounts">
                    {!! trans('product::product.label.discounts') !!}
                </label><br />
                    {!! $product['discounts'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="special">
                    {!! trans('product::product.label.special') !!}
                </label><br />
                    {!! $product['special'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="images">
                    {!! trans('product::product.label.images') !!}
                </label><br />
                    {!! $product['images'] !!}
            </div>
        </div>
    </div>
</div>