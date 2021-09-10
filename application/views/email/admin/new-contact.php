<style>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

/* RESET STYLES */
img { border: 0; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { margin: 0 !important; padding: 0 !important; width: 100% !important; }

/* iOS BLUE LINKS */
a[x-apple-data-detectors] {
  color: inherit !important;
  text-decoration: none !important;
  font-size: inherit !important;
  font-family: verdana !important;
  font-weight: inherit !important;
  line-height: inherit !important;
}
</style>
<table width="640" cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:640px; width:100%;" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top" style="padding:10px;">
      
    <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <tbody>
      <tr>
        <td width="100%" colspan="2" bgcolor="#d1d1d1" align="center"><strong>Contact Details</strong></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?= $name;?></td>
      </tr>
      <tr>
        <td bgcolor="#f1f1f1">Email</td>
        <td bgcolor="#f1f1f1"><?= $email;?></td>
      </tr>
      
      <tr>
        <td bgcolor="#f1f1f1">Phone </td>
        <td bgcolor="#f1f1f1"><?= $phone;?></td>
      </tr>
      <tr>
        <td>Subject </td>
        <td><?= $subject;?></td>
      </tr>
      <tr>
        <td bgcolor="#f1f1f1">Message</td>
        <td bgcolor="#f1f1f1"><?= $message;?></td>
      </tr>
      <tr>
        <td>Client</td>
        <td><?= $client;?></td>
      </tr>
      <tr>
        <td bgcolor="#f1f1f1">IP</td>
        <td bgcolor="#f1f1f1"><?= $ip;?></td>
      </tr>
      
    </tbody>
    </table>

    </td>
  </tr>
</table>