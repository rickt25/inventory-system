$(() => {
  window.addEventListener("mask-input", () => {
    $(".rupiah").mask("000.000.000", { reverse: true });
  });
});
