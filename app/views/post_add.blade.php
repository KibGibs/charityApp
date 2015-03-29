@extends('layout.layout')

@section('content')
<div class="container">

	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-paste"></i>
	      				<h3>Add Post</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						{{Form::open(array('action' => 'PostingController@savePost','class' => 'form-horizontal'))}}
						<!-- <form id="edit-profile" class="form-horizontal"> -->
							<input type="hidden" value="{{ $id }}" name="id"/>
							<fieldset>
								<div class="control-group">											
									<label class="control-label" for="posting_title">Post Title</label>
									<div class="controls">
										<input type="text" class="span6" name="posting_title" value="{{ $posting_title }}" required>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->

								<div class="control-group">											
									<label class="control-label" for="post">Post</label>
									<div class="controls">
<textarea class="form-control span6" rows="6" name="post" required>{{$post}}</textarea>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->

								<div class="control-group">											
									<label class="control-label" for="status">Status</label>
									<div class="controls">
										<select name="status" id="">
											@if($status == 1)
											<option value="1">Publish</option>
											<option value="2">Draft</option>
											@else
											<option value="2">Draft</option>
											<option value="1">Publish</option>
											@endif
										</select>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->


								<div class="form-actions">
									<button type="submit" class="btn btn-primary">Save</button> 
								</div> <!-- /form-actions -->
							</fieldset>
						</form>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span12 -->
	      </div> <!-- /row -->
</div>
@stop

