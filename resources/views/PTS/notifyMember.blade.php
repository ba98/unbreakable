<!DOCTYPE html>
<html>

<body>
    <h2>UNbreakable</h2>
    <h3>Dear {{ $data['member_name'] }},</h3>
    <h3>Your private training session request has been {{ $data['status'] }} by coach <?php echo Auth()->user()->name; ?>.
        For further information, you shall contact the coach.</h3>

    <h3>Best regards,</h3>
    <h3>UNbreakable</h3>
</body>

</html>
