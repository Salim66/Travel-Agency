@extends('backend.admin_master')


@section('content')
<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row">
              @if(Auth::user()->packages == 1)
              @php
                  $pack_count = \App\Models\Package::count();
              @endphp
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Packages</p>
                              <h3 class="text-white mb-0 font-weight-500">{{ $pack_count }}</h3>
                          </div>
                      </div>
                  </div>
              </div>
              @else    
              @endif

              @if(Auth::user()->post == 1)
              @php
                  $post_count = \App\Models\Post::count();
              @endphp
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Posts</p>
                              <h3 class="text-white mb-0 font-weight-500">{{ $post_count }} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              @else    
              @endif

              @if(Auth::user()->destination == 1)
              @php
                $desti_count = \App\Models\Destination::count();
              @endphp
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Destinations</p>
                              <h3 class="text-white mb-0 font-weight-500">{{ $desti_count }} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              @else    
              @endif

              @if(Auth::user()->contact_us == 1)
              @php
                $cont_count = \App\Models\ContactForm::count();
              @endphp
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Contact Us</p>
                              <h3 class="text-white mb-0 font-weight-500">{{ $cont_count }} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              @else    
              @endif

              @if(Auth::user()->booking_package == 1)
              @php
                $book_p_count = \App\Models\BookPackage::count();
              @endphp
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Booking Packages</p>
                              <h3 class="text-white mb-0 font-weight-500">{{ $book_p_count }} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              @else    
              @endif


              @if(Auth::user()->subscriber == 1)
              @php
                $Subs_count = \App\Models\Subscriber::count();
              @endphp
              <div class="col-xl-2 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Subscribers</p>
                              <h3 class="text-white mb-0 font-weight-500">{{ $Subs_count }} </h3>
                          </div>
                      </div>
                  </div>
              </div>
              @else    
              @endif

          </div>
      </section>
      <!-- /.content -->
    </div>
</div>
@endsection
