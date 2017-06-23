<!-- Promo Modal -->
<!-- Override styles -->
<style type="text/css">
  .modal-dialog{
    margin: 100px auto !important;
  }
  .modal-content{
    background-color: rgba(255,255,255,0.7) !important;
  }
  .modal-body{
    padding: 0 5px 5px;
  }
  .close{
    font-size: 22px;
    font-weight: lighter;
    opacity: 1;
  }
  .close-button-container{
    border-radius: 25px;
    background-color: rgba(0,0,0,0.6);
  }
</style>


<!-- Modal window-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-body">
        <span class="close-button-container">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </span>
        <img src="/banners/black-friday/<?php echo ICL_LANGUAGE_CODE; ?>.png" style="width: 100%">
      </div>
    </div>
  </div>
</div>


 <!-- Trigger the modal -->
<script type="text/javascript">
  setTimeout(function() {
      $('#myModal').modal();
  }, 4500);
</script>