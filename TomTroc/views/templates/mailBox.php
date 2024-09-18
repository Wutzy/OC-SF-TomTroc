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
                    <a href="index.php?action=myMessages&sender_id=<?= $lastmessage->sender->getId() ?>">
                        <div class="message-preview-row <?php if ($lastmessage->sender->getId() == $_GET['sender_id']) {echo 'active';} ?>">
                            <div class="message-preview-picture">
                                <img src="views/assets/user-images/<?= $lastmessage->sender->img_link ?>" width="48px" height="48px" alt="Photo de profil de l'utilisateur <?= $lastmessage->sender->nickname ?>">
                            </div>
                            <div class="message-preview-group">
                                <div class="message-preview-header">
                                    <div class="sender"><?= $lastmessage->sender->nickname ?></div>
                                    <div class="created-at"><span><?= $lastmessage->created_at->format('H:i') ?></span></div>
                                </div>
                                <div class="message-preview-detail">
                                    <p><?= $lastmessage->content ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="tchat">
            <div class="tchat-recipient">
                <?php if (!empty($allMessages)) { ?>
                    <span><?php echo '
                    <img src="views/assets/user-images/' . $sender->img_link . '" class="rounded-image" width="38px" height="38px" alt="Photo de profil de l\'utilisateur ' . $lastmessage->sender->nickname . '">'; ?></span>
                    <span><?= $sender->nickname ?></span>
                <?php } ?>
            </div>
            <div class="tchat-conversation">
                <?php foreach ($allMessages as $message) { ?>
                    <div class="message-row <?php if ($message->sender->getId() == $_SESSION['idUser']) {echo 'myself';} ?>">
                        <div class="date-message">
                        <?php if ($message->sender->getId() !== $_SESSION['idUser']) { ?> <img src="views/assets/user-images/<?= $message->sender->img_link ?>" class="rounded-image" width="38px" height="38px" alt="Photo de profil de l'utilisateur <?= $lastmessage->sender->nickname ?>"><?php } ?><span><?= $message->created_at->format('d.m H:i') ?></span>
                        </div>
                        <div class="message-details">
                            <p><?= $message->content ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="tchat-new-message">
                <form action="index.php?action=sendMessage" method="post">
                    <label for="content" class="hidden-label">Entrer votre message</label>
                    <input type="text" placeholder="Taper votre message ici"  name="content" id="content" value="">
                    <input type="hidden" name="recipient_id" id="recipient_id" value="<?= $sender->getId() ?>">
                    <button class="btn btn-send-message">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</section>