/**
 * Nodethumb
 *
 * for dealing with images uploaded in the admin area
 */
var Nodethumb = {
  keyValueId: ''
};


/**
 * functions to execute when document is ready
 *
 * @return void
 */
Nodethumb.documentReady = function() {
  //Check if the key/value already exists
  this.findMetaThumb();
  
  if(this.keyValueId)
  {
    Nodethumb.update($('#'+this.keyValueId).val(),false);
  }
}


/**
 * Update
 *
 * @return void
 */
Nodethumb.update = function(filename, updateMeta) {
  if(!updateMeta) { updateMeta = true; }

  var thumbimage = new Image();
  thumbimage.src = '/img/nodethumb/'+filename;
  
  if(updateMeta)
  {
    if(!Nodethumb.keyValueId)
    {
      Nodethumb.createMetaThumb({ onComplete: function(){ Nodethumb.update(filename, updateMeta); } });
      return false;
    }
    
    $('#'+Nodethumb.keyValueId).val(filename);
  }

  $('#nodethumbThumb').html(thumbimage);
  $('#nodethumbDetail').show();
  
  $('#nodethumbUpload .qq-upload-list').hide();
}


/**
 * Delete
 *
 * @return void
 */
Nodethumb.remove = function() {
  var aRemoveMeta = $('#'+Nodethumb.keyValueId).closest('div.meta').find('div.actions a');

  if (aRemoveMeta.attr('rel') != '') {
    $.getJSON(Croogo.basePath+'admin/nodes/delete_meta/'+$(aRemoveMeta).attr('rel')+'.json', function(data) {
        if (data.success) {
            $('#nodethumbDetail').hide();
            aRemoveMeta.parents('.meta').remove();
        } else {
            // error
        }
    });
  }
  else
  {
    aRemoveMeta.parents('.meta').remove();
    $('#nodethumbDetail').hide();
  }
}



/**
 * Find meta thumb id
 *
 * @return void
 */
Nodethumb.findMetaThumb = function() {
  $('#node-meta div.meta').each(function(){
    var keyInput = $(this).find('div.input.text input');
    if(keyInput.val() == 'thumb')
    {
      var keyValueId = keyInput.attr('id').replace('Key','Value');
      Nodethumb.keyValueId = keyValueId;
    }
  });
}


/**
 * Create a meta thumb input
 *
 * @return void
 */
Nodethumb.createMetaThumb = function(params) {
  $.get(Croogo.basePath+'admin/nodes/add_meta/', function(data) {
    $('#meta-fields div.clear').before(data);
    $('div.meta a.remove-meta').unbind();
    $('#node-meta div.meta:last div.input.text input').val('thumb');
    
    var keyValueId = $('#node-meta div.meta:last div.input.text input').attr('id').replace('Key','Value');
    Nodethumb.keyValueId = keyValueId;
    
    Admin.roundedCorners();
    
    if(params.onComplete)
    {
      if(typeof params.onComplete == 'function')
      {
        params.onComplete.call();
      }
    }
    
  });
}


/**
 * document ready
 *
 * @return void
 */
$(document).ready(function() {
  Nodethumb.documentReady();
});
