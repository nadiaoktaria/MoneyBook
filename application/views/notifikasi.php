<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html" />
    <title>Remainder Utang</title>
    <style type="text/css" rel="stylesheet" media="all">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 20px !important;
                line-height: 20px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 10px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding:10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                            <h1 style="font-size: 30px; font-weight: 400; margin: 2;">Remainder Utang!</h1>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 0 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 18px;">
                            <p style="margin: 0;">Hi <?= $nama ?>, Anda memiliki utang yang jatuh tempo pada hari ini dan harus segera di lunasi. Dibawah ini adalah rincian utang Anda.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center">
                            <table cellpadding="0" cellspacing="0" width="85%" style="max-width: 600px; margin:0 10px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 30px;">
                                <thead>
                                    <tr>
                                        <th bgcolor="#007bff" colspan="2" align="center" style="padding: 0 10px 0 10px; color: #ffffff;">Rincian Utang</th>
                                    </tr>
                                </thead>
                                <tbody bgcolor="#ffffff"> 
                                    <tr>
                                        <td style="padding: 0 10px 0 10px">Kreditur</td>
                                        <td style="padding: 0 10px 0 10px" align="right"><?= $kreditur ?></td>
                                    </tr>

                                    <tr bgcolor="#ebedf2">
                                        <td style="padding: 0 10px 0 10px">Jumlah Utang</td>
                                        <td style="padding: 0 10px 0 10px" align="right"><?= $jumlah_utang ?></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 0 10px 0 10px">Jumlah Bayar</td>
                                        <td style="padding: 0 10px 0 10px" align="right"><?= $jumlah_bayar ?></td>
                                    </tr>

                                    <tr bgcolor="#ebedf2">
                                        <td style="padding: 0 10px 0 10px">Tanggal Utang</td>
                                        <td style="padding: 0 10px 0 10px" align="right"><?= $tanggal_utang ?></td>
                                    </tr>

                                    <tr>
                                        <td style="padding: 0 10px 0 10px">Tanggal Tempo</td>
                                        <td style="padding: 0 10px 0 10px" align="right"><?= $tanggal_tempo ?></td>
                                    </tr>

                                    <tr bgcolor="#ebedf2">
                                        <td style="padding: 0 10px 0 10px">Keterangan</td>
                                        <td style="padding: 0 10px 0 10px" align="right"><?= $keterangan ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr> 
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#007bff"><a href="<?= base_url('utang') ?>" target="_blank" style="font-size: 14px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 2px; border: 1px solid #1572e8; display: inline-block;">Lihat Rincian</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#cfe9f1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Copyright © 2021 <a href="<?= base_url('beranda') ?>" target="_blank" style="color: #111111; font-weight: 700;">MoneyBook</a>.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;"> <br>
                            <!-- <p style="margin: 0;">If these emails get annoying, please feel free to <a href="#" target="_blank" style="color: #111111; font-weight: 700;">unsubscribe</a>.</p> -->
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>