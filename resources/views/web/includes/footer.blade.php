<!-- footer section start -->
<div class="footer_section layout_padding">
   <div class="container">
      <div class="footer_logo"><a href="index.html"><img src="{{asset('theme/images/profile_footer.png')}}"></a></div>
      <div class="input_bt">
         <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
         <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
      </div>
      <div class="footer_menu">
         <ul>
            <li><a href="#">Best Sellers</a></li>
            <li><a href="#">Gift Ideas</a></li>
            <li><a href="#">New Arrival</a></li>
            <li><a href="#">Today's Deals</a></li>
            <li><a href="#">Customer Service</a></li>
         </ul>
      </div>
      <div class="location_main">Help Line Number : <a href="#">+92 303 5528 404</a></div>
   </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
   <div class="container">
      <p class="copyright_text">© {{ date('Y') }} All Rights Reserved. Developed by <a href="https://theelitetechnology.com/">EliteTech</a></p>
   </div>
</div>
<!-- copyright section end -->

<form action="{{route('cart')}}" method="get" class="float" id="CartInstantView">
   <a class="float cursor-pointer" onclick="$('#CartInstantView').submit();">
   <span id="noOfItems">2</span> <span id="cartItemSpell">items</span> added to cart
   <i class="fa fa-2x fa-shopping-cart my-float"></i>
   <input type="hidden" name="items" id="cartItemsValue">
   </a>
</form>
<!-- Javascript files-->
<script src="{{asset('theme/js/jquery.min.js')}}"></script>
<script src="{{asset('theme/js/popper.min.js')}}"></script>
<script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('theme/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('theme/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('theme/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('theme/js/custom.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script>
   function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
   }

   function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
   }
</script>
</body>

</html>