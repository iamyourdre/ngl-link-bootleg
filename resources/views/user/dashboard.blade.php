@extends('./template/userDashboard')

@section('title', 'Dashboard')

@section('content')

<div class="container mx-auto">
    <h1>Selamat datang di dashboard, {{ Auth::user()->nama }}</h1>
    <p>Email: {{ Auth::user()->email }}</p>

</div>
@endsection