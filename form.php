<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

<title>New Event</title>

<link rel="stylesheet" type="text/css" href="../anytime/anytime.css"/>

<script src="../anytime/jquery.min.js"></script>

<script src="../anytime/jquery-migrate-1.0.0.js"></script>

<script src="../anytime/anytime.js"></script>
<link href="../assets/css/test_project.css" rel="stylesheet" type="text/css" />

<link href="../assets/css/links.css" rel="stylesheet" type="text/css" media="screen" />

</head>



<body>

<div id="container">

  <div id="header">

    <div class="logo"></div>

    <div class="menu">

   <div id="navcontainer">
        <ul id="navlist">
        </ul>

   </div>

 <br class="clear"/>

   </div>

    <br class="clear"/>

  </div> 

<div id="wrapper">

    <div id="sidebar1"> 
    <p><?php echo output_message($message); ?></p>

      <form id="form1" name="form1" method="post" action="new_event.php">

        <table width="578" height="322" border="0" cellpadding="0">

          <tr>

            <td colspan="3" align="right" valign="top">Event Title:</td>

            <td colspan="5" align="left" valign="top"><input type="text" name="event_title" /></td>
          </tr>

          <tr>

             <td width="3" align="center" valign="top">&nbsp;</td>

            <td width="89" align="center" valign="top"><input name="start_date" type="text" size="14" id="start_date" value="START DATE"/></td>

            <td width="60" align="center" valign="top"><input name="start_time" type="text" size="8" id="start_time" value="TIME"/></td>

            <script>

                AnyTime.picker("start_date",

                {format: "%Y-%c-%e"});

                $("#start_time").AnyTime_picker(

                { format: "%H:%i", LabelTitle: "Time",

                labelHour: "Hour", labelMinute: "Minute" });

            </script>

            <td width="54" align="center" valign="top"><strong>TO</strong></td>

            <td width="71" align="center" valign="top"><input name="end_date" type="text" size="14" id="end_date" value="END DATE"/></td>

            <td width="74" align="center" valign="top"><input name="end_time" type="text" size="8" id="end_time" value="TIME"/></td>

            <script>

                AnyTime.picker("end_date",

                {format: "%Y-%c-%e"});

                $("#end_time").AnyTime_picker(

                { format: "%H:%i", LabelTitle: "Time",

                labelHour: "Hour", labelMinute: "Minute" });

            </script>

            <td width="67" align="center" valign="top">&nbsp;</td>

            <td width="142" align="center" valign="top">&nbsp;</td>
          </tr>

          <tr>

            <td colspan="3" align="right" valign="top">Venue:</td>

            <td colspan="5" align="left" valign="top"><input type="text" name="venue" /></td>
          </tr>

          <tr>

            <td colspan="3" align="right" valign="top">Event Type:</td>

            <td colspan="5" align="left" valign="top"><input type="text" name="event_type" /></td>
          </tr>

          <tr>

            <td height="59" colspan="3" align="right" valign="top">Event Description:</td>

            <td colspan="5" align="left" valign="top"><textarea name="event_description"></textarea></td>
          </tr>

          <tr>

            <td height="51" colspan="3" align="right" valign="top">Event Program: </td>

            <td colspan="5" align="left" valign="top"><textarea name="event_program"></textarea></td>
          </tr>
          <tr>
            <td height="24" colspan="3" align="right" valign="top">Visible:</td>
            <td colspan="5" align="left" valign="top"><input name="visible" type="radio" value="0" />
            No &nbsp;
            <input name="visible" type="radio" value="1" />
            Yes</td>
          </tr>

          <tr>

            <td height="40" colspan="3" align="right" valign="top">Reminder:</td>

            <td align="left" valign="top">

              <input name="reminder_date" type="text" size="10" id="reminder_date" /> </td>

            <td align="left" valign="top">

              <input name="reminder_time" type="text" size="10" id="reminder_time"/></td>

            <script>

                AnyTime.picker("reminder_date",

                {format: "%Y-%c-%e"});

                $("#reminder_time").AnyTime_picker(

                { format: "%H:%i", LabelTitle: "Time",

                labelHour: "Hour", labelMinute: "Minute" });

            </script>             

            <td align="left" valign="top">&nbsp;</td>

            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td height="40" colspan="3" align="right" valign="top"><input type="submit" name="submit" value="Create Event" /></td>
            <td height="40" align="left" valign="top"> <input name="New" type="button" id="New" value="Cancel" onclick="location.href='event_management.php'"/></td>
          </tr>
        </table>

      </form> 
       </div>
	   
	   </body>
	   </html>