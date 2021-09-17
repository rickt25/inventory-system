$(() => {
  $(window).on('closeModal', () => {
    $("#formModal").modal('hide');
  })

  $("#formModal").on('hidden.bs.modal', function(){
    Livewire.emit('$refresh')
  });
});