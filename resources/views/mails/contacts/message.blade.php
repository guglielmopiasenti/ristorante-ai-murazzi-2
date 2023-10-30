<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Autocandidatura</title>
</head>

<body style="background-color: #F3F4F6; padding: 40px;">

    <div
        style="max-width: 600px; margin: auto; background-color: white; padding: 32px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">

        <h2 style="font-size: 20px; font-weight: bold; color: #4B5563;">Nuova Auto Candidatura</h2>

        <p style="color: #4B5563;">Hai ricevuto una nuova auto candidatura con i seguenti dettagli:</p>

        <div style="margin-top: 20px; margin-bottom: 20px;">
            <div style="display: flex; align-items: center; margin-bottom: 16px;">
                <p style="font-weight: 500; color: #6B7280; margin-right: 16px;">Nome:</p>
                <p style="color: #1F2937;">{{ $data['first-name'] }} {{ $data['last-name'] }}</p>
            </div>

            <div style="display: flex; align-items: center; margin-bottom: 16px;">
                <p style="font-weight: 500; color: #6B7280; margin-right: 16px;">Email:</p>
                <p style="color: #1F2937;">{{ $data['email'] }}</p>
            </div>

            <div style="display: flex; align-items: center; margin-bottom: 16px;">
                <p style="font-weight: 500; color: #6B7280; margin-right: 16px;">Numero di telefono:</p>
                <p style="color: #1F2937;">{{ $data['phone-number'] }}</p>
            </div>

            <div style="margin-bottom: 20px;">
                <p style="font-weight: 500; color: #6B7280; margin-bottom: 8px;">Messaggio:</p>
                <p style="color: #1F2937;">{{ $data['message'] }}</p>
            </div>
        </div>

        <p style="color: #4B5563;">Cordiali saluti,</p>
        <p style="color: #4B5563;">Il tuo sistema di candidatura</p>
    </div>

</body>

</html>
