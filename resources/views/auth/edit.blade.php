<div class="card mb-2">
        <div class="card-header">
            <h6>Change Password</h6>
        </div>

        <div class="card-body">
		<form action="{{ route('user.update', $data->id) }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('put') }}

            <div class="row col-md-12">
				<div hidden>
					<!-- NPK -->
					<div class="col-md-2 mb-2"><span>NPK</span></div>

					<div class="col-md-10 mb-2">
						<div class="control-group{{ $errors->has('npk') ? ' has-error' : '' }}">
							<div class="controls">
								<input id="npk" type="text" class="form-control col-md-6 mb-2" name="npk" value="{{ $data->npk }}" disabled>
								@if ($errors->has('npk'))
									<span class="help-block">
										<strong>{{ $errors->first('npk') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<!-- Nama -->
					<div class="col-md-2 mb-2"><span>Nama</span></div>

					<div class="col-md-10 mb-2">
						<div class="control-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<div class="controls">
								<input id="name" type="text" class="form-control col-md-6 mb-2" name="name" value="{{ $data->name }}" required readonly>
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<!-- Username -->
					<div class="col-md-2 mb-2"><span>Username</span></div>

					<div class="col-md-10 mb-2">
						<div class="control-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<div class="controls">
								<input id="username" type="text" class="form-control col-md-6 mb-2" name="username" value="{{ $data->username }}" required readonly>
								@if ($errors->has('username'))
									<span class="help-block">
										<strong>{{ $errors->first('username') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<!-- Role -->
					<div class="col-md-2 mb-2"><span>Role User</span></div>

					<div class="col-md-10 mb-2">
						<div class="control-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
							<div class="controls">
								<select class="form-control col-md-6 mb-2" name="role_id" disabled>
									<option value="">-- Pilih Role --</option>
									@foreach($role as $roles)
										<option value="{{ $roles->role_id }}" {{$data->role_id === $roles->role_id ? "selected" : ""}}> {{ $roles->role_nm }} </option>
									@endforeach
								</select>

								@if ($errors->has('role_id'))
									<span class="help-block">
										<strong>{{ $errors->first('role_id') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>

					<!-- Role -->
					<div class="col-md-2 mb-2"><span>User Status</span></div>

					<div class="col-md-10 mb-2">
						<div class="control-group{{ $errors->has('user_status') ? ' has-error' : '' }}">
							<div class="controls">
								<select class="form-control col-md-6 mb-2" name="user_status" disabled>
									<option value="1" {{$data->user_status === "1" ? "selected" : ""}}>Active</option>
									<option value="2" {{$data->user_status === "2" ? "selected" : ""}}>Inactive</option>
								</select>
							</div>
						</div>
					</div>
				</div> <!-- hidden form -->
				
                <!-- Password -->
                <div class="col-md-2 mb-2"><span>Password</span></div>

                <div class="col-md-10 mb-2">
                    <div class="control-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="controls">
                            <input id="password" type="password" class="form-control col-md-6 mb-2" onkeyup='check();' name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="col-md-2 mb-2"><span>Confirm Password</span></div>

                <div class="col-md-10 mb-2">
                    <div class="control-group">
                        <div class="controls">
                            <input id="confirm_password" type="password" onkeyup="check()" class="form-control col-md-6 mb-2" name="password_confirmation">
                            <span id='message'></span>
                        </div>
                    </div>
                </div>

                

            </div>
		</form>
		<div class="col-md-12 mb-2">
                     <button type="submit" class="update btn btn-success mb-2 btn-sm" id="submit">
                        update
                    </button>
                    <!--a href="{{route('user.index')}}" class="btn btn-primary mb-2 btn-sm"> Back</a-->
                </div>
        </div>

    </div>


<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })


	var check = function() {
	  if (document.getElementById('password').value ==
		document.getElementById('confirm_password').value) {
		document.getElementById('submit').disabled = false;
		document.getElementById('message').style.color = 'green';
		document.getElementById('message').innerHTML = 'matching';
	  } else {
		document.getElementById('submit').disabled = true;
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = 'not matching';
	  }
	}
	
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	// Update record
	$(document).on("click", ".update" , function() 
	{
		
		  var password = $('#password').val();
		  var confirm_password = $('#confirm_password').val();
		  
		  if ( (password =='') || (confirm_password =='') )
		  { 
			alert ('Not Valid')
		  } 

		  else if ( (password == confirm_password) && (password !='') )
		  {
			$.ajax
			({
			  url: '{{ route('user.update', $data->id) }}',
			  type: 'put',
			  data: {_token: CSRF_TOKEN, password:password},
			  
			  success: function(response){
				alert('Success');
				
			  },
			  error: function(response) {
				alert('failed');
			    console.log(response);
			  }
			});
		  }
		  else
		  {
			alert('not updated');
		  }
	  
	});
</script>