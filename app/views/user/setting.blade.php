@extends('admin.layout')

@section('content')
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	<div class="content_section_title">
		User Settings
	</div>
	<div class="content_section">
	<!-- User create form -->
	{{ Form::open(array('id'=> 'user_setting_form','action' => array('UserController@update', $user->id), 'method' =>'put')) }}
		<table cellspacing="10">
			<!-- User Id -->
				{{ Form::hidden('method', 'user_setting') }}
			<!-- User Id -->
				{{ Form::hidden('user_id', $user->id) }}
			<!-- User Level Id -->
			<tr>
				<td class="form_label"> </td>
				<td class="form_field">{{ Form::hidden('level_id', $user->level_id) }}</td>
			</tr>
			<!-- Email field -->
			<tr>
				<td class="form_label">
					{{ Form::label('email', 'Email') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::email('email', $user->email) }}
				</td>
			</tr>
			<!-- Username field -->
			<tr>
				<td class="form_label">
					{{ Form::label('username', 'Username') }}
					<span class="required">(*)</span>
				</td>
				<td class="form_field">
					{{ Form::text('username', $user->username) }}
				</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td class="form_label"></td>
				<td class="form_field">{{ Form::submit('Edit Settings')}}
					   {{ Form::button('Cancel', array(
							'onclick' => "document.location.href='".URL::previous()."'" )
						)}}
				</td>
			</tr>
		</table>
	{{ Form::close() }}
	</div>
@stop
