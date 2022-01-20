<?php require_once APPROOT."/views/inc/header_admin.php"; ?>
<!-- Messages -->
  <main role="main" class="messages col-md-9 ml-sm-auto col-lg-10 px-md-4" id="E">
  <div class="wrapper">
        <div class="content container border px-0 vh-80">
            <div class="user-list overflow-scroll px-4">
                <?php 
                    if(isset($data['users'])){
                        if(!empty($data['users'])){
                            foreach($data['users'] as $user){
                                echo '<a class="row align-items-center py-2 border-bottom mx-0 text-decoration-none" href="'.URLROOT.'/message/chat/'.$user['id'].'">
                                <div class="col-2 p-0 d-flex justify-content-center">
                                    <img src="'.URLROOT.'/img/user.png" alt="" width="45px" height="45px" class="rounded-circle" />
                                </div>
                                <div class="col-9 px-4">
                                    <p class="my-0 lh-1 font-weight-bold text-dark">'.$user['firstname'].' '.$user['lastname'].'</p>
                                    <p class="my-0 lh-1 fw-light text-dark">'.$user['role'].'</p>
                                </div>
                            </a> ';
                            }
                            
                        }else {
                            echo '<p>No any message available in the System.</p>';
                        }
                    }else {
                        echo '<p>System failure</p>';
                    }
                
                ?>
            </div>     
        </div>
    </div>
    

  </main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>