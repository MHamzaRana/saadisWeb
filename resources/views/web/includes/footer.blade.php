<!-- footer section start -->
<div class="footer_section layout_padding">
   <div class="container">
      <div class="footer_logo"><a href="{{route('home')}}"><img alt="Saadi's Collection" src="{{asset('theme/images/profile_footer.png')}}"></a></div>
      <div class="input_bt">
         <!-- <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email"> -->
         <!-- <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span> -->
         <p>Saadi's Collection is an online store for ladies' original branded suits. At Saadi's Collection, you will find ladies' suits of all renowned brands at discount prices.</p>
      </div>
      <div class="footer_menu items">
         <ul>
            <li><a href="{{route('explore','best-seller')}}">Best Sellers</a></li>
            <li><a href="{{route('explore','all-collections')}}">All Collections</a></li>
            <li><a href="{{route('explore','new-arrival')}}">New Arrival</a></li>
            <li><a href="{{route('explore','today-deal')}}">Today's Deals</a></li>
            <li><a href="{{route('customer-service')}}">Customer Service</a></li>
         </ul>
      </div>
      <div class="location_main">Help Line Number : <a href="https://wa.me/+923035528404">+92 303 5528 404</a></div>
      <div class="footer_menu social">
         <ul>
            <li><a class="facebook-btn" href="https://facebook.com/saadicollectionpk/" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a class="instagram-btn" href="https://instagram.com/saadiscollection1/" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a class="youtube-btn" href="https://youtube.com/@Saadis.Collection/" target="_blank"><i class="fa fa-youtube"></i></a></li>
         </ul>
      </div>
   </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
   <div class="container">
      <p class="copyright_text">© {{ date('Y') }} All Rights Reserved. Developed by <a target="_blank" href="https://theelitetechnology.com/">EliteTech</a></p>
   </div>
</div>
<!-- copyright section end -->


   <a class="float-top" target="_blank" href="https://wa.me/+923035528404">
   <i class="fa fa-3x fa-whatsapp my-float"></i>
   </a>

<form action="{{route('cart')}}" method="get" class="float" id="CartInstantView">
   
   <a class="float cursor-pointer" onclick="$('#CartInstantView').submit();">
   <span id="noOfItems">2</span> <span id="cartItemSpell">items</span> added to cart
   <i class="fa fa-2x fa-shopping-cart my-float"></i>
   <input type="hidden" name="items" id="cartItemsValue">
   <!-- <input type="hidden" name="user" id="userPhone"> -->
   </a>
</form>

<!-- modal section -->
@stack('modal')
<!-- modal section end -->
<!-- Javascript files-->
<!-- IN APP.js <script src="{{asset('theme/js/jquery.min.js')}}"></script> -->
<!-- IN APP.js <script src="{{asset('theme/js/popper.min.js')}}"></script> -->
<!-- IN APP.js <script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- IN APP.js <script src="{{asset('theme/js/jquery-3.0.0.min.js')}}"></script> -->
<!-- commented scripts  -->
<!-- <script src="{{asset('theme/js/plugin.js')}}"></script> -->
<!-- sidebar -->
<!-- <script src="{{asset('theme/js/jquery.mCustomScrollbar.concat.min.js')}}"></script> -->
<!-- end commented scripts  -->
<!-- IN APP.js <script src="{{asset('theme/js/custom.js?v=0.01')}}"></script> -->
<!-- IN APP.js <script src="{{asset('js/custom.js')}}"></script> -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script>
   function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
   }

   function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
   }

   function openMobileNav() {
      document.getElementById("mobileSidenav").style.width = "100%";
   }

   function closeMobileNav() {
      document.getElementById("mobileSidenav").style.width = "0";
   }
</script>

@stack('scripts')

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-C130MXJTNY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-C130MXJTNY');
</script>
<!-- Google tag (gtag.js) End -->
</body>

</html>