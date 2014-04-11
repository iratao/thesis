<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-bottom: 50px;">
            <h1>Please Login</h1>
        </div>
    </div>
    <div class="row">
        <?php echo validation_errors(); ?>
        <form class="form-horizontal" role="form" action="<?php echo site_url('verifylogin')?>" method="post">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username:</label>
                <div class="col-sm-4">
                    <input type="text" id="username" name="username" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-4">
                    <input type="password" id="passowrd" name="password" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>
    </div>
    
</div>

