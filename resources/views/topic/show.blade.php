@extends('master')

@section('css')

@stop

@section('content')
	<h2>
		{{$topic->title}}
		@if(count($topic->replies) > 0 && Auth::check() && Auth::user()->id == $topic->replies->first()->user_id)
			{{HTML::actionlink($url = array('action' => 'TopicController@delete', 'params' => array($topic->id)), '<i class="fa fa-trash-o"></i>', array('class' => 'float-right'))}}
		@endif
	</h2>
	@if(count($topic->replies) > 0)
		@if(Auth::check() && Auth::user()->id == $topic->replies->first()->user_id)
			<div class="margin-bottom-one margin-top-one inline-form">
				{{ Form::model($topic, array('action' => array('TopicController@createOrUpdate', $topic->id))) }}
				<div class="input-group">
					{{ Form::text('title', Input::old('Title'), array('Placeholder' => 'Topic title')) }}
					<span class="button-group">
					{{ Form::button('Update topic title', array('type' => 'submit')) }}
					</span>
				</div>
				{{ $errors->first('title', '<div class="alert error">:message</div>') }}
				{{ Form::close() }}
			</div>
		@endif
		<div class="forum">
			<div class="item invert">
				<div class="content">
					<div class="avatar">Avatar</div>
					<div class="content">Reply</div>
				</div>
			</div>
			@foreach($topic->replies as $reply)
				@include('topic.reply', ['reply' => $reply])
			@endforeach
		</div>
	@else
		<div class="alert info">This topic have no replies yet.</div>
	@endif
	@if(is_null($editReply))
		{{ Form::model($editReply, array('action' => 'ReplyController@createOrUpdate')) }}
	@else
		{{ Form::model($editReply, array('action' => array('ReplyController@createOrUpdate', $editReply->id))) }}
	@endif
	<h3 class="margin-top-one">Reply</h3>
	{{ Form::hidden('topic_id', Route::Input('id')) }}
	{{ Form::label('reply', 'Reply:') }}
	{{ Form::textarea('reply', Input::old('reply'), array('placeholder' => 'Your reply', 'class' => 'mentionarea', 'id' => 'reply', 'data-validator' => 'required|min:3')) }}
	{{ $errors->first('reply', '<div class="alert error">:message</div>') }}
	@if(!is_null($editReply))
		{{HTML::actionlink($url = array('action' => 'TopicController@show', 'params' => array($editReply->topic->id)), 'Cancel edit of reply', array('class' => 'float-left font-bold'))}}
	@endif
	{{ Form::button('Reply', array('type' => 'submit')) }}
	{{ Form::close() }}
@stop

@section('script')

@stop                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       