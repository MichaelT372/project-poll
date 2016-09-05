@if (session()->has('flash_message'))
  <script type="text/javascript">
    swal({
	  title: "{{ session('flash_message.title') }}",
	  text: "{{ session('flash_message.message') }}",
	  type: "{{ session('flash_message.type') }}",
	  timer: 2000,
	  showConfirmButton: false
	});
  </script>
@endif

@if (session()->has('flash_message_confirm'))
  <script type="text/javascript">
    swal({
	  title: "{{ session('flash_message_confirm.title') }}",
	  text: "{{ session('flash_message_confirm.message') }}",
	  type: "{{ session('flash_message_confirm.type') }}",
	  confirmButtonText: 'Okay'
	});
  </script>
@endif
