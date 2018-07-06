@extends('layouts.app')

@section('content')





<div class="wrap">
  <div id="demo">

    <div id="loader"></div>

    <div id="panorama">
      <div class="face f1"></div>
      <div class="face f2"></div>
      <div class="face f3">
      </div>
      <div class="face f4">
        <div class="label" id="l1">
            Доставка к Вам домой
          <hr />
        </div>
      </div>
      <div class="face f5">
        <div class="label" id="l2">
            5,700грн.
          <hr />
        </div>
      </div>
      <div class="face f6">
        <div class="label" id="l3">
            Шкаф купе
          <hr />
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('css')
@parent
<style>
  .wrap {
    padding: 0 !important;
  }
  html, body {
  height: 100%; width: 100%;
}
body {
  margin: 0;
  background: #E3E3E3;
  font-family: "Times New Roman", Times, serif;
}
h1 {
  text-align: center;
  margin: 0;
  font-size: 28px;
  font-style: italic;

  color: #FFF;
  text-shadow: 1px 1px 2px #AAA;
  padding: 40px 0 0 0;
}
h2 {
  text-align: center;
  margin: 0;
  font-size: 18px;
  font-style: italic;
  font-weight: normal;
  color: #FFF;
  text-shadow: 1px 1px 2px #AAA;
  padding: 10px 0 20px 0;
}
.wrap {
  background: #FFF;
  padding: 10px;
  box-shadow: 0 0 3px #AAA;
  margin: 0 auto;
  height: 400px; width: 400px;
  border-radius: 3px;
}
#demo {
  height: 100%; width: 100%;
  overflow: hidden;
  position: relative;
  -webkit-perspective: 300px;
  -moz-perspective: 300px;
  perspective: 300px;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}
#loader {
  position: absolute;
  left: 0; top: 198px;
  height: 4px;
  background: #222;
  border-radius: 2px;
}
#panorama {
  opacity: 0;
  -webkit-transition: opacity 0.5s ease;
  -moz-transition: opacity 0.5s ease;
  transition: opacity 0.5s ease;
}
#panorama, #panorama .face {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
}
#panorama .face, .label {
  -webkit-backface-visibility:hidden;
  -moz-backface-visibility:hidden;
  backface-visibility:hidden;
}
#panorama .face:nth-child(1) {
  background-image: url("https://image.freepik.com/free-vector/wooden-texture_23-2147511826.jpg");
  -webkit-transform: rotateX(90deg) translateZ(-199px);
  -moz-transform: rotateX(90deg) translateZ(-199px);
  transform: rotateX(90deg) translateZ(-199px);
  background-size: 100%;
}
#panorama .face:nth-child(2) {
  background-image: url("https://image.freepik.com/free-photo/wooden-texture_1208-334.jpg");
  -webkit-transform: rotateX(-90deg) translateZ(-199px);
  -moz-transform: rotateX(-90deg) translateZ(-199px);
  transform: rotateX(-90deg) translateZ(-199px);
  background-size: 100%;
}
#panorama .face:nth-child(3) {
  background-image: url("https://cdn.taburetka.ua/9t/s6/2thg20y7joux41b8rnaztlwx33yvu.jpg");
  -webkit-transform: rotateY(90deg) translateZ(-199px);
  -moz-transform: rotateY(90deg) translateZ(-199px);
  transform: rotateY(90deg) translateZ(-199px);
  background-size: 100%;
}
#panorama .face:nth-child(4) {
  background-image: url("https://cdn.taburetka.ua/2f/ku/rqub627dkfaeb8qcyjafjrbn6pkr0.jpg");
  -webkit-transform: rotateY(-90deg) translateZ(-199px);
  -moz-transform: rotateY(-90deg) translateZ(-199px);
  transform: rotateY(-90deg) translateZ(-199px);
  background-size: 100%;

}
#panorama .face:nth-child(5) {
  background-image: url("https://cdn.taburetka.ua/57/2q/ev7avuc59j2hatlmjkbixw3d1kpuj.jpg");
  -webkit-transform: translateZ(-199px);
  -moz-transform: translateZ(-199px);
  transform: translateZ(-199px);
  background-size: 100%;
}
#panorama .face:nth-child(6) {
  background-image: url("https://cdn.taburetka.ua/6z/oe/ya8t811n8sv2am2593zuhtdwrlyu4.jpg");
  -webkit-transform: rotateY(180deg) translateZ(-199px);
  -moz-transform: rotateY(180deg) translateZ(-199px);
  transform: rotateY(180deg) translateZ(-199px);
  background-size: 100%;
}

