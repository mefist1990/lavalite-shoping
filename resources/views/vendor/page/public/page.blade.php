<section class="about-section bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section_title">{!!$page->title!!}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="white-block description">
                    <p>{!!$page->content!!}</p>
                </div>
            </div>
            <div class="col-md-6">
                    <img src="{!!url(@$page->defaultImage('xxl','images'))!!}" class="img-responsive" alt="">
            </div>
        </div>
    </div>
</section>
{!!Block::get()!!}