<html>
<head>
    <style>
        body{
        font-family : 'Helvetica';
        }
    </style>
</head>

    <body>
        <div>
            <img src ='http://workshop.internshala.com/static/images/certificate/<?=$data->workshop_url?>_participation.jpg' width='700' height='1000' style='position:absolute;'>

            <div style='width: 500px; font-size:14; position: absolute; top: 400px; left: 100px; color: #666'>
                <p style='line-height:2'>
                    This is to certify that <b> <?= $data->first_name . ' ' . $data->last_name ?> </b>  attended a one day Internshala Online Workshop on <b><?= $data->workshop ?></b> <?= $data->powered_by ? "powered by " . $data->powered_by : "" ?> on <?= $data->workshop_on ?>. <br><br>
                    We Wish <?= $data->first_name ?> all the best for future endeavours.    
                </p>
            </div>
        </div>
    </body>
</html>
