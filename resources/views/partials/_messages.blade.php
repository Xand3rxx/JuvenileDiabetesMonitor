{{-- Primary Alert --}}
@if(Session::has('primary'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Processing!</strong> {{ Session::get('primary') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Secondary Alert --}}
@if(Session::has('secondary'))
<div class="alert alert-secondary alert-dismissible fade show" role="alert">
  <strong>Almost there!</strong> {{ Session::get('secondary') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

@if(Session::has('message1'))
    <script>
      swal({
            type: 'success',
            title: 'Signed in successfully',
            timer:3000
          });
    </script>
@endif

{{-- Success Alert --}}
@if(Session::has('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> {{ Session::get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Custom Alert --}}
@if(Session::has('flash_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error while trying to register student!</strong> {{ Session::get('flash_message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Danger Alert --}}
@if(Session::has('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error while trying to register student!</strong> {{ Session::get('danger') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Warning Alert --}}
@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Something went wrong!</strong> {{ Session::get('warning') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Informational Alert --}}
@if(Session::has('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Heads Up!</strong> {{ Session::get('info') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Light Alert --}}
@if(Session::has('light'))
<div class="alert alert-light alert-dismissible fade show" role="alert">
  <strong>Heads Up!</strong> {{ Session::get('light') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Dark Alert --}}
@if(Session::has('dark'))
<div class="alert alert-dark alert-dismissible fade show" role="alert">
  <strong>Note to User!</strong> {{ Session::get('dark') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- Authentication Alert --}}
@if(Session::has('status'))
<div class="alert alert-status alert-dismissible fade show" role="alert">
  <strong>Note to User!</strong> {{ Session::get('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span>&times;</span>
  </button>
</div>
@endif

{{-- If the page has any error passed to it --}}
@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong class="font-weight-bold">Oops! something went wrong.</strong> 
    <ul>
      @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span>&times;</span>
    </button>
  </div>

  {{-- <script>
      swal({
        type: 'error',
        title: 'Oops! Something went wrong',
        text: 'Email/Password field is required.'
       
      });
    </script> --}}
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span>&times;</span>
    </button>
  </div>

  {{-- <script>

// const Toast = swal.mixin({
//   toast: true,
//   position: 'top-end',
//   showConfirmButton: false,
//   timer: 3000
// });

// Toast.fire({
//   type: 'success',
//   title: 'Signed in successfully'
// })
      swal({
        type: 'error',
        // title: 'Oops! Something went wrong',
        text: '{{$message}}',
        timer: 3000
      });
  </script> --}}
@endif
{{-- @if($errors->has('email'))
  <span class="invalid-feedback">
      <strong> {{ $error->first('email') }} </strong>      
  </span>
@endif

@if($errors->has('password'))
  <span class="invalid-feedback">
      <strong> {{ $error->first('password') }} </strong>      
  </span>
@endif --}}