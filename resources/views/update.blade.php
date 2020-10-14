@extends('layout.master')
@section('content')
<body class="bg-light">
	<div class="container">
	<div class="py-3 text-center">
	</div>

<form action="/data/update" method="POST">
<div class="row">
    <div class="col-12 order-md-1">
      <h4 class="mb-3">User Data</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
			<input type="hidden" name="addmore[user_id]" value="{{ $user['id'] }}">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
		  <input type="text" class="form-control" name="addmore[first_name]" id="firstName" placeholder="" value="{{$user['first_name']}}">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="addmore[last_name]" id="lastName" placeholder="" value="{{$user['last_name']}}" >
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

		<h4 class="mb-3">Company</h4>
        <div class="row">
          	<div class="col-md-12 mb-3">
				<label for="country">Name</label>
				<select class="custom-select d-block w-100" id='companyList'>
				<option value="">Choose...</option>
				@foreach ($company as $item)
					@if ($item->id == $userCompany->id)
						<option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
					@endif
					<option value="{{ $item->id }}">{{ $item->name }}</option>
				@endforeach
				</select>
				<input type='hidden' value='' id="companyName" name="addmore[company_id]" />
			
          	</div>
		</div>
		<div class="control-group">
			<h4 class="mb-3">Events</h4>
			<label class="control-label entry" for="field1">Event Name</label>
			<div class="controls" id="dynamicField"> 
				<form role="form" autocomplete="off">
					<input type="hidden" name="addmore[event_id]" value="{{ $event['id'] }}">
					<div class="input-group col-xs-3">
						<input class="form-control" value="{{$event->name}}" name="addmore[event][0]" type="text" placeholder="Type something" />
						<span class="input-group-btn">
							<button class="btn btn-success btn-add" type="button" name="add" id="add">
								<span class="glyphicon glyphicon-plus">
									Add More
								</span>
							</button>
						</span>
					</div>
				</form>
			</div>
			<br>
		</div>
		        
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
      </form>
    </div>
</div>
</form>
@endsection