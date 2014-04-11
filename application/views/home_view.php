<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
    <div style="margin-bottom: 50px;">
        <h1>Hello <?php echo $username?></h1>
        <p>
            I would like to invite you to this survey. Through this survey, we 
            would like collect data for the study of the influence of context 
            factors to users' offline shopping behavior. <br/>
            In this survey, all the information will be anonymously recorded.          
            If you are fine with all statements above. Please go ahead.
        </p>
        <p>
            If you are a woman, please click button "survey(women)". If you are a 
            men, please click button "survey(men)". <br/>
        </p>
    </div>
    
    
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <a class="btn btn-default btn-lg" href="context_analyser/survey/women">Go to survey (Women)</a>
        </div>
        <div class="col-md-4">
            <a class="btn btn-default btn-lg" href="context_analyser/survey/men">Go to survey (Men)</a>
        </div>
        
    </div>
    
</div>
