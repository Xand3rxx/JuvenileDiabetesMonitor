@extends('layouts.app')
@section('title', 'Patient Messages')
@section('content')
@include('partials._messages')

@foreach ($patientProfile as $profile)
@endforeach

@foreach ($collection as $doc)
@endforeach
<style>
  .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}

.sent_msg_img {
  display: inline-block;
  width: 6%;
  float: right;
  margin-left: 25px;
}

.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #1cc6d8 none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 60%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>


    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
            
          <h4 class="text-info mb-4">Messages with {{ $profile->First_Name}} {{ $profile->Last_Name }}</h4>
          <div class="inbox_msg">         
{{-- <div class="fluid-container"> --}}
          <div class="mesgs">
              <div class="msg_history">
                @if ($messageCount > 0)
                @foreach ($patientMessage as $item)
                @if($item->Status == 0)
                  <div class="incoming_msg">
                    <div class="incoming_msg_img"> 
                        @if ($profile->Avatar == '' || $profile->Avatar == 'user_avatar.jpg')
                        <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('custom/images/user_avatar.jpg') }}" alt="image">                      
                        @else
                          <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('uploads/'.$profile->Avatar) }}" alt="image">
                        @endif
                    </div>
                    <div class="received_msg">
                      <div class="received_withd_msg">
                        <p>{{ $item->Message_Body }}</p>
                        <span class="time_date">
                          <?php
                            $time = \Carbon\Carbon::parse($item->TimeStamp, 'UTC');
                            echo $time->isoFormat('MMMM Do YYYY, h:mm:ssa');
                          ?>  
                          </span>
                        </div>
                    </div>
                  </div>
                  @endif
                  @if($item->Status == 1)
                  <div class="outgoing_msg">
                      <div class="sent_msg_img"> 
                          @if ($doc->Avatar == '' || $doc->Avatar == 'user_avatar.jpg')
                          <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('custom/images/user_avatar.jpg') }}" alt="image">                      
                          @else
                            <img class="img-sm rounded-circle mb-4 mb-md-0" src="{{ asset('uploads/'.$doc->Avatar) }}" alt="image">
                          @endif
                      </div>
                    <div class="sent_msg">
                        <p>{{ $item->Message_Body }}</p>
                        <span class="time_date">
                          <?php
                            $time = \Carbon\Carbon::parse($item->TimeStamp, 'UTC');
                            echo $time->isoFormat('MMMM Do YYYY, h:mm:ssa');
                          ?>  
                          </span>
                        </div>
                  </div>   
                  @endif
                @endforeach
                @else
                  <h3 class="text-danger font-weight-semibold mr-2 mb-0 no-wrap text-center"> Sorry! No messages from {{ $profile->First_Name}} {{ $profile->Last_Name }}</h3>
                @endif          
              </div>

              <div class="type_msg">
                <div class="input_msg_write">
                <form action="{{ route('messagePatient') }}" method="POST">
                    {{ csrf_field() }}
                    <input value="1" name="Status" class="d-none">
                    <input value="{{ $profile->Medical_Record_No }}" name="Medical_Record_No" class="d-none">
                  <input value="{{ $doc->Physician_ID }}" name="Physician_ID" class="d-none">
                  <input type="text" name="Message_Body" class="write_msg" placeholder="Send {{ $profile->First_Name}} {{ $profile->Last_Name }} a message" />
                  {{-- <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button> --}}
                  <button class="msg_send_btn" type="submit"><i class="menu-icon mdi mdi-send" aria-hidden="true"></i></button>
                  </form>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>

  <dialog class="mdl-dialog" role="dialog" id="modal-example">
      <div class="mdl-dialog__content">
          <div class="card">
              <div class="card-body">
                {{-- <h4 class="card-title">Default form</h4>
                <p class="card-description">
                  Basic form layout
                </p> --}}
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="Message_Title">Title</label>
                  <input type="text" class="form-control" name="Message_Title" id="Message_Title" value="">
                  </div>
                  <div class="form-group">
                    <label for="Message_Body">Message</label>
                    <textarea class="form-control" name="Message_Body" id="Message_Body" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success mr-2">Submit</button>
                  <a class="btn btn-light close-modal-example">Cancel</a>
                </form>
              </div>
            </div>
      </div>
      {{-- <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
          <button type="button" class="mdl-button">Close</button>
          <button type="button" class="mdl-button" disabled>Inactive action</button>
      </div> --}}
  </dialog>

 
  
@endsection