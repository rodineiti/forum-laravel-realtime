@extends('layouts.default')

@section('content')

<div class="container">
	<h3>{{ __('Most recents threads') }}</h3>
	<threads 
		title="{{ __('Threads') }}"
		threads="{{ __('Threads') }}"
		replies="{{ __('Replies') }}"
		open="{{ __('Open') }}">
		Carregando
	</threads>

	<hr>
</div>
@endsection

@section('scripts')
<script src="/js/threads.js"></script>
@endsection

