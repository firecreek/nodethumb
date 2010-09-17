<div id="nodethumb">

    <?php
        echo $this->Html->script('/nodethumb/js/fileuploader', false);
        echo $this->Html->script('/nodethumb/js/nodethumb', false);
        echo $this->Html->css('/nodethumb/css/fileuploader', false);
    ?>

    <div id="nodethumbUpload">       
        <noscript><p>Please enable JavaScript to use file uploader.</p></noscript>         
    </div>

    <div id="nodethumbDetail" style="display:none;"> 
        <div id="nodethumbThumb"></div>
        <p><a href="#" onclick="Nodethumb.remove(); return false;">Delete Image</a></p>
    </div>

    <script type="text/javascript"><!--//
        var uploader = new qq.FileUploader({
            element: document.getElementById('nodethumbUpload'),
            action: Croogo.basePath+'admin/nodethumb/nodethumb/upload.json',
            onSubmit: function() { $('#nodethumbUpload .qq-upload-list').show(); },
            onComplete: function(id, fileName, response){
                if(response && response.success)
                {
                    Nodethumb.update(response.filename);
                }
            }
        }); 
    //--></script>

</div>
