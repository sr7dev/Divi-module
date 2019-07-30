(function(name, context) {
  window.addEventListener("load", function() {
    console.log(name);
  });
})(window["testChildSettings"], window);
