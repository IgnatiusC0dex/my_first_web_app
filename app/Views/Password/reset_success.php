<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Password reset<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="title">Password Reset</h1>

<p>Password reset successful!</p>

<h1 class="title">    </h1>

<div class="control">
                <a class="button" href="<?= site_url("/login") ?>">Login</a>
</div>

<?= $this->endSection() ?>