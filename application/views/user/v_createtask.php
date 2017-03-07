<div class="row">
  <?php echo form_open($action, array("method" => "POST", "id" => "addTask")); ?>
  <div class="col-md-6">
    <div class="form-group">
      <input name="title" type="text" class="form-control" placeholder="Task Name">
    </div>
    <div class="form-group">
      <textarea name="desc"  class="form-control" placeholder="Task Description" rows="4"></textarea>
    </div>

  </div>
  <div class="row">
    <div class="col-md-5">
      <div class="form-group">
         <div class='input-group date' id='datetimepicker1'>
             <input name="duedate" type='text' class="form-control" />
             <span class="input-group-addon">
                 <span class="glyphicon glyphicon-calendar"></span>
             </span>
         </div>
     </div>
     <div class="form-group">
       <?php
        foreach($prior as $row) {
          ?>
          <label class="radio-inline">
            <input type="radio" name="prior" value="<?php echo $row->priorityid; ?>"><?php echo $row->name ;?>
          </label>
          <?php
        }
       ?>
     </div>
     <input type="submit" class="btn btn-default pull-right" placeholder="" value="Create Task">
    </div>
  </div>
  <?php echo form_close(); ?>
</div>

<div id="respModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
    $('#datetimepicker1').datetimepicker({
      format: "YYYY-MM-DD HH:mm"
    });

    $('#addask').submit(function(e){
      e.preventDefault();
      var me = $(this);

      $.ajax({
        url: me.attr('action'),
        method: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if(response.success == true) {
            $(".modal-title").html("");
            $(".modal-title").html("<h4>Success !</h4>");
            $(".modal-body").html("");
            $(".modal-body").html("<p>" + response.messages + "</p>");
            $('#respModal').modal('show');
            $("div.form-group").removeClass('has-error').find('.text-danger').remove();
          } else {
            if(response.formValid != true) {
              $.each(response.messages, function(key, value) {
                var elem = $('[name=' + key + ']');
                elem.closest('div.form-group')
                .removeClass('has-error')
                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                .find('.text-danger').remove();
                elem.after(value);
              })
            } else {
              $(".modal-title").html("");
              $(".modal-title").html("<h4>Error !</h4>");
              $(".modal-body").html("");
              $(".modal-body").html("<p>" + response.messages + "</p>");
              $('#respModal').modal('show');
              $("div.form-group").removeClass('has-error').find('.text-danger').remove();
            }
          }
        }
      });
    });


</script>
