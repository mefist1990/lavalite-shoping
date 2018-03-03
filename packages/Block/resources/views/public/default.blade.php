 <section class="what-we-do">
            <div class="container">
                <div class="row">
                    <h2 class="section_title">What we do?</h2>
                    @forelse($blocks as $key=>$block )
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="service_block">
                            <div class="block_icon"><i class="{!!$block['icon']!!}"></i></div>
                            <h3>{!!$block['name']!!}</h3>
                            <p>{!!$block['description']!!}</p>
                        </div>
                    </div>
                   @empty
                   @endif
                </div>
            </div>
        </section>