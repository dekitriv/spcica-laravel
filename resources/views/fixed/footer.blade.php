<!-- Main Footer -->
<footer class="main-footer" style="background-image:url({{asset('images/background/5.png')}})">
    <div class="auto-container">
        <div class="logo">
            <a href="{{route('home')}}"><img src="images/footer-logo.png" alt="" /></a>
        </div>
        <ul class="footer-nav">
            @foreach($menu as $item)
                <li><a href="{{route($item->route)}}">{{$item->name}}</a></li>
            @endforeach
        </ul>
        <ul class="social-box">
            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
            <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-youtube-play"></span></a></li>
        </ul>
        <div class="copyright">&copy; All Right Reserved 2020</div>
    </div>
</footer>
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.js')}}"></script>
<script src="{{asset('js/appear.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
