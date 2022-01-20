
<?php require_once APPROOT."/views/inc/header_doctor.php"; ?>
<script type="text/javascript">
    $(document).ready(function(){
        var messages = <?php echo json_encode($data['messages']); ?>;
        document.querySelector('.chat-box').innerHTML = messages;
    });
  </script>
  
      <!-- Messages -->
      <!-- <main role="main" class="messages col-md-9 ml-sm-auto col-lg-10 px-md-4" id="D">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Messages</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <span data-feather="calendar"></span>
              New chat
            </button>
          </div>
        </div>
        <h2 class="subtitle">Messages</h2>
        <p>Messages are here</p>
      </main> -->



      <div class="wrapper col-md-9 ml-sm-auto col-lg-10">
        <div class="content container border px-0 vh-80">
            <!-- <div class="user row align-items-center m-0 p-3">
                <div class="col-1 d-flex justify-content-center">
                    <a href="#"><i class="fas fa-chevron-left"></i></a>
                </div>
                <div class="col-2 p-0">
                    <img src="img/u1.jpg" alt="" width="45px" height="45px" class="rounded-circle" />
                </div>
                <div class="col-9 p-0">
                    <p class="my-0 lh-1 fw-bold">Nirmal Sankalana</p>
                    <p class="my-0 lh-1">active</p>
                </div>
            </div> -->


            <div class="overflow-scroll px-4 py-2 imessage d-flex chat-box">
                
            </div>



            <form action="#" class="typing-area d-flex" autocomplete="off">
                    <div class="col-10 col-md-11">
                        <input type="text" class="form-control input-field" name="message" placeholder="Typing a message here....">  
                    </div>
                    <div class="col-2 col-md-1">
                        <button class="btn btn-primary p-0 border-circle d-flex align-items-center justify-content-center sent-btn"><i class="fas fa-arrow-up" onclick="send()"></i></button>
                    </div>
            </form>
            <script src="<?php echo URLROOT; ?>/js/chat-sent-doctor.js"></script>        
         
        </div>
    </div>

      <?php require_once APPROOT."/views/inc/footer.php"; ?>