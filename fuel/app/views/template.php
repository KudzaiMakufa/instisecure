


 
<head>
    <?php echo Asset::css(array(
      'bootstrap.css',
      'template.css',
      'sidetemp.css',
      'bootstrapOrg.css',
      'bootstrap.min.css',
      'font-awesome/css/font-awesome.min.css',
    )); ?>

    <?php  echo Asset::js(array(
      'jquery.min.js',
      'bootstrap.min.js',
      'jquery-ui.min.js',
  ));?>
</head>

<body>
   <nav class="navbar navbar-default no-margin">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header fixed-brand">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
</button>
         <a class="navbar-brand" href="#"><i class="fa fa-rocket fa-4"></i>Asset Management </a>
      </div>
      <!-- navbar-header-->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
            <li class="active">
               <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
               </button>
            </li>
         </ul>
      </div>
      <!-- bs-example-navbar-collapse-1 -->
   </nav>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <li class="active">
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dasboard</a>
            </li>

            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cog fa-stack-1x "></i></span> Administration </a>
               <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="<?php echo Uri::base(false).'asset/create' ; ?>">Register Asset</a></li>
                  <li><a href="<?php echo Uri::base(false).'assettype' ; ?>">Asset Types</a></li>
                  <li><a href="<?php echo Uri::base(false).'post' ; ?>">View Messages</a></li>
               </ul>
            </li>
            
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-child fa-stack-1x "></i></span>Student</a>
               <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="<?php echo Uri::base(false).'asset' ; ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>My Assets</a></li>
                  <li><a href="<?php echo Uri::base(false).'post/create' ; ?>"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Message Sec Dept</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Overview</a>
            </li>
            <li>
               <a href="#"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Events</a>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>About</a>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Services</a>
            </li>
            <li>
               <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Contact</a>
            </li>
         </ul>
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper">
         <div class="container-fluid xyz">
            <div class="row">
               <div class="col-lg-12">
                            
                        <div class="main">
                            
                        <?php if (Session::get_flash('success')): ?>
                                    <div class="alert alert-success">
                                        <strong>Success</strong>
                                        <p>
                                        <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                                        </p>
                                    </div>
                        <?php endif; ?>
                        <?php if (Session::get_flash('error')): ?>
                                    <div class="alert alert-danger">
                                        <strong>Error</strong>
                                        <p>
                                        <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                                        </p>
                                    </div>
                        <?php endif; ?>
                            

                            <?php echo $content ; ?>
                        <!-- Content Here -->
                        </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /#page-content-wrapper -->
   </div>
   <!-- /#wrapper -->

   <script>
       
       $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled-2");
   $('#menu ul').hide();
});

function initMenu() {
   $('#menu ul').hide();
   $('#menu ul').children('.current').parent().show();
   //$('#menu ul:first').show();
   $('#menu li a').click(
      function() {
         var checkElement = $(this).next();
         if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
         }
         if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
         }
      }
   );
}
$(document).ready(function() {
   initMenu();
});
   </script>
   <!-- jQuery -->

</body>

</html>