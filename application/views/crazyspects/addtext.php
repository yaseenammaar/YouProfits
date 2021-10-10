<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta name="theme-color" content="#000000" />
    <link rel="icon" href="<?php echo base_url('img/iconh.png') ?>" type="image/gif" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/color.css') ?>">
    <link href="https://unpkg.com/@blueprintjs/icons@^3.4.0/lib/css/blueprint-icons.css" rel="stylesheet" />
    <link href="https://unpkg.com/@blueprintjs/core@^3.10.0/lib/css/blueprint.css" rel="stylesheet" />
    <link href="https://unpkg.com/@blueprintjs/popover2@0.11.0/lib/css/blueprint-popover2.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
   <link href="<?php echo base_url() ?>css/style.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    *{
        color: #4fc3f7!important;
    }
    .bp3-navbar{
        background-color: #323232;
    }
    .bp3-tab[aria-selected="true"], .bp3-tab:not([aria-disabled="true"]):hover{
       color: #4fc3f7!important; 
    }
    .bp3-large > .bp3-tab {
            color: #4fc3f7;
    }
    body {
        margin: 0;
        padding: 0
    }
    #root {
        width: 100vw;
        height: 100vh
    }
    .bp3-control-indicator{
        display:none!important;
    }
    label{
        width:100%!important;
    }
    .bp3-icon-help{
        display:none!important;
    }
/*    .polotno-panel-container{
        display:none;
    }*/
    /*.go298234575 .bp3-control.bp3-switch.bp3-align-right{
        display:none;
    }*/
    label .bp3-button{
      background-color: #323232!important;
      border-style: solid;
      border-color: white;
      background-image:unset!important;
    }
    @media screen and (max-width: 500px){
    .go3463184378{
width:25%!important;
height: 72px!important;
    }
}
.go3463184378{
    height:77px!important;
}
.go2357475308{
 background-color: #323232;
}
.go298234575.bp3-navbar.polotno-panel-container{
  background-color: #323232;  
}
.bp3-button-text{
  color: #4fc3f7;  
}
.go3436411437.bp3-navbar{
 background-color: #323232;
}
path{
    color:#4fc3f7; 
}
.loader {
  height: 0;
  width: 0;
  padding: 15px;
  border: 6px solid #ccc;
  border-right-color: #888;
  border-radius: 22px;
  -webkit-animation: rotate 1s infinite linear;
  /* left, top and position just for the demo! */
  position: absolute;
  left: 50%;
  top: 50%;
  margin-left:16%;
}
.loader2 {
  height: 0;
  width: 0;
  padding: 15px;
  border: 6px solid #ccc;
  border-right-color: #888;
  border-radius: 22px;
  -webkit-animation: rotate 1s infinite linear;
  /* left, top and position just for the demo! */
  position: absolute;
  left: 50%;
  top: 50%;
}

@-webkit-keyframes rotate {
  /* 100% keyframe for  clockwise. 
     use 0% instead for anticlockwise */
  100% {
    -webkit-transform: rotate(360deg);
  }
}
.preloader {
    background: #333333!important;
}

.preloader {
    width: 100%;
    height: 100%;
    top: 0px;
    position: fixed;
    z-index: 99999;
    background: #fff;
}
    </style>
    <title><?php echo $title ?></title>
</head>

<body style="background:#333333!important;">

   <?php include('include/header.php') ?>
   <div class="loading" style="display:none;">
   <div class="loader2"></div>
   <h3 style="position: absolute;
    left: 46%;
    top: 55%;">Rendering...</h3>
    <p style="position: absolute;
    left: 46%;
    top: 60%;">Sit back, this may take a while.</p>
   </div>
   <div class="preloader" style="display:none;">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
            <p style="margin-top: 61px;
    width: 200px;
    font-size: 20px;
    margin-left: -28px;
    color: black;">Rendering...</p>
            <p style="width: 234px;
    margin-top: -16px;
    margin-left: -74px;">Sit back, this may take a while.</p>
        </div>
        
    </div>
    <div id="root">
        
    </div>

    <script>
    
    ! function(l) {
        function e(e) { for (var r, t, n = e[0], o = e[1], u = e[2], f = 0, i = []; f < n.length; f++) t = n[f], p[t] && i.push(p[t][0]), p[t] = 0; for (r in o) Object.prototype.hasOwnProperty.call(o, r) && (l[r] = o[r]); for (s && s(e); i.length;) i.shift()(); return c.push.apply(c, u || []), a() }

        function a() { for (var e, r = 0; r < c.length; r++) { for (var t = c[r], n = !0, o = 1; o < t.length; o++) { var u = t[o];
                    0 !== p[u] && (n = !1) } n && (c.splice(r--, 1), e = f(f.s = t[0])) } return e } var t = {},
            p = { 1: 0 },
            c = [];

function f(e) { if (t[e]) return t[e].exports; var r = t[e] = { i: e, l: !1, exports: {} }; return l[e].call(r.exports, r, r.exports, f), r.l = !0, r.exports } f.m = l, f.c = t, f.d = function(e, r, t) { f.o(e, r) || Object.defineProperty(e, r, { enumerable: !0, get: t }) }, f.r = function(e) { "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 }) }, f.t = function(r, e) { if (1 & e && (r = f(r)), 8 & e) return r; if (4 & e && "object" == typeof r && r && r.__esModule) return r; var t = Object.create(null); if (f.r(t), Object.defineProperty(t, "default", { enumerable: !0, value: r }), 2 & e && "string" != typeof r)
                for (var n in r) f.d(t, n, function(e) { return r[e] }.bind(null, n)); return t }, f.n = function(e) { var r = e && e.__esModule ? function() { return e.default } : function() { return e }; return f.d(r, "a", r), r }, f.o = function(e, r) { return Object.prototype.hasOwnProperty.call(e, r) }, f.p = "/"; var r = window.webpackJsonp = window.webpackJsonp || [],
            n = r.push.bind(r);
        r.push = e, r = r.slice(); for (var o = 0; o < r.length; o++) e(r[o]); var s = n;
        a() }([])
    </script>
    <script src="<?php echo base_url() ?>/static/js/2.b8590e90.chunk.js"></script>
    <script src="<?php echo base_url() ?>/static/js/main.67b92b19.chunk.js"></script>
    <script>
    
    $( ".go1798861395 .go3463184378:nth-child(1)").click();
     $( ".go1798861395 .go3463184378:nth-child(1)").remove();
    $( ".go1798861395 .go3463184378:nth-child(1)").remove();
    $( ".go1798861395 .go3463184378:nth-child(3)").remove();
    $( ".go1798861395 .go3463184378:nth-child(5)").remove();
    $( ".go1798861395 .go3463184378:nth-child(6)").remove();
    $( ".go1798861395 .go3463184378:nth-child(4)").remove();
    $( ".go1798861395 .go3463184378:nth-child(1)").click();
    // $( ".go1798861395 .go3463184378:nth-child(2)").remove();
    $( ".go1798861395 .go3463184378:nth-child(3)").remove();
    // $( ".go1798861395 .go3463184378:nth-child(2)").remove();
    $(window).load(function() {
       $(".preloader").hide();
    });
    setInterval(function(){
         $('.go4160152499 .bp3-spinner').remove(); 
         
        },1000);
    
    
        // $( ".go1798861395 .go3463184378:nth-child(5)").remove();
        // $('.go298234575 div p').remove();
        
    //   setTimeout(function() {
       
    //     console.clear() 
    //   }, 1000);
        
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>