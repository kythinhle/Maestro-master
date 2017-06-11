@if(Session::has('flash_message'))
    <div class="alert alert-{!! Session::get('flash_level') !!}">
    	<i class="fa fa-{!! Session::get('flash_icon') !!} fa-2x">
    		{!! Session::get('flash_message') !!}
    	</i>
    </div>
@endif