<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
  <title>crafticle</title>
  <!--jQuery Sources-->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
// Change JQueryUI plugin names to fix name collision with Bootstrap.
$.widget.bridge('uitooltip', $.ui.tooltip);
$.widget.bridge('uibutton', $.ui.button);
</script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <link type="text/css" href="stylesheets/index.css" rel="stylesheet" />
  <link type="text/css" href="stylesheets/core.css" rel="stylesheet" />
  <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
  <link type="text/css" href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet" />
  <link type="text/css" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />
  <meta name="theme-color" content="#ffffff">
  <meta name="twitter:image" content="http://fplusplus.projects.codetn.org/images/brand.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!--Twitter follow Widget-->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

  <script>
 $(document).ready(function() {
    $(".input-group").mouseenter(function() {
      $(".input-group").css("opacity", ".95");
    });
    $(".input-group").mouseleave(function() {
      $(".input-group").css("opacity", "0");
    });
    $("#button").click(function() {
      $("#name").hide();
      $(".input-group").animate({top: '10%'});
      $(".input-group").css("opacity", "1");
      //$(".results").animate({top: '30%', right: '10%'});
      $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "fetchCrafts.php?query=" + $("#search").val(),             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $(".results").html(response); 
        }

    });
});
     $('#search').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $('#button').click();//Trigger search button click event
        }
    });
 });
    $(function() {
      var availableMaterials = [
      "Paper","Aluminum","Paper Bags","Grocery Bags","Aluminum Cans","Cans",
      "Soda Cans","Soda Bottles","Bottles","Carton"
      ];
      $( "#search" ).autocomplete({
        source: availableMaterials
      });
    });
  </script>
</head>
<body style="overflow-y: scroll">
  <!-- NAVBAR-->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!--Navbar header-->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#whyRecycle-navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://fplusplus.projects.codetn.org"><img alt="brand" src="images/brand.png" style="width: 32px; height: 37px"></a>
      </div>
      <!-- Navbar Body -->
      <div class="collapse navbar-collapse" id="whyRecycle-navbar-collapse">
        <ul class="nav navbar-nav">
         <li class="active"><a>Home</a></li>
         <li><a href="locations">Locations</a></li>
         <li><a href="about">About Us</a></li> 
       </ul>
     </div><!-- /.navbar-collapse -->
   </div><!--/.container-fluid-->
 </nav>

 <!-- CENTER FEATURE -->
 <div class="why">
    <div class="input-group ui-widget">
      <input type="text" class="form-control" placeholder="Enter a material you wish to recycle!" id="search" style="display: inline-block;"/>
      <button class="uibutton" type="button" id="button" style="display: inline-block;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
    </div><!-- /input-group -->
    <a id="name">
      <h1 class="center-brand" style="color: white">crafticle</h1>
      <!--just moved from title to p-->
      <p><br>Recycling through arts and crafts</p>
    </a>

<div class="container-fluid results" style="margin-top:60px;">
</div>

</div><!--/#container-->
<!-- FOOTER doesnt work with more than one project so rip
<div id="footer">
      <footer>
        <p style="display: inline-block; margin-right:5px;">Statistics gathered from the <a href="http://www3.epa.gov/">US E.P.A.</a>
        &middot;Contact us at <a href="farragutplusplus@gmail.com">farragutplusplus@gmail.com</a></p>
<a href="https://twitter.com/teamfplusplus" class="twitter-follow-button" data-show-count="false" style="display: inline-block">Follow @teamfplusplus</a>
      </footer>
</div>
-->
</body>
</html>
