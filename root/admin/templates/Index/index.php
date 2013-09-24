    <div class="well">
        <div class="row-fluid">
            <div class="span10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id:</th>
                            <th>Name:</th>
                            <th>From:</th>
                            <th>Date Created:</th>
                            <th>Action:</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($data['emails']) && $data['emails']) {
                        /* @var $email \libs\Entities\Email */
                        foreach ($data['emails'] as $email) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($email->getEmailId()); ?></td>
                                <td><?php echo htmlspecialchars($email->getEmailName()); ?></td>
                                <td><?php echo htmlspecialchars($email->getFrom()); ?></td>
                                <td><?php echo htmlspecialchars($email->getDc()) ?></td>
                                <td>
                                    <a href="/admin/index/edit/?emailId=<?php echo htmlspecialchars($email->getEmailId()); ?>" class="btn btn-mini btn-primary">Edit</a>
                                    <a href="/admin/index/delete/?emailId=<?php echo htmlspecialchars($email->getEmailId()); ?>" class="btn btn-mini btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } } else { ?>
                        <tr>
                            <td colspan="8">No results!</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="/admin/index/add" class="btn btn-primary" style="float: right;">
                    Add User
                </a>

            </div>
        </div>
    </div>

