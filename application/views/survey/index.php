<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
    <div class="row" style="height:120px;">
        <div class="col-md-12">
            <h1>Hello <?php echo $username?>! Welcome to the survey!</h1>
        </div>
        
    </div>
    <div class="row" style="height: 90px;">
        
        <div class="col-md-10">
            <p style="font-size: 18px; ">Imagine that you are in Munich and you are doing offline shopping for clothes. <br/>You are thinking about buying <strong style="color: orange;"><?php echo $category?></strong>. Please mark the conditions that would <strong>positively</strong> or <strong>negatively</strong> influence the decision to buy it, or would have <strong>no effect</strong>.</p>
        </div>

    </div>
    <div class="row" style="height: 400px;">
        <div class="col-md-6"><img src="<?php echo $image_url; ?>" alt="..." class="img-thumbnail"></div>
        <div class="col-md-6" >
            <form role="form" action="<?php echo site_url("context_analyser/survey/$gender/")?>" method="post" style="height: 100%; font-size: 16px;">
                <div class="form-group">
                    <label for="contex1"><?php echo $question1; ?></label>
                    <div >
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context1" value="1" checked>
                            Positive    
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context1" value="2">
                            No Effect
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context1" value="3">
                            Negative
                        </label>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="contex2" ><?php echo $question2; ?></label>
                    
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context2" value="1" checked>
                            Positive    
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context2" value="2">
                            No Effect
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context2" value="3">
                            Negative
                        </label>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="contex3"><?php echo $question3; ?></label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context3" value="1" checked>
                            Positive    
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context3" value="2">
                            No Effect
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="SELECT_context3" value="3">
                            Negative
                        </label>
                    </div>
                </div>
                <input type="hidden" name="TEXT_count" id="TEXT_continue" value="<?php if($count) echo $count; else echo 1;?>">
                <input type="hidden" name="TEXT_category" id="TEXT_category" value="<?php echo $category;?>">
                
                <input type="hidden" name="TEXT_fid1" id="TEXT_fid1" value="<?php echo $fid1;?>">
                <input type="hidden" name="TEXT_fid2" id="TEXT_fid2" value="<?php echo $fid2;?>">
                <input type="hidden" name="TEXT_fid3" id="TEXT_fid3" value="<?php echo $fid3;?>">
                
                <input type="hidden" name="TEXT_value1" id="TEXT_value1" value="<?php echo $value1;?>">
                <input type="hidden" name="TEXT_value2" id="TEXT_value2" value="<?php echo $value2;?>">
                <input type="hidden" name="TEXT_value3" id="TEXT_value3" value="<?php echo $value3;?>">
                
                <div class="row" style="position: absolute; bottom: 0px;">
                    <button type="submit" class="btn btn-default btn-lg" name="BUTTON_submit" value="Submit"
                        style="width: 200px;" >Next</button>

                    <label>
                        <?php if($count) echo $count; else echo 1;?> out of <?php echo $total?>
                    </label>
                </div>
                
                
            </form>
        </div>
    </div>
</div>
