<div id="div-error-msg" class="text-danger mb-3">
    <?php 
        echo implode('<br>',$this->arrErrorMsg) 
        // 알러트로 처리하고 싶을때
        // if(!empty($this->arrErrorMsg)) {
        //     echo "<script>alert('".implode('\n',$this->arrErrorMsg)."');</script>";
        // }
    ?>
</div>