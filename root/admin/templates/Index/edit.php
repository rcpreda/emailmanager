<?php
if (isset($data['email']) && $data['email']) {
    /* @var $email \libs\Entities\Email */
    $email = $data['email'];
} else {
    $email = NULL;
}
?>
<div class="well">
    <div class="row-fluid">
        <form action="" method="post" name="addEmail" id="addEmail">
            <fieldset>
                <legend>Add Email</legend>
                <table class="table-striped">
                    <colgroup>
                        <col style="width: 15%" />
                        <col />
                    </colgroup>
                    <tr>
                        <td><label for="emailName">Email name: </label></td>
                        <td><input type="text" name="emailName" value="<?php echo $email ? $email->getEmailName() : NULL; ?>" id="emailName" /></td>
                    </tr>
                    <tr>
                        <td><label for="subject">Subject: </label></td>
                        <td><input type="text" name="subject" value="<?php echo $email ? $email->getSubject() : NULL; ?>" id="subject" /></td>
                    </tr>
                    <tr>
                        <td><label for="content">Content: </label></td>
                        <td ><textarea rows="10" cols="90" id="tinyeditor" name="content" ><?php echo $email ? $email->getContent() : NULL; ?></textarea></td>
                    </tr> 
                    <tr>
                        <td><label for="from">From: </label></td>
                        <td><input type="text" name="from" value="<?php echo $email ? $email->getFrom() : NULL; ?>" id="from" /></td>
                    </tr>
                    <tr>
                        <td><label for="fromName">From Name: </label></td>
                        <td><input type="text" name="fromName" value="<?php echo $email ? $email->getFromName() : NULL; ?>" id="fromname" /></td>
                    </tr>
                    <tr>
                        <td><label for="to">To: </label></td>
                        <td><input type="text" name="to" value="<?php echo $email ? $email->getTo() : NULL; ?>" id="to" /></td>
                    </tr>
                    <tr>
                        <td><label for="toName">To Name: </label></td>
                        <td><input type="text" name="toName" value="<?php echo $email ? $email->getToName() : NULL; ?>" id="toName" /></td>
                    </tr>
                    <tr>
                        <td><label for="cc">CC: </label></td>
                        <td><input type="text" name="cc" value="<?php echo $email ? $email->getcc() : NULL; ?>" id="cc" /></td>
                    </tr>
                    <tr>
                        <td><label for="bcc">Bcc: </label></td>
                        <td><input type="text" name="bcc" value="<?php echo $email ? $email->getBcc() : NULL; ?>" id="bcc" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Add Email" class="btn btn-primary submit" /></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</div>

<script>
    $("#addEmail").validate({
        rules: {
            emailName: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            subject: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            content: {
                required: true,
                minlength: 4,
                maxlength: 5000
            },
            from: {
                required: true,
                email: true
            },
            fromName: {
                required: true,
                minlength: 4,
                maxlength: 150
            },
            to: {
                email: true
            },
            toName: {
                minlength: 4,
                maxlength: 150
            },
            cc: {
                email: true
            },
            bcc: {
                email: true
            }

        },
        messages: {
            emailName: {
                required: "Please enter a name",
                minlength: $.format("Minimum {0} characters required!"),
                maxlength: $.format("Maximum {0} characters allowed!")
            },
            subject: {
                required: "Please enter a subject",
                minlength: $.format("Minimum {0} characters required!"),
                maxlength: $.format("Maximum {0} characters allowed!")
            },
            content: {
                required: "Please enter a content",
                minlength: $.format("Minimum {0} characters required!"),
                maxlength: $.format("Maximum {0} characters allowed!")
            },
            from: {
                required: "Please enter an email"
            },
            fromName: {
                required: "Please enter a content",
                minlength: $.format("Minimum {0} characters required!"),
                maxlength: $.format("Maximum {0} characters allowed!")
            },
        }
    });
</script>

