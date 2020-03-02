
<?php include 'header.php'?>
<div class="container">

<h1 class="text-center text-primary mt-5">Announcement <i class="fas fa-bell"></i></h1>

<div class="row ">

<div class="col-sm-12 col-md-6 my-5">
<div class="row mb-5">

<div class="col-4">
<a class="pop" href="#" data-toggle="modal" data-target="#exampleModal3">
<image class="clip-polygon my-3" src="img\DeathtoStock_Wired3.jpg" width="100%" height="150px" />
</a>
</div>
<div class="col-4">
<a class="pop" href="#" data-toggle="modal" data-target="#exampleModal3">
<image class="clip-polygon my-3" src="img\cc.jpg" width="100%" height="150px"/>
</a>
</div>
<div class="col-4">
<a class="pop" href="#" data-toggle="modal" data-target="#exampleModal3">
<image class="clip-polygon my-3" src="img\DeathtoStock_Wired3.jpg" width="100%" height="150px" />
</a>
</div>
<div class="col-4">
<a class="pop" href="#" data-toggle="modal" data-target="#exampleModal3">
<image class="clip-polygon my-3" src="img\cc.jpg" width="100%" height="150px"/>
</a>
</div>
<div class="col-4">
<a class="pop" href="#" data-toggle="modal" data-target="#exampleModal3">
<image class="clip-polygon my-3" src="img\DeathtoStock_Wired3.jpg" width="100%" height="150px" />
</a>
</div>
<div class="col-4">
<a class="pop" href="#" data-toggle="modal" data-target="#exampleModal3">
<image class="clip-polygon my-3" src="img\cc.jpg" width="100%" height="150px"/>
</a>
</div>

</div>
<nav >
  <ul class="pagination pagination-sm">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>


</div>
<script src="js\coolock.js"></script>

<div class="col-sm-12 col-md-6 d-flex flex-column mb-5">
<div class="text-center my-5">
<div id="coolockWrapper"></div>

<script>
var anotherCoolock = new Coolock({size: 150, canvasId: 'anotherCoolock', strokeColor: '#00a'});
</script>

</div>
<div class="d-flex justify-content-center">
<div id="my-calendar">
<div class="auto-jsCalendar classic-theme"></div>
</div>
</div>





<link rel="stylesheet" href="css\jsCalendar.min.css">

<script src="js\jsCalendar.min.js"></script>

</div>

</div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<script>
$(function() {
    $('.pop').on('click', function() {
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    });     
});
</script>

