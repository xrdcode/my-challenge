<div id="floatbox" class="row floating-box">
  <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
    <div class="head">
      <center><h1>Sign Up</h1></center>
    </div>
    <?php echo form_open('user/registering', array("method" => "POST", "id" => "regForm")); ?>
    <div class="form-group">
      <!-- <label for="usernamer">Username:</label> -->
      <input type="text" class="form-control" name="username" placeholder="username" autofocus>
    </div>
    <div class="form-group">
      <!-- <label for="mail">E-Mail:</label> -->
      <input type="text" class="form-control" name="mail" placeholder="mail" autofocus>
    </div>
    <div class="form-group">
      <!-- <label for="password">Password:</label> -->
      <input type="password" class="form-control" name="password" placeholder="password" autofocus>
    </div>
    <div class="form-group">
      <!-- <label for="password">Password Confirmation:</label> -->
      <input type="password" class="form-control" name="passconf" placeholder="password confirmation" autofocus>
    </div>
    <div class="form-group">
      <input type="submit" class="form-control" value="Sign Up">
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
        <h4 class="modal-title">Sign Up Success !</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button id="signin" type="button" class="btn btn-default" data-dismiss="modal">Sign In</button>
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

  $('#regForm').submit(function(e){
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

          }
        }
      }
    });
  });

  $("#signin").click(funtion() {
    window.load(<?php echo site_url("user/login")  ?>)
  });

</script>
