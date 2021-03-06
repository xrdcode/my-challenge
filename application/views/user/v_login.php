<div id="floatbox" class="row floating-box">
  <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
    <div class="head">
      <center><h1>Sign In</h1></center>
    </div>
    <?php echo form_open('user/loggingin', array("method" => "POST", "id" => "loginForm")); ?>
    <div class="form-group">
      <!-- <label for="usernamer">Username:</label> -->
      <input type="text" class="form-control" name="username" placeholder="username" autofocus>
    </div>
    <div class="form-group">
      <!-- <label for="password">Password:</label> -->
      <input type="password" class="form-control" name="password" placeholder="password" autofocus>
    </div>
    <div class="btn-group btn-group-justified">
      <div class="btn-group">
        <input type="submit" class="btn btn-default" id="btnSignIn" value="Sign In">
      </div>
      <div class="btn-group">
        <a href="<?php echo site_url('user/register');?>" class="btn btn-default" id="signup">Sign Up</a>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>

<div class="mymodal"> </div>
<div id="respModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign In Success !</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
$body = $("body");
$(document).on({
  ajaxStart: function() { $body.addClass("loading");    },
   ajaxStop: function() { $body.removeClass("loading"); }
});

  $('#loginForm').submit(function(e){
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
          $("#respModal").modal("show");
          window.location.replace(response.reload);
        } else {
          $.each(response.messages, function(key, value) {
            var elem = $('[name=' + key + ']');
            elem.closest('div.form-group')
            .removeClass('has-error')
            .addClass(value.length > 0 ? 'has-error' : 'has-success')
            .find('.text-danger').remove();
            elem.after(value);
          })
        }
      }
    });
  });

</script>
