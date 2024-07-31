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
            <div class="allMessages">
                <?php foreach ($lastMessages as $lastmessage) { ?>
                    <div class="message-preview-row <?php if ($lastmessage->getSenderId() == 1) {echo 'active';} ?>">
                        <div class="message-preview-picture">
                            <img src="views/assets/user-image.jpg" width="48px" height="48px" alt="">
                        </div>
                        <div class="message-preview-group">
                            <div class="message-preview-header">
                                <div class="sender"><?= $lastmessage->sender_nickname ?></div>
                                <div class="created-at"><span><?= $lastmessage->created_at->format('H:i') ?></span></div>
                            </div>
                            <div class="message-preview-detail">
                                <p><?= $lastmessage->content ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="tchat">
            <div class="tchat-recipient">
                <img src="views/assets/user-image.jpg" width="38px" height="38px" alt="">
                <span>????</span>
            </div>
            <div class="tchat-conversation">
                <?php foreach ($allMessages as $message) { ?>
                    <div class="message-row <?php if ($message->getSenderId() == 2) {echo 'myself';} ?>">
                        <div class="date-message">
                        <?php if ($message->getSenderId() !== 2) { ?> <img src="views/assets/user-image.jpg" width="38px" height="38px" alt=""><?php } ?><span><?= $message->created_at->format('d.m H:i') ?></span>
                        </div>
                        <div class="message-details">
                            <p><?= $message->content ?></p>
                        </div>
                    </div> 
                <?php } ?>
            </div>
            <div class="tchat-new-message">
                <input type="text" placeholder="Taper votre message ici"><button class="btn btn-send-message">Envoyer</button>
            </div>
        </div>     
    </div>
</section>