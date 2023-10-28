<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Delete task<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="title">Delete Task</h1>

<h1 class="title"> </h1>

<p>Are you sure?</p>

<h1 class="title">  </h1>

<?= form_open("/task/delete/" . $task->id) ?>

<div class="field is-grouped">
        <div class="control">
            <button class="button is-primary">Yes</button>
        </div>

        <div class="control">
            <a class="button" href="<?= site_url('/task/show/' . $task->id) ?>">Cancel</a>
        </div>
    </div>
    
</form>

<?= $this->endSection() ?>