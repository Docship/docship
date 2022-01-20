<?php require_once APPROOT."/views/inc/header_admin.php"; ?>
<!-- Messages -->
  
    
  <div class="wrapper col-md-9 ml-sm-auto px-0 col-lg-10">
        <div class="content container border px-0 ">
            <div class="user row align-items-center m-0 p-3 border-bottom">
                <div class="col-1 d-flex justify-content-center">
                    <a href="#"><i class="fas fa-chevron-left"></i></a>
                </div>
                <div class="col-2 p-0">
                    <img src="<?php echo URLROOT; ?>/img/user.png" width="40px" height="40px" alt=""  class="rounded-circle" />
                </div>
                <div class="col-9 p-0">
                    <p class="my-0 lh-1 fw-bold">Nirmal Sankalana</p>
                    <p class="my-0 lh-1">active</p>
                </div>
            </div>

            <div class="overflow-scroll px-0 py-2 imessage message-admin d-flex chat-box">
                
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
