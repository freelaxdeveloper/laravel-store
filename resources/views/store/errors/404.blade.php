@extends('layouts.app')

@section('content')

  <section class="no-content" id="content">
    <div class="lg-margin"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="no-content-comment">
            <h2>404</h2>
            <h3>
              Не нашел твою страницу!<br>
              Я думаю, ты заблудился.
            </h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
      $(function() {
        function n(n, t, a, o) {
          for (var i = 0; n > i; i++) a += "!" == t[i] ? "<span>" + t[i] + "<br><\/span>" : "<span>" + t[i] + "<\/span>";
          o.html(a)
        }
        var t = $(".no-content-comment"),
          a = t.find("h2"),
          o = a.text(),
          i = t.find("h3"),
          e = i.text(),
          c = o.length,
          f = e.length,
          h = "",
          d = "",
          p = 50;
        n(c, o, h, a), n(f, e, d, i), $(window).on("load", function() {
          t.find("span").each(function() {
            p += 80, $(this).delay(200).animate({
              opacity: 1
            }, p)
          })
        })
      });
    </script>
@endsection