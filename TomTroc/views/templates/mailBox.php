<?php
    /**
     *  Page Mon compte
     */
?>
<section class="myMessages-section">
    <div class="myMessages-container">
        <div class="messages">
            <div>
                <h2>Messagerie</h2>
            </div>
            <div class="allMesages">
                <div class="message-preview-row">
                    <div class="message-preview-picture">
                        <img src="views/assets/user-image.jpg" width="48px" height="48px" alt="">
                    </div>
                    <div class="message-preview-group">
                        <div class="message-preview-header">
                            <div class="sender">Pseudo</div>
                            <div class="created-at"><span>??:??</span></div>
                        </div>
                        <div class="message-preview-detail">
                            blablabla
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tchat">
            <div class="tchat-recipient">
                <img src="views/assets/user-image.jpg" width="38px" height="38px" alt="">
                <span>????</span>
            </div>
            <div class="tchat-conversation">
                <div class="">
                    <div class="date-message">
                        <img src="views/assets/user-image.jpg" width="38px" height="38px" alt=""><span>??.?? ??:??</span>
                    </div>
                    <div class="message-details">
                        <p>???? ?? ?? ? ?????? ?? ? ?</p>
                    </div>    
                </div>
            </div>
            <div class="tchat-new-message">
                <input type="text" placeholder="Taper votre message ici"><button class="btn btn-send-message">Envoyer</button>
            </div>
        </div>     
    </div>
</section>