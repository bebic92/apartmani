
{{-- IMPLEMENTIRANJE SWEET ALERTA TE PRIMANJE PARAMERARA IZ KLASE FLASH BLADE --}}

@if(session()->has('flash_message'))
<script>
swal({
  title: "{{session('flash_message.title')}}",
  text: "{{session('flash_message.message')}}",
  type: "{{session('flash_message.level')}}",
  confirmButtonText: 'Ok'
});

</script>
@endif

@if(session()->has('flash_message_overlay'))
<script>
swal({
  title: "{{session('flash_message_overlay.title')}}",
  text: "{{session('flash_message_overlay.message')}}",
  type: "{{session('flash_message_overlay.level')}}",
  timer: 2000,
  showConfirmButton: false
});

</script>
@endif
@if(session()->has('flash_delete'))
<script>
$(".delete").on("submit", function(){
swal({
  title: "{{session('flash_delete.title')}}",
  text: "{{session('flash_delete.message')}}",
  type: "{{session('flash_delete.level')}}",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
});
</script>
@endif