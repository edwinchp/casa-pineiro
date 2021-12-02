@extends('main')

@section('content')

@if ($accessToken)
<div style="display: none;">
    <?php echo "<script>document.write(localStorage.setItem('user_token', '" . $accessToken . "'))</script>"; ?>
</div>
@endif

<dashboard-index :access-token='@json($accessToken)'></dashboard-index>

<div class="page-body">
    
</div>

@endsection