<!DOCTYPE html>
<html>
<body>
    <h2>UNbreakable</h2>
    <h3>Dear coach {{$data["coach_name"]}},</h3>
    <h3>A private trainig session request has been made by <?php echo Auth()->user()->name?>.
        The session is scheduled to be on {{$data["date"]}} at {{$data["time"]}}.
        You may kindly visit unbreakable.com as soon as possible to accept or reject the request.</h3>

        @if ($data["note"] != Null)
            <h4>Note from <?php echo Auth()->user()->name?>: {{$data["note"]}}</h4>
        @endif
    <h3>Best regards,</h3>
    <h3>UNbreakable</h3>
</body>
</html>
