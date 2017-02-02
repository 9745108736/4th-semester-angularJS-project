<!-- jquery.min.js and bootstrap.min.js are already plugged in -->
<div>
    <div style="background-color:black;height:1.2px;">
    
        
    </div>
</div>
<footer>
<div class="container-fluid">
<div class="row cols-wrapper">
    <div class="footer">
    <div class="container">
        <div class="sketch">
            <div class="col-md-3">
                <h2>Sketch</h2>
            </div>
        </div>
        <div class="address">
            <div class="col-md-3">
                <h2>Quick Links</h2>
                <p><a href="#"><i class="fa fa-globe"></i>Read more</a></p>
                <p><a href="#"><i class="fa fa-globe"></i>Read more</a></p>
            </div>
        </div>
        <div class="address">
            <div class="col-md-3">
                <h2>Address</h2>
                <p><i class="fa fa-map-marker fa-1x"></i>Sullamussalam Science College Areacode</p>
                <p><i class="fa fa-phone fa-1x"></i>0483 - 2850 700</p>
                <p><i class="fa fa-fax fa-1x"></i>Fax: 0483 - 2854 544</p>
                <p><i class="fa fa-envelope fa-1x"></i>mail@sscollege.ac.in</p>
                <p><i class="fa fa-globe fa-1x"></i>www.sscollege.ac.in</p>
            </div>
        </div>
        <div class="map">
            <div class="col-md-3">
                <h2>Map</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15653.501095788972!2d76.03016415298943!3d11.233780099999995!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba64654cd92a7ad%3A0x9cbddeb7aae23a7b!2sSullamussalam+Science+College!5e0!3m2!1sen!2sin!4v1460279564464" class="map-frm"  frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    </div>
    <center>
        <div class="foot">
            <p>Copyrights @ 2016. All Rights Reserved | Designed and Developed by Development Team of B.Voc Software</p>
        </div>
    </center>    
</div>
</div>
</footer>
    <script type="text/javascript">
$(document).ready(function($) {
    if (screen.width<768){
        $('.navbar-fixed-top').css('top','0');
    }
    $(window).scroll(function () {
        if ($(this).scrollTop() > 15) {
            $('.navbar-fixed-top').css('top','0');
        } else if(screen.width>768){
            $('.navbar-fixed-top').css('top','20px');
        }
    });
});
</script>
<script>
    $(window).load(function(){
        $('#overlay').slideUp(1000);
    });
</script>