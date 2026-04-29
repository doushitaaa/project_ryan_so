<?php
$this->layout = 'login';
?>

<div class="center">
    <h1>Forget Password</h1>
    <form method="post">
        <?= $this->Flash->render() ?>

        <div class="txt_field">
            <input type="text" name="email" required />
            <span></span>
            <label>Email</label>
        </div>
        <input type="submit" value="Send Verification Email" />
        <div class="signup_link"> <a href="login">Back to login</a></div>
    </form>
</div>

<style>
    .message.error {
        background: #fcebea;
        color: #cc1f1a;
        border-color: #ef5753;
    }
    .message.success {
        background: #e3fcec;
        color: #1f9d55;
        border-color: #51d88a;
    }
</style>
