@extends('master')
@section('content')
  <div class="container pt-30px pb-5">
    <section id="box-databaes">
      <div class="header-selected pt-20px">
        <h3>
          <p class="text-secondary  mb-0 text-normal">{{__('message.plant')}}</p>
        </h3>
      </div>
      <div class="gallery">
        <div class="container-fluid p-body">
          <div class="row no-gutters">
            @if($plant['files']) 
              <div class="col-12 col-lg-9 mx-auto">
                <div class="slide-nav">
                    <div class="nav-prev btn-nav"><i class='fa fa-angle-left'></i></div>
                    <div class="nav-next btn-nav"><i class='fa fa-angle-right'></i></div>
                    <div class="img-16by9 holder " >
                    <img class="img-slide gallery image image-big col-12" src="{{asset($plant['files'][0]['pic_location'])}}" class="img-responsive image-preview" >
                    </div>
                </div>
              </div>
            @endif
            <div class="col-12 col-lg-9 mx-auto mt-4">
              @if($plant['files']) 
                <div id="owl_carousel" class="owl-carousel">
                  @foreach ($plant['files'] as $key => $files) 
                    <div class="img-16by9 holder img-indicator {{ $key ==  0 ? 'active' : ''  }}" >

                      <img src="{{asset($files['pic_location'])}}" class="img-responsive  imagecon image-center "
                      >
                    </div>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 border-green mb-2">
            <h4>{{$plant['name']}}</h4> 
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ชื่อ
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['name']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ชื่อสามัญ
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['common_name']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ชื่อท้องถิ่น
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['local_name']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ชื่อวิทยาศาสตร์
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['scientific_name']}}
        </div>
      </div> 
      <div class="row">
        <div class="col-12 border-green mb-2">
          <h4>อนุกรมวิธาน</h4> 
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          อาณาจักร
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['kingdom']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          หมวด
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['division']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ชั้น
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['class']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          อันดับ
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['order']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          วงศ์
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['family']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          สกุล
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['genus']}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ชนิด
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['species']}}
        </div>
      </div> 
      <div class="row">
        <div class="col-12 border-green mb-2">
          <h4>ลักษณะทางพฤกษศาตร์ </h4> 
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ลำต้น
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['stem_'.__('message.lang_system')]}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ใบ
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['leaf_'.__('message.lang_system')]}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ดอก
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['flower_'.__('message.lang_system')]}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          ผล
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['fruit_'.__('message.lang_system')]}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          การกระจายพันธุ์
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['distribution_'.__('message.lang_system')]}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          การใช้ประโยชน์
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['utilization_'.__('message.lang_system')]}}
        </div>
        <div class="col-12 col-md-5 col-lg-3 pt-2 text-detai">
          อ้างอิง
        </div>
        <div class="col-12 col-md-7 col-lg-9 pt-2">
          {{$plant['references_'.__('message.lang_system')]}}
        </div>
      </div> 
      <div class="col-12 mt-5">
        <div class="text-center">
          <a href="#" class="text-link" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> {{__('message.back')}}</a> |
          <a href="{{url('/')}}" class="text-link"><i class="fa fa-home"></i> {{__('message.main_page')}}</a>
        </div>
      </div>
    </section>
  </div>
@endsection
@section('footer')
<script type="text/javascript">
  $(document).ready(function () {
    var $owl_slide = $('#owl_carousel');

    $owl_slide.children().each( function( index ) {
      $(this).attr( 'data-position', index ); 
    });

    $owl_slide.owlCarousel({
      center: true,
      loop: true,
      items: 5,
    });

    $(document).on('click', '.owl-item>div', function() {
      $owl_slide.trigger('to.owl.carousel', $(this).data( 'position' ) ); 
    });

    $(document).on('click', '.nav-next', function(e) {
      $owl_slide.trigger('next.owl.carousel');
    });

    $(document).on('click', '.nav-prev', function(e) {
      $owl_slide.trigger('prev.owl.carousel');
    });

    $owl_slide.on('changed.owl.carousel', function(e) {
      let index = e.item.index;
      
      let $indicator = $('.img-indicator').eq(index);
      let caption = $indicator.data('caption');
      let datetime = $indicator.data('datetime');
      let $img_slide = $('.img-slide');

      $('.img-indicator').removeClass('active');
      $indicator.addClass('active');
      
      $('#caption').html(caption);
      $('#datetime').html(datetime);
      $img_slide.attr('src', $indicator.find('img').attr('src'));
      $img_slide.attr('data-index', index);
    });
  });
</script>
@endsection
