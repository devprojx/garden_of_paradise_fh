<?php
 session_start();
 $page = 1;
 require('../services/ImageService.php');
 $title = "Gallery Management";
 require_once('admin-sidebar.php');
?> 
<style>
.controls{
    width:50px;
    display:block;
    font-size:11px;
    padding-top:8px;
    font-weight:bold;
}
.next {
    float:right;
    text-align:right;
}
</style>
<?php
    if(!isset($_GET['id'])){
        header('Location: ./album-management.php');
    }
    $imageService = new ImageService();
    if(isset($_GET['img_id']) && isset($_GET['delete'])){
        $imageService->delete($_GET['img_id']);
         header('Location: ./gallery-management.php?id='.$_GET['id']);
    }
    
    $imageList = $imageService->getImagesbyLimit(1, 20, $_GET['id']);
?>

<div class="container" style="padding-right: 50px;">
   <a href="./album-management.php" class="btn btn-danger" style="margin-bottom: 20px;">Back To Album</a>
  <form action="../actions/gallery-upload-action.php" method="post" enctype="multipart/form-data">
         <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-danger  alert-dismissible" role="alert"  id="error-alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
            <?php if($_GET['error'] == 20): ?>
                Cannot upload more than 20 images per album
            <?php endif; ?>
            <?php if($_GET['error'] == 0): ?>
                You must supply at least one image
            <?php endif; ?>
            <?php if($_GET['error'] == 1): ?>
                All Image formats must be either PNG or JPEG
            <?php endif; ?>
            <?php if($_GET['error'] == 9): ?>
               Server error. contact admin.
            <?php endif; ?>
        </div>
       <?php endif; ?>
        <div style="max-width: 400px; height:auto; background-color:#fff;padding: 20px">
           <div class="row">
            <div class="form-group col-md-9">
                <label for="exampleInputFile">Click To select images to upload</label>
                <input type="file" name="files[]" id="exampleInputFile" multiple>
                <input type="hidden" name="album" id="" value=<?= $_GET['id'] ?>>
                <p class="help-block">Limited to 20 Images (JPEG or PNG)</p>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-warning" style="margin-top: 20px;">Upload</button>
            </div>
        </div>
    </div>
   </form>
    <div class="row">
   
     <?php $i = 0; foreach($imageList as $image) :?>
  	    <div class="col-xs-3">
          <a href="<?= './gallery-management.php?id='.$_GET['id'].'&img_id='.$image['id'].'&delete=yes' ?>" > <span class="glyphicon glyphicon-remove" style="color:red;"></span></a>
          <a href="#" class="thumbnail">
              <img src="<?= '..\\uploads\\'.$image['path'] ?>" />
          </a>
        </div>
        <?php endforeach; ?>
         <?php if(count($imageList) < 1): ?>
          <div style="margin-bottom: 60px;">
            <center><h3>No Images has been added to this album as yet </h3></center>
          </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php require_once('admin-footer.php'); ?>
<script>
    $(document).ready(function(){
   $('a img').on('click',function(){
        var src = $(this).attr('src');
        var img = '<img src="' + src + '" class="img-responsive"/>';

          //Start of new code
        var index = $(this).parent('a').index();
        var html = '';
        html += img;
        html += '<div style="height:25px;clear:both;display:block;">';
        html += '<a class="controls next" href="'+ (index+2) + '">next &raquo;</a>';
        html += '<a class="controls previous" href="' + (index) + '">&laquo; prev</a>';
        html += '</div>';
        //End of new code

        $('#myModal').modal();
        $('#myModal').on('shown.bs.modal', function(){
            $('#myModal .modal-body').html(img);
        });
        $('#myModal').on('hidden.bs.modal', function(){
            $('#myModal .modal-body').html('');
        });
   });
})
</script>
