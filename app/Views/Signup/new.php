<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>>Sign Up<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="title">Sign UP</h1>

<?php if (session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>

<div class="container">

<?= form_open("/signup/create") ?>

    <div class="field">
        <label class="label" for="name">Name </label>
        <div class="control">
        <input class="input" type="text" name="name" id="name" value="<?= old('name') ?>">
    </div>
    
    <div class="field">
        <label class="label" for="email">Email</label>
        <div class="control">
        <input class="input" type="text" name="email" id="email" value="<?= old('email') ?>">
    </div>
    
    <div class="field">
        <label class="label" for="password"><?= lang('Signup.password') ?></label>
        <div class="control">
        <input class="input" type="password" name="password">
    </div>
    
    <div class="field">
        <label class="label" for="password_confirmation"><?= lang('Signup.repeat_password') ?></label>
        <div class="control">
        <input class="input" type="password" name="password_confirmation">
    </div>
</div>    
    
    <div class="field is-grouped">
        <div class="control">
            <button class="button is-primary"><?= lang('Signup.sign_up') ?></button>
        </div>
        
        <div class="control">
            <a class="button" href="<?= site_url("/") ?>"><?= lang('Signup.cancel') ?></a>
        </div>
    </div>

</form>

</div>

<?= $this->endSection() ?>