<?php ?>
<style>
#myCarousel .carousel-item .mask {
    position: absolute;
    top: 0;
	left:0;
	height:100%;
    width: 100%;
    background-attachment: fixed;
}
#myCarousel h4{
	font-size:50px;
	margin-bottom:15px;
	color: black;
	line-height:100%;
	letter-spacing:0.5px;
	font-weight:600;
}
#myCarousel p{
	font-size:18px;
	margin-bottom:15px;
	color:#a8a7a7;
}
#myCarousel .carousel-item a{background:#d8c47f; font-size:14px; color:#FFF; padding:13px 32px; display:inline-block; }
#myCarousel .carousel-item a:hover{background:#ac9f6d; text-decoration:none;  }

#myCarousel .carousel-item h4{-webkit-animation-name:fadeInLeft; animation-name:fadeInLeft;} 
#myCarousel .carousel-item p{-webkit-animation-name:slideInRight; animation-name:slideInRight;} 
#myCarousel .carousel-item a{-webkit-animation-name:fadeInUp; animation-name:fadeInUp;}
#myCarousel .carousel-item .mask img{-webkit-animation-name:slideInRight; animation-name:slideInRight; display:block; height:auto; min-width: 650px; max-width:100%;}
#myCarousel h4, #myCarousel p, #myCarousel a, #myCarousel .carousel-item .mask img{-webkit-animation-duration: 1s;
    animation-duration: 1.2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
#myCarousel .container {
    max-width: 1430px; 
}
#myCarousel .carousel-item{height:100%; min-height:650px; }
/* #myCarousel{position:relative; z-index:1; background:url(assets/img/bg-header.jpg) center center no-repeat; background-size:cover; } */

/* .carousel-control-next, .carousel-control-prev{height:40px; width:0px; padding:5px; top:1000px; bottom:auto; transform:translateY(1000%); background-color: #f47735; }
 */

.carousel-item {
    position: relative;
    display: none;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    transition: -webkit-transform .6s ease;
    transition: transform .6s ease;
    transition: transform .6s ease,-webkit-transform .6s ease;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-perspective: 1000px;
    perspective: 1000px;
}
.carousel-fade .carousel-item {
	opacity: 0;
	-webkit-transition-duration: .6s;
	transition-duration: .6s;
	-webkit-transition-property: opacity;
	transition-property: opacity
}
.carousel-fade .carousel-item-next.carousel-item-left, .carousel-fade .carousel-item-prev.carousel-item-right, .carousel-fade .carousel-item.active {
	opacity: 1
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-right.active {
	opacity: 0
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
	-webkit-transform: translateX(0);
	-ms-transform: translateX(0);
	transform: translateX(0)
}
@supports (transform-style:preserve-3d) {
	.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
	-webkit-transform:translate3d(0, 0, 0);
	transform:translate3d(0, 0, 0)
	}
}
.carousel-fade .carousel-item-left.active, .carousel-fade .carousel-item-next, .carousel-fade .carousel-item-prev, .carousel-fade .carousel-item-prev.active, .carousel-fade .carousel-item.active {
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
}


 
@-webkit-keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInLeft {
  from {
    opacity: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
    transform: translate3d(-100%, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInLeft {
  -webkit-animation-name: fadeInLeft;
  animation-name: fadeInLeft;
}

@-webkit-keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, 100%, 0);
    transform: translate3d(0, 100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

@-webkit-keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes slideInRight {
  from {
    -webkit-transform: translate3d(100%, 0, 0);
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.slideInRight {
  -webkit-animation-name: slideInRight;
  animation-name: slideInRight;
}

/* Fading animation */
.fadein { 
  position:relative; height:330px; width:500px; margin:0 auto;
  /* background: #ebebeb; */
   }
   
.fadein img{
  position:absolute;
  width: calc(96%);
    height: calc(94%);
    object-fit: scale-down;
}
  
.title {
  padding: 20px 0 30px;
}

.title h2 {
  font-size: 30px;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 2px;
}


.section {
  padding: 80px 0;
}
  
.product-category ul {
  padding-left: 15px;
}

.product-category ul li {
  margin-bottom: 4px;
}

.product-category ul li a {
  color: #666;
}

.product-category ul li a:hover {
  color: #000;
}


.category-box {
  background-size: cover;
  margin-bottom: 30px;
  min-height: 350px;
  position: relative;
  overflow: hidden;
  width: 100%;
}

@media (max-width: 400px) {
  .category-box {
    min-height: 250px;
  }
}

@media (max-width: 480px) {
  .category-box {
    min-height: 250px;
  }
}

.category-box.category-box-2 {
  min-height: 730px;
}

@media (max-width: 768px) {
  .category-box.category-box-2 {
    min-height: 400px;
  }
}

.category-box:hover img {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}

.category-box img {
  transition: all 0.3s ease-in-out;
  width: 100%;
  height: auto;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}

.category-box a {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.category-box .content {
  position: absolute;
  z-index: 999;
  top: 0;
  padding: 25px;
}

@media (max-width: 768px) {
  .category-box .content {
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    text-align: center;
  }
}

.category-box .content h3 {
  margin: 0;
  color: #333;
  font-size: 20px;
  font-weight: 500;
}

@media (max-width: 768px) {
  .category-box .content h3 {
    font-size: 20px;
  }
}

.category-box .content p {
  margin: 6px 0 0;
}
</style>