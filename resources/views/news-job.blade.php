@extends('master')

@section('content')
  <div class="container pt-30px mb-5">
    <section >
      <div class="header-selected pt-20px">
        <h3>{{$type_text}}</h3>
      </div>
      <div class="row wow fadeInDown">
        <div class="col-12">
          <table class="table table-striped">
            <tbody>
              <?php for($i=0; $i<4; $i++) { ?>
                <tr>
                  <td class="text-grey">
                    <span style="font-size:14px;">
                      <i class="far fa-calendar-alt"></i> 16 ก.ค. 2564 | ประกาศรายชื่อผู้มีสิทธิ์สอบรอบแรกตำแหน่งพนักงานบริหารงานทรัพย์สินทางปัญญา
                      <a class="text-link" href="">{{__('message.detail')}}</a>
                    </span>
                  </td>
                </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
@endsection
