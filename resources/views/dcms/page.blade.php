<div id="result"></div>
<script>
  if(typeof(EventSource) !== "undefined") {
    var source = new EventSource('/api/test/');
    // source.onmessage = function(event) {
    //   document.getElementById("result").innerHTML += event.data + "<br>";
    // };
    source.addEventListener("message", function(event) {
    // Отрисовываем пришедшее с сервера сообщение
    document.getElementById("result").innerHTML += event.data + "<br>";
}, false);
    // Yes! Server-sent events support!
    // Some code.....
  } else {
      // Sorry! No server-sent events support..
  }
</script>