<div style="position: fixed; top:10px; right:10px; z-index:9;padding:10px;border-radius:5px;cursor:pointer;" id="notificacao">
   <?php 
        $cor = "#dc3545";
        $sms = "Erro";
        if(isset($_GET['status']) and !empty($_GET['status'])){ 
            if($_GET['result'] == "ok"){
                $cor = "#28a745";
                $sms = "Sucesso";
            }
            ?>
            <div style="padding:10px;border-radius:5px;background:<?php echo $cor; ?>;color:white;text-transform:uppercase;">
                <h4 style="margin:0;"><?php echo $_GET['status'];?></h4>
                <p style="margin:0;"><?php echo $sms;?> ao <?php echo $_GET['action'];?></p>
            </div>
        <?php }
   ?>
</div>
<script>
    setTimeout(function(){
        $("#notificacao").hide("slow");
    },5000);
    $("#notificacao").click(function(){
        $("#notificacao").hide("fast");
    });
</script>