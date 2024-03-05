<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hayati Form</title>

    <style>
        body {
            font-family: 'freeserif', 'normal';
            margin: 0;
        }

        p {
            padding-left: 1px;
            padding-right: 10px;
            line-height: 2;
        }

        .container {
            padding: 25px;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2 style="text-align:center;"><b><u>हयातीचा दाखला</u></b> </h2>
        <br>
        <p>दाखला देण्यात येतो की, श्री/श्रीमती {{ $hayat->f_name }} {{ $hayat->m_name }} {{ $hayat->l_name }}
            राहणार {{ $hayat->house_no }}, {{ $hayat->area }} , {{ $hayat->landmark }} , {{ $hayat->city }}-
            {{ $hayat->pincode }} , {{ $hayat->state }} हे आज दिनांक {{ \Carbon\Carbon::now()->format('d/m/Y') }} रोजी
            हयात असुन त्यानी माझे समोर सही केली आहे. </p>

        <table>
            <thead>
                <tr>
                    <th><b>लाभार्थाचा संपर्क - दूरध्वनी /मोबाइल क्र. :</b> <b>1)</b> &nbsp;{{ $hayat->contact }}&nbsp; <b>2)</b> &nbsp;{{ $hayat->alternate_contact_no }}</th>
                </tr>
            </thead>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th><b>बँकेचे नाव:</b> {{ $hayat->bank_name }}</th>
                </tr>
            </thead>
        </table>
        <br>
        <table style="width:100%;">
            <thead>
                <tr>
                    <th style="text-align: left;"><b>बँकेचे खाते क्रमांक:</b> {{ $hayat->account_no }}</th>
                    <th><b>IFSC CODE:</b> {{ $hayat->ifsc_code }}</th>
                </tr>
            </thead>
        </table>
        <br>
        <br>
        <br>
        <table style="width:100%;">
            <thead>
                <tr>
                    <th style="float: left;"><img src="{{ public_path('storage/' . $hayat->signature) }}" height="50"
                            width="50" alt="logo"><br><br>लाभार्थ्यांचा सही / अंगठा </th>
                    <th style="float: right;"><br><br><br><br><br>नगरसेवक/ पोस्ट मास्तर/ राजपत्रित अधिकारी/ बँक मॅनेजर या पैकी एक <br>
                        दाखला देणाऱ्याची सही / हुद्दा व शिक्का</th>
                </tr>
            </thead>
        </table>
        <br>
        <br>
        <br>
        <p style="text-align: justify;">
            <strong>सुचना:-</strong>
            <br>
            <span style="display: inline-block;">
                <b> १) खालील प्रमाणे आपल्या प्रभागातील नगरसेवक/सर्व पोस्ट मास्तर/ राजपत्रित अधिकारी किंवा बँक मॅनेजर
                    यापैकी कोणासमोरही पुर्ण करुन या कार्यालयाकडे त्वरीत पाठवावे.
                    <br>२) तहसिलदाराचे चालु उत्पन्नाचा दाखला जोडणे.</b>
            </span>
        </p>
        <br>
        <hr>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br><br><br><br><br><br><br><br><br>
        <h2 style="text-align:center;"><b><u>-: प्रतिज्ञापत्र :-</u></b> </h2>
        <?php
            $medical_benefit='';
            if($hayat->medical_benefit == 'yes'){
                $medical_benefit='आहे';
            }else{
                $medical_benefit='नाही';
            }

            $govt_benefit='';
            if($hayat->govt_benefit == 'yes'){
                $govt_benefit='मिळत आहेत';
            }else{
                $govt_benefit='मिळत नाही';
            }

            $disability_benefit='';
            if($hayat->disability_benefit == 'yes'){
                $disability_benefit='आहे';
            }else{
                $disability_benefit='नाही';
            }
        ?>
        <ol>
            <li>
                <p>मी प्रतिज्ञापत्रावर जाहीर करतो /करते कि , {{ $hayat->f_name }} {{ $hayat->m_name }} {{ $hayat->l_name }}
                    दि . {{ \Carbon\Carbon::now()->format('d/m/Y') }} अखेर संपणाऱ्या कालावधीत मी कोणतीही सरकारी
                    /निमसरकारी व लष्करी नोकरी करून त्याबद्दल मोहबदला घेतला नाही . तसेच वरील अल्पावधीत केंद्र
                    शासनाच्या वैद्यकीय सुविधांचा लाभ घेतलेला {{ $medical_benefit }} . </p>
            </li>
            <li>
                <p>मी प्रतिज्ञेवर लिहून देतो / देते कि, मला दोन शासकीय लाभ {{ $govt_benefit }} . त्यांच्या तपशील जोडत
                    आहे .</p>
            </li>
            <li>
                <p>मी प्रतिज्ञेवर लिहून देतो / देते कि, मला यापूर्वी दिव्यांग निधी लाभ प्राप्त झाले {{ $disability_benefit }}
                    .</p>
            </li>
        </ol>
        <br>
        <p><img src="{{ public_path('storage/' . $hayat->signature) }}" alt="logo" height="50" width="50"
                style="margin-left: 12%;"></p>
        <p style="margin-left: 8%;">लाभार्थ्याची सही / अंगठा </p>
        <p>मी प्रमाणित करतो कि वरील प्रतिज्ञापत्रे माझे समक्ष दिलेली आहेत . </p>
        <br>
        <p></p>
        <p style="margin-left: 2%;">दाखला देणाऱ्याची सही / हुद्दा व शिक्का </p>
        <p style="text-align: justify;">
            <strong>सुचना:-</strong>
            <br>
            <span style="display: inline-block;">
                <b> १) खालील प्रमाणे आपल्या प्रभागातील नगरसेवक/सर्व पोस्ट मास्तर/ राजपत्रित अधिकारी किंवा बँक मॅनेजर
                    यापैकी कोणासमोरही पुर्ण करुन या कार्यालयाकडे त्वरीत पाठवावे.
                    <br>२) तहसिलदाराचे चालु उत्पन्नाचा दाखला जोडणे.</b>
            </span>
        </p>
        <hr>
    </div>
</body>

</html>
