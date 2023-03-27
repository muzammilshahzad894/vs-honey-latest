<table
    style="color: #333; font-size: 13px; font-family: Arial, sans-serif; line-height: 1.3; margin: auto; border-collapse: collapse;"
    width="100%"
    cellspacing="0"
    cellpadding="0"
    border="0"
    bgcolor="#fff"
>
    <tbody>
        <tr>
            <td
                style="
                    background: #fff;
                    height: 120px;
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                "
            >
                <table width="100%">
                    <tr>
                        <td
                            style="
                                text-align: center;
                                font-weight: 600;
                                font-size: 26px;
                                padding: 0px 50px;
                                line-height: 22px;
                                color: #1355ff;
                            "
                        >
                        <?=$site_settings->site_name?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td height="30"></td>
                    </tr>
                    <tr><td height="1" bgcolor="#F4F3F3"></td></tr>
                    
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 0px;">
                <table style="background: #fff; color: #333; font-size: 13px; border-collapse: collapse;" width="100%" cellspacing="0" cellpadding="5" border="0">
                    <tbody>
                        <tr style="font-size: 15px;">
                            <td style="padding: 10px;" colspan="2"><strong>Hi <?=$email_data['name']?>,</strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; font-size: 15px; line-height: 29px;">
                                Thank you for registering to attend <?=$email_data['event_title']?>. Please see the event details below:
                                <br/>
                                <strong style="color:#000;">Event Title</strong><?=$email_data['event_title']?><br/>
                                <strong style="color:#000;">Date</strong><?=format_date($email_data['event_date'], 'd, F Y')?><br/>
                                <strong style="color:#000;">Time</strong><?=date('h A', strtotime($email_data['event_time']))?>, <?=$email_data['event_time_zone']?>
                                <br/>
                                <br/>
                                The webinar joining link will be sent to you 2 hours before the start time. Please keep an eye out for emails.
                                <br/>
                                If you cannot attend this webinar or if you have any questions, please let us know via <a href="mailto:<?=$site_settings->site_events_email?>" style="color:#1355ff;text-decoration: underline;"><?=$site_settings->site_events_email?></a>
                                <br/><br/>
                                Have a nice day!<br/>
                                <?=$site_settings->site_name?> Events Team
                            </td>
                        </tr>
                        <tr height="5"></tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>