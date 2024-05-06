<!-- Add User Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/users/add" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Your HTML content for the success page -->
<!-- This could be whatever content you want to display after successful data addition -->

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="importForm">
                    <div class="form-group">
                        <label for="importFile">Choose File</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="importFile">
                            <label class="custom-file-label" for="importFile">Choose file...</label>
                        </div>
                    </div>
                    <!-- Add other fields as needed -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="importButton">Import</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<?php foreach ($users as $user): ?>
<div class="modal fade" id="editModal<?= esc($user['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= esc($user['id']); ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel<?= esc($user['id']); ?>">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing user -->
                <form action="/users/edit/<?= esc($user['id']); ?>" method="post">
                    <div class="form-group">
                        <label for="editEmail<?= esc($user['id']); ?>">Email</label>
                        <input type="email" class="form-control" id="editEmail<?= esc($user['id']); ?>" name="email" value="<?= esc($user['email']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="editUsername<?= esc($user['id']); ?>">Username</label>
                        <input type="text" class="form-control" id="editUsername<?= esc($user['id']); ?>" name="username" value="<?= esc($user['username']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="editPassword<?= esc($user['id']); ?>">Password</label>
                        <input type="password" class="form-control" id="editPassword<?= esc($user['id']); ?>" name="password" value="<?= esc($user['password']); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- Delete Modal -->
<?php foreach ($users as $user): ?>
<div class="modal fade" id="hapusModal<?= esc($user['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?= esc($user['id']); ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusModalLabel<?= esc($user['id']); ?>">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              Anda yakin ingin menghapus user ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="/users/delete/<?= esc($user['id']); ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

