<?= $this->extend('template/main') ?>

<!-- Place your HTML code here -->
<!-- All the HTML code you provided should be placed here -->

<?php $this->section('content'); ?>
     <!-- Success Toast -->
     
        <!-- End Success Toast -->
       

        <section class="content">

        <div class="container-fluid">
    <div class="row clearfix">
        
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                              
    <div class="card-header">
    <div class="col-md-8">
      
    </div>
    <!-- <div class="col-md-1">
    <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#tambahModal">
        Tambah
    </button>
</div> -->
<!-- <div class="col-md-1"> -->
    <!-- <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#importModal">
        Imports
    </button> -->
<!-- </div> -->

    </div>
    <div class="card-body">
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
    <i class="material-icons">add</i>
</button>
    <table id="datatablesSimple" class="table">
    <thead>
        <tr>
            <th>Id User</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['id']); ?></td>
                <td><?= esc($user['email']); ?></td>
                <td><?= esc($user['username']); ?></td>
                <td><?= esc($user['password']); ?></td>
                <td>
                    <div class="btn-group" role="group">
                        <!-- Button trigger modal for editing a user -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= esc($user['id']); ?>">
                        <i class="material-icons">edit</i>

                        </button>
                        <div class="btn-group" role="group">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= esc($user['id']); ?>">
                        <i class="material-icons">delete</i>
                    </button>
                </div>
                        <!-- Button trigger modal for deleting a user -->
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?= $this->include('template/modalUser') ?>

</div>
</div>
</div>
</div>
    <?php $this->endSection(); ?>