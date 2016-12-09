<div class="container">
       <!-- Fixed navbar -->

        <div class="contenido">
            
        
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12" style="margin-top: 10%;">
                <div class="panel panel-default">
                  <div class="panel-body">
                        <form action="<?php echo APP_URL."/users/login";?>" method="post" >
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Your Name</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                            </div>
                        </div>
                        <input type="submit"  class="btn btn-primary" value=" Login "/><br />
                        </form>
                  </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
            </div>
        </div>
        </div>
    </div>



