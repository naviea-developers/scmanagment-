@extends('user.layouts.master-layout')
@section('head')
@section('title','- Notification')

@endsection
@section('main_content')

    <div class="right_section" style="color:var(--seller_text_color)">
        <div>
            <h4>My Notification</h4>
        </div>
    </div>
    <div class="media-list">
         <div class="show-notification-data">
            @foreach ($notifications as $notification)
              @if ($notification->type == 'course')
              <a href="{{ route('frontend.course.details',$notification->cart->course->id) }}" class="media-list-link @if($notification->is_read == 0)unread @else read @endif">
                <div class="media">
                  <img src="{{ @$notification->cart->course->teacher->image_show }}" alt="" style="height:60px;width:60px;">
                  <div class="media-body">
                    <p class="noti-text">&nbsp; Course<strong> &nbsp; {{ @$notification->cart->order->order_number }}</strong> {{ $notification->text }}.</p>
                    <p> &nbsp; {{date('F,d,Y H:i:s',strtotime($notification->created_at))}}</p>
                  </div>
                </div><!-- media -->
              </a>
              @elseif($notification->type == 'university')
              @foreach (@$notification->application->carts  as $cart)
                {{-- <a href="{{ route('frontend.course.details',@$cart->course->id) }}" class="media-list-link @if(@$notification->is_read == 0)unread @else read @endif"> --}}
                <a href="{{ route('frontend.application-details', @$notification->application->id) }}" class="media-list-link @if(@$notification->is_read == 0)unread @else read @endif">
                  <div class="media">
                    <img src="{{ @$cart->course->university->image_show }}" alt="" style="height:60px;width:60px;">
                    <div class="media-body">
                      {{-- <p class="noti-text">&nbsp; Course<strong> &nbsp; {{ @$notification->cart->order->order_number }}</strong> {{ $notification->text }}.</p> --}}
                      <p class="noti-text">&nbsp; <strong> &nbsp; {{ @$cart->course->name }}</strong> {{ @$notification->text }}.</p>
                      <p> &nbsp; {{date('F,d,Y H:i:s',strtotime(@$notification->created_at))}}</p>
                    </div>
                  </div><!-- media -->
                </a>
              @endforeach  
              {{-- {{ @$notification->cart->course->teacher->name}} --}}
              @elseif ($notification->type == 'event')

              <a href="{{ route('frontend.event.details',$notification->event_cart->event->id) }}" class="media-list-link @if($notification->is_read == 0)unread @else read @endif">
                <div class="media">
                  <img src="{{ @$notification->event_cart->event->host->image_show }}" alt="" style="height:60px;width:60px;">
                  <div class="media-body">
                    <p class="noti-text">&nbsp; Event<strong> &nbsp;  {{ @$notification->event_cart->order->order_number }}</strong> {{ $notification->text }}.</p>
                    <p> &nbsp; {{date('F,d,Y H:i:s',strtotime($notification->created_at))}}</p>
                  </div>
                </div><!-- media -->
              </a>
              @else

              @endif

                
            @endforeach
         </div>
    </div>









@endsection
