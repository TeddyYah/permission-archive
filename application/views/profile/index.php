<div class="container">
    <div class="row mt-3">
        <div class="col-md-10">

            <h4 class="mb-4 text-dark"><?= $title  ?></h4>
            <div class="card">
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <center>
                        <?php
                        // var_dump($this->session->userdata('image') . $user->image);
                        // die;
                        ?>
                        <?php if (!$member->image) : ?>
                        <img src="https://ui-avatars.com/api/?size=128&name=<?= $member->fullname ?>"
                            class="img-thumbnail mb-3 rounded-circle" />
                        <?php else : ?>
                        <img src="<?= base_url('assets/img/profile/') . $member->image ?>"
                            class="img-thumbnail mb-3 rounded-circle kagami">
                        <?php endif; ?>
                        <table>
                            <tr>
                                <td width="80px" class="pb-3">Fullname</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="pb-3"><?= $member->fullname;  ?></td>
                            </tr>
                            <tr>
                                <td width="80px" class="pb-3">Username</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="pb-3"><?= $member->username;  ?></td>
                            </tr>
                            <tr>
                                <td width="80px" class="pb-3">Role</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="pb-3"><?= $member->nama_role;  ?></td>
                            </tr>
                            <tr>
                                <td width="150px" class="pb-3">Bergabung pada</td>
                                <td width="20px" class="pb-3">:</td>
                                <td width="200px" class="pb-3">
                                    <?= date('d-M-Y', strtotime($member->created_at)) ?>
                                </td>
                            </tr>
                        </table>
                        <a href="<?= base_url('user_access/editProfile') ?>" class="btn btn-primary mt-3">Edit
                            Profile</a>
                    </center>
                </div>
            </div>

        </div>
    </div>
</div>
</div>