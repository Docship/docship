
<?php require_once APPROOT."/views/inc/header_patient.php"; ?>
<script type="text/javascript">
    $(document).ready(function(){
        console.log("ready function");
        var messages = <?php echo json_encode($data['messages']); ?>;
        document.querySelector('.chat-box').innerHTML = messages;
    });
  </script>


      <div class="wrapper col-md-9 ml-sm-auto px-0 col-lg-10">
        <div class="content container border px-0">
            <div class="overflow-scroll px-0 py-2 imessage d-flex chat-box">
                
            </div>

            <form action="#" class="typing-area d-flex" autocomplete="off">
                    <div class="col-10 col-md-11">
                        <input type="text" class="form-control input-field" name="message" placeholder="Typing a message here....">  
                    </div>
                    <div class="col-2 col-md-1">
                        <button class="btn btn-primary p-0 border-circle d-flex align-items-center justify-content-center sent-btn"><i class="fas fa-arrow-up" onclick="send()"></i></button>
                    </div>
            </form>
            <script src="<?php echo URLROOT; ?>/js/chat-sent-patient.js"></script>        
          
        </div>
    </div>

      <?php require_once APPROOT."/views/inc/footer.php"; ?>