.label {
  position: absolute;
  color: #FFF;
  font-size: 16px;
  text-shadow: 1px 1px 2px #000;
  padding: 3px 3px 3px 0;
  font-style: italic;
}
.label:before, .label hr {
  position: absolute;
  left: 0; bottom: 0;
  height: 2px;
  background: #FFF;
}
.label:before {
  content: '';
  width: 100%;
  box-shadow: 1px 1px 2px rgba(0,0,0,.50);
}
.label hr {
  margin: 0; border: 0;
  box-shadow: 1px -1px 2px rgba(0,0,0,.50);
  -webkit-transform: rotate(110deg);
  -moz-transform: rotate(110deg);
  transform: rotate(110deg);
  -webkit-transform-origin: 1px 1px;
  -moz-transform-origin: 1px 1px;
  transform-origin: 1px 1px;
}
.label hr:before {
  content: '';
  position: absolute;
  right: -3px; top: -3px;
  height: 8px; width: 8px;
  background: #FFF;
  border-radius: 4px;
  box-shadow: 1px -1px 2px rgba(0,0,0,.50);
}

#l1 {
  left: 140px; bottom: 30px;
  -webkit-transform: translateZ(50px);
  -moz-transform: translateZ(50px);
  transform: translateZ(50px);
}
#l1 hr {width: 30px;}

#l2 {
  left: 190px; bottom: 70px;
  -webkit-transform: translateZ(70px);
  -moz-transform: translateZ(70px);
  transform: translateZ(70px);
}
#l2 hr {width: 70px;}

#l3 {
  left: 190px; bottom: 50px;
  -webkit-transform: translateZ(30px);
  -moz-transform: translateZ(30px);
  transform: translateZ(30px);
}
#l3 hr {width: 50px;}
</style>

@endsection

@section('js')
<script>

  // $('.f4').click(function() {
  //   var image = $(this).css('background-image');
  //   console.log('=)', image);
  // });

  window.requestAnimFrame = (function() {
  return  window.requestAnimationFrame       ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame    ||
    function(callback) {
    window.setTimeout(callback, 1000 / 60);
  };
})();


var Demo = {

  loaded: 0,
  drag: false,
  speed: 0.5,
  brake: 1,
  r: 0,

  images: [
    'https://image.freepik.com/free-vector/wooden-texture_23-2147511826.jpg',
    'https://image.freepik.com/free-photo/wooden-texture_1208-334.jpg',
    'https://cdn.taburetka.ua/9t/s6/2thg20y7joux41b8rnaztlwx33yvu.jpg',
    'https://cdn.taburetka.ua/2f/ku/rqub627dkfaeb8qcyjafjrbn6pkr0.jpg',
    'https://cdn.taburetka.ua/57/2q/ev7avuc59j2hatlmjkbixw3d1kpuj.jpg',
    'https://cdn.taburetka.ua/6z/oe/ya8t811n8sv2am2593zuhtdwrlyu4.jpg'
  ],

  Down: function(e) {
    Demo.o = Demo.r;
    Demo.x = Demo.r + e.clientX;
    Demo.drag = true;
    Demo.time = new Date();
  },

  Move: function(e) {
    if (Demo.drag) {
      Demo.r = Demo.x - e.clientX;
      Demo.p.style.webkitTransform = 'rotateY(' + Demo.r * 180 / 400 + 'deg)';
      Demo.p.style.mozTransform = 'rotateY(' + Demo.r * 180 / 400 + 'deg)';
      Demo.p.style.transform = 'rotateY(' + Demo.r * 180 / 400 + 'deg)';
    }
  },

  Up: function() {
    if (Demo.drag) {
      var time = new Date() - Demo.time;
      var path = Demo.r - Demo.o;
      Demo.speed = path / time * 5;
      Demo.brake = 1.01;
      Demo.drag = false;
    }
  },

  Spin: function() {
    if (!Demo.drag) {
      Demo.r += Demo.speed;
      Demo.speed /= Demo.brake;
      Demo.p.style.webkitTransform = 'rotateY(' + Demo.r * 180 / 400 + 'deg)';
      Demo.p.style.mozTransform = 'rotateY(' + Demo.r * 180 / 400 + 'deg)';
      Demo.p.style.transform = 'rotateY(' + Demo.r * 180 / 400 + 'deg)';
    }
    window.requestAnimFrame(Demo.Spin);

  },

  Bind: function() {
    Demo.e.addEventListener('mousedown', Demo.Down, false);
    Demo.e.addEventListener('mousemove', Demo.Move, false);
    Demo.e.addEventListener('mouseup', Demo.Up, false);
    Demo.e.addEventListener('mouseleave', Demo.Up, false);
    window.requestAnimFrame(Demo.Spin);
  },

  Progress: function() {
    Demo.loaded++;
    Demo.l.style.width = Demo.loaded / Demo.images.length * 100 + '%';
    if (Demo.loaded === Demo.images.length) {
      Demo.l.style.opacity = 0;
      Demo.p.style.opacity = 1;
      Demo.Bind();
    };
  },

  Load: function() {
    for (var i = 0; i < Demo.images.length; i++) {
      var img = new Image();
      img.addEventListener('load', Demo.Progress, false);
      img.src = Demo.images[i];
    }
  },

  Init: function() {
    Demo.e = document.getElementById('demo');
    Demo.p = document.getElementById('panorama');
    Demo.l = document.getElementById('loader');
    Demo.Load();
  }
};



document.addEventListener('DOMContentLoaded', Demo.Init, false);
</script>

@endsection