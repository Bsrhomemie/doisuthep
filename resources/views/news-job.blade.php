@extends('master')

@section('content')
  <div class="container pt-30px mb-5">
    <section >
      <div class="header-selected pt-20px">
        <h3>{{__('message.join')}}</h3>
      </div>
      <div class="row wow fadeInDown">
        <div class="col-12">
          <table class="table table-striped">
            <tbody>
                @foreach ($content_list as $key => $join) 
                  <tr>
                    <td class="text-grey">
                      <span style="font-size:14px;">
                        <i class="far fa-calendar-alt"></i>
                        {{date('d/m/Y', strtotime($join['created_at']))}} | {{$join['post_name_'.__('message.lang_system')]}}
                        <a class="text-link" href="{{url('news-detail/news/'.$join['id'])}}">{{__('message.detail')}}</a>
                      </span>
                    </td>
                  </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
@endsection
